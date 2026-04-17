<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Schema;
use App\Models\Notification;
use App\Models\StockMovement;
use App\Observers\StockMovementObserver;
use App\Console\Commands\ServeCommand;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->commands([
            ServeCommand::class,
        ]);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Schema::defaultStringLength(191);

        if (config('app.env') !== 'local') {
            \Illuminate\Support\Facades\URL::forceScheme('https');
        }
        
        StockMovement::observe(StockMovementObserver::class);

        View::composer('*', function ($view) {
            try {
                if (auth()->check() && Schema::hasTable('notifications')) {
                    $view->with('unreadNotificationsCount', Notification::where('user_id', auth()->id())->where('read', false)->count());
                    $view->with('latestNotifications', Notification::where('user_id', auth()->id())->latest()->take(5)->get());
                } else {
                    $view->with('unreadNotificationsCount', 0);
                    $view->with('latestNotifications', collect());
                }
            } catch (\Exception $e) {
                $view->with('unreadNotificationsCount', 0);
                $view->with('latestNotifications', collect());
            }
        });
    }
}
