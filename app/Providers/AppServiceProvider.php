<?php

namespace App\Providers;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Product;
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
        config(['app.locale' => 'id']);
	    Carbon::setLocale('id');

        Gate::define('admin', function(User $user){
            return $user->role_id == 1;
        });

        Gate::define('seller', function(User $user){
            return $user->role_id == 2;
        });
    }
}
