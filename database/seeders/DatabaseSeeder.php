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
        $firstShifts = \App\Models\Shift::factory()->count(1)->create();
        dd($firstShifts);
        $firstUser = new User;
        $firstUser->full_name = "Harry Visser";
        $firstUser->e_mail = "harry.visser@vodafoneziggo.com";
        $firstUser->username = "Harry.V";
        $firstUser->shifts()->attach($firstShifts);
        $firstUser->save();

        // Creates first few connection interfaces for several developers and front-end that is authenticatable.

        $firstInterface = New ConnectionInterface;
        $firstInterface->ip_adress = "127.0.0.1";
        $firstInterface->token = "68cd166f-fc2e-4b36-a597-20fc5721b89c";
        $firstInterface->save();
        
        $testInterface1 = New ConnectionInterface;
        $testInterface1->ip_adress = "145.87.242.169";
        $testInterface1->token = "WNtrCh0if4bmd9YPUQsSUjoMUVI1Oc4ClnlipUXUU8KP7olU7kqMWDJ7G175ELfOSWSGOlf40FHv21JiU39VrU3RXrrKLX93AK5wybvtMrwUkEnXhmuBw7jzVOfw6Dix";
        $testInterface1->save();
            
        $testInterface2 = New ConnectionInterface;
        $testInterface2->ip_adress = "94.211.44.18";
        $testInterface2->token = "ZoFPpWVvR17azWHY5wx6aqVWUE33iQM8BfxxUNQxRkl6LU1wrxVW1nFDGauhUgmmWobLNHcCUE4etCsm28z5x4PDZty0VuaoIg4GEtv5ItXRxl7s3ErbLaXVcmUu6R2Q";    
        $testInterface2->save();
        
        //Generates rest of the test data.

        \App\Models\User::factory()
        ->count(3)
        ->hasAttached(\App\Models\Role::factory()->count(1))
        ->hasAttached(\App\Models\Shift::factory()->count(3))
        ->create();
    }
}
