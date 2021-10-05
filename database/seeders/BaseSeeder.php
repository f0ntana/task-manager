<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Seeder;

class BaseSeeder extends Seeder
{
    public function run()
    {
        $role = Role::firstOrCreate(
            ['name' => 'Master']
        );

        $permissions = [
            'dashboard' => 'Dashboard',
            'projects' => 'Projetos'
        ];

        $actions = [
            'index' => 'Listar',
            'create' => 'Criar',
            'edit' => 'Editar',
            'destroy' => 'Deletar',
        ];

        foreach ($permissions as $permissionKey => $permission) {
            foreach ($actions as $actionKey => $action) {
                Permission::firstOrCreate([
                    'module' => $permissionKey,
                    'name' => $action . ' ' . $permission,
                    'slug' => $permissionKey . '.' . $actionKey,
                ]);
            }
        }

        $role->permissions()->sync(Permission::all());

        User::firstOrCreate(
            [
                'email' => 'admin@tecnobit.com.br',
            ],
            [
                'role_id' => $role->id,
                'name' => 'Master',
                'password' => bcrypt('tecnobit'),
            ]
        );
    }
}