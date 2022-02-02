<?php

namespace App\Providers;

use Illuminate\Foundation\Auth\User;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AuthServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->registerPolicies();
        Gate::define('user.identified', fn(User $user) => data_get($user, 'id', 0) > 0);
    }
}
