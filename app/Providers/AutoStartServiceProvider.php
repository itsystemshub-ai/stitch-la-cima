<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AutoStartServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // Register a callback that runs when the dev server starts
        if ($this->app->environment('local')) {
            $this->ensureViteDevServer();
        }
    }

    /**
     * Ensure Vite dev server is running by checking for hot file
     * and providing helpful messaging if not.
     */
    protected function ensureViteDevServer(): void
    {
        $hotFile = public_path('hot');
        
        // If hot file doesn't exist, we'll add a middleware warning
        if (!file_exists($hotFile)) {
            // Create a simple indicator in logs
            \Log::debug('Vite dev server not detected. Run: npm run dev');
        }
    }
}
