<?php

namespace App\Providers;

use App\Models\Permission;
use Illuminate\Foundation\Support\Providers\AuthServiceProvider as ServiceProvider;
use Illuminate\Contracts\Auth\Access\Gate as GateContract;
use Illuminate\Support\Facades\Schema;

class AuthServiceProvider extends ServiceProvider
{
    protected $policies = [];

    public function boot(GateContract $gate)
    {
        $this->registerPolicies();

        if (!Schema::hasTable('permissions')) {
            return;
        }

        $permissions = Permission::with('roles')->get();


        foreach ($permissions as $permission) {
            $gate->define(
                $permission->slug,
                fn ($user) => $permission->roles->contains($user->role)
            );
        }
    }
}