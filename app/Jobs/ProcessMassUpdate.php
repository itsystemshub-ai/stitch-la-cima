<?php

namespace App\Jobs;

use App\Services\InventoryService;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessMassUpdate implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $filePath;

    protected $userId;

    /**
     * Create a new job instance.
     */
    public function __construct(string $filePath, $userId)
    {
        $this->filePath = $filePath;
        $this->userId = $userId;
    }

    /**
     * Execute the job.
     */
    public function handle(InventoryService $inventoryService)
    {
        $inventoryService->processMassUpdateFromFile($this->filePath, $this->userId);

        // Clean up temporary file
        if (file_exists($this->filePath)) {
            unlink($this->filePath);
        }
    }
}
