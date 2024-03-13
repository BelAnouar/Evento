<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;

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
        Gate::define('gestion_admin', function (User $user) {

            return $user->hasRole('admin');
        });
        Gate::define('gestion_organizer', function (User $user) {

            return $user->hasRole('organizer');
        });
        Paginator::defaultView('vendor.pagination.tailwind');
        Paginator::defaultSimpleView('simple-tailwind');
    }
}
