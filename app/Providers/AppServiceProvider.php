<?php

namespace App\Providers;

use App\Models\User;
use App\Policies\CategoryPolicy;
use App\Policies\PostPolicy;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Hash;
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
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Paginator::useBootstrap();

        Gate::define('change-password', function (User $user, string $password) {
            return Hash::check($password, $user->password);
        });

        Gate::define('update-post', [ PostPolicy::class, 'userOwesPost' ]);
        Gate::define('delete-post', [ PostPolicy::class, 'userOwesPost' ]);

        Gate::define('delete-category', [ CategoryPolicy::class, 'canDeleteCategory' ]);
    }
}
