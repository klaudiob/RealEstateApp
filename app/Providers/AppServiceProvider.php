<?php

namespace App\Providers;

use App\Models\User;
use Illuminate\Support\Facades\Gate;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Gate::define('simpleUser',function (User $user)
        {
                return ($user->role=='simpleUser');
        });

        Gate::define('host',function (User $user)
        {
                return ($user->role=='host');

        });

        Paginator::useBootstrap();
    }
}
