<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Artisan;
use Spatie\Permission\Models\Permission;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Artisan::call('cache:forget spatie.permission.cache');
        Artisan::call('permission:cache-reset');
        Artisan::call('cache:clear');
        // Artisan::call('permissions:sync');
        Artisan::call('permissions:sync -P');
        $role_name = "Super Admin";
        $role = Role::create(['name' => $role_name]);
        $role->syncPermissions(Permission::pluck('id')->toArray());
        $role_name = "Administrator";
        $role = Role::create(['name' => $role_name]);
        $role->syncPermissions(Permission::pluck('id')->toArray());
    }
}
