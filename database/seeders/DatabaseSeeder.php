<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory()
        ->count(3)
        ->hasAttached(\App\Models\Role::factory()->count(1))
        ->hasAttached(\App\Models\Shift::factory()->count(3))
        ->create();
    }
}
