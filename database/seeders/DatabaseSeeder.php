<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            RolePermission::class
        ]);
        $userOperator = \App\Models\User::factory()->create([
            'name' => 'Operator',
            'email' => 'operator@admin.com',
        ]);
        $userOperator->assignRole('operator');

        $this->call([
            SiswaSeeder::class,
            TenagaPendidikSeeder::class
        ]);
    }
}
