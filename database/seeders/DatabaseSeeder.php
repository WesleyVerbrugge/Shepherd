<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ConnectionInterface;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Creates the first user which for testing purposes is our super intendent.

        $firstUser = new User;
        $firstUser->full_name = "Harry Visser";
        $firstUser->e_mail = "harry.visser@vodafoneziggo.com";
        $firstUser->username = "Harry.V";
        $firstUser->save();

        // Creates first test interface that is authenticatable.

        $firstInterface = New ConnectionInterface;
        $firstInterface->ip_adress = "127.0.0.1";
        $firstInterface->token = "68cd166f-fc2e-4b36-a597-20fc5721b89c";
        $firstInterface->save();

        //Generates rest of the test data.

        \App\Models\User::factory()
        ->count(3)
        ->hasAttached(\App\Models\Role::factory()->count(1))
        ->hasAttached(\App\Models\Shift::factory()->count(3))
        ->create();
    }
}
