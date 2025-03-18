<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Inertia::share([
            'auth' => function () {
                return [
                    'user' => Auth::check() ? [
                        'name' => Auth::user()->NAME ?? Auth::user()->FIRST_NAME,
                        'email' => Auth::user()->EMAIL,
                        'role' => Auth::user()->ID_ROLE,
                    ] : null,
                ];
            },
        ]);
        
    }
}
