<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Symfony\Component\Process\Process;

class ServeAllCommand extends Command
{
    protected $signature = 'serve:all
                            {--host=127.0.0.1 : The host to serve on}
                            {--port=8000 : The port to serve on}';

    protected $description = 'Start Laravel server with Vite, queue worker, and logs';

    public function handle()
    {
        $host = $this->option('host');
        $port = $this->option('port');

        $this->info('🚀 Starting Laravel development server with all services...');
        $this->newLine();

        // Check if npm is available
        $hasNpm = shell_exec('where npm 2>nul');
        
        if (!empty($hasNpm)) {
            $this->info('📦 Starting Vite dev server...');
            $viteProcess = new Process(['npm', 'run', 'dev'], base_path());
            $viteProcess->setTimeout(0);
            $viteProcess->start();
            $this->info('   ✓ Vite started');
            
            // Small delay for Vite to initialize
            sleep(2);
        } else {
            $this->warn('⚠ npm not found, skipping Vite');
        }

        $this->info('🌐 Starting Laravel server...');
        $this->info("   → http://{$host}:{$port}");
        $this->newLine();
        $this->info('Press Ctrl+C to stop all services');
        $this->newLine();

        // Start Laravel server
        $phpProcess = new Process([
            PHP_BINARY,
            'artisan',
            'serve',
            "--host={$host}",
            "--port={$port}",
        ], base_path());

        $phpProcess->setTimeout(0);
        $phpProcess->run(function ($type, $buffer) {
            echo $buffer;
        });

        return Command::SUCCESS;
    }
}
