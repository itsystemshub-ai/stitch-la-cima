<?php

namespace App\Console\Commands;

use Illuminate\Foundation\Console\ServeCommand as BaseServeCommand;
use Symfony\Component\Process\Process;

class ServeCommand extends BaseServeCommand
{
    /**
     * Start the dev server process and also start Vite.
     */
    protected function startServer($hasEnvironment): void
    {
        // Start Vite in background before starting the server
        $this->startVite();

        // Call parent to start the server
        parent::startServer($hasEnvironment);
    }

    /**
     * Start Vite dev server in background.
     */
    protected function startVite(): void
    {
        $hotFile = public_path('hot');

        if (file_exists($hotFile)) {
            return;
        }

        $this->info('📦 Starting Vite dev server...');

        $process = new Process(['npm', 'run', 'dev'], base_path());
        $process->disableOutput();
        $process->start();

        // Wait for Vite to create the hot file
        $retries = 0;
        while (!file_exists($hotFile) && $retries < 20) {
            usleep(500000);
            $retries++;
        }

        if (file_exists($hotFile)) {
            $this->info('   ✓ Vite dev server ready');
        } else {
            $this->warn('   ⚠ Vite may take a moment to start');
        }
    }
}
