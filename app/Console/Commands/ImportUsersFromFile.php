<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class ImportUsersFromFile extends Command
{
    protected $signature = 'users:import {file=listaclientesvendedores : Archivo de usuarios}';
    protected $description = 'Importar usuarios desde archivo listaclientesvendedores';

    public function handle()
    {
        $file = $this->argument('file');
        
        if (!file_exists($file)) {
            $this->error("Archivo no encontrado: $file");
            return 1;
        }

        $content = file_get_contents($file);
        $lines = explode("\n", $content);
        
        $imported = 0;
        $skipped = 0;
        
        // Saltear header
        for ($i = 1; $i < count($lines); $i++) {
            $line = trim($lines[$i]);
            if (empty($line)) continue;
            
            $parts = explode("\t", $line);
            if (count($parts) < 6) continue;
            
            $name = trim($parts[2]);
            $email = trim($parts[3]);
            $role = strtolower(trim($parts[4]));
            $password = trim($parts[5]);
            
            // Saltear si el email está vacío
            if (empty($email)) {
                $this->warn("Saltando: $name (email vacío)");
                $skipped++;
                continue;
            }
            
            // Verificar si existe
            $exists = DB::table('users')->where('email', $email)->exists();
            if ($exists) {
                $this->warn("Ya existe: $email");
                continue;
            }
            
            // Determinar rol correcto
            if ($role === 'vendedor') {
                $roleDb = 'vendedor';
            } else {
                $roleDb = 'cliente';
            }
            
            // Insertar usuario
            DB::table('users')->insert([
                'name' => $name,
                'email' => $email,
                'password' => Hash::make($password),
                'role' => $roleDb,
                'is_active' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ]);
            
            $imported++;
            $this->info("Importado: $email");
        }
        
        $this->info("Importación completada: $imported usuarios importados, $skipped saltados");
        return 0;
    }
}