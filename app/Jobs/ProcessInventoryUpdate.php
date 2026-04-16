<?php

namespace App\Jobs;

use App\Models\Notification;
use App\Services\InventoryService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Log;

class ProcessInventoryUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;
    protected $userId;

    /**
     * Create a new job instance.
     */
    public function __construct(string $filePath, int $userId)
    {
        $this->filePath = $filePath;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     */
    public function handle(InventoryService $service): void
    {
        try {
            $service->processMassUpdateFromFile($this->filePath, $this->userId);

            Notification::create([
                'user_id' => $this->userId,
                'type' => 'success',
                'title' => 'Carga Masiva Completada',
                'message' => 'El procesamiento de inventario en segundo plano ha finalizado con éxito.',
                'icon' => 'task_alt',
                'action_url' => route('erp.inventario.productos')
            ]);

            // Eliminar archivo tras procesar si no es persistente
            if (file_exists($this->filePath)) {
                @unlink($this->filePath);
            }
        } catch (\Exception $e) {
            Log::error("Error en Job de Inventario: " . $e->getMessage());
            
            Notification::create([
                'user_id' => $this->userId,
                'type' => 'error',
                'title' => 'Fallo en Carga Masiva',
                'message' => 'Hubo un error al procesar el archivo de inventario: ' . $e->getMessage(),
                'icon' => 'error',
            ]);
        }
    }
}
