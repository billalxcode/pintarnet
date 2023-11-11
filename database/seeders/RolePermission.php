<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RolePermission extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = ['operator', 'ruangan', 'pendidik'];
        $guards = ['web', 'api'];
        foreach ($guards as $guard) {
            foreach ($roles as $role) {
                Role::create(['guard_name' => $guard, 'name' => $role]);
            }
        }
    }
}
