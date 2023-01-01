<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $firstUser = new User;
        $firstUser->full_name = "Harry Visser";
        $firstUser->e_mail = "harry.visser@vodafoneziggo.com";
        $firstUser->username = "Harry.V";
        $firstUser->save();

        \App\Models\User::factory()
        ->count(3)
        ->hasAttached(\App\Models\Role::factory()->count(1))
        ->hasAttached(\App\Models\Shift::factory()->count(3))
        ->create();
    }
}
