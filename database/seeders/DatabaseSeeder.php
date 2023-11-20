<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\TenagaKependidikan;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call([
            RolePermission::class,
        ]);
        $userOperator = \App\Models\User::factory()->create([
            'name' => 'Operator',
            'email' => 'operator@admin.com',
        ]);
        $userOperator->assignRole('operator');


        if (config('app.debug') == true) {
            $this->command->call('app:master-import');
            $this->command->call('passport:install');
        }
    }
}
