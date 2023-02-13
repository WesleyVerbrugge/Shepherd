<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\ConnectionInterface;
use App\Models\Role;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // Creates the first few default roles (Employee, Team-lead, Developer).
        
        $defaultRole1 = new Role;
        $defaultRole1->name = "Employee";
        $defaultRole1->description = "Somebody working as a advisor for Vodafone Ziggo";
        $defaultRole1->clearance_level = 1;
        $defaultRole1->save();
        
        $defaultRole2 = new Role;
        $defaultRole2->name = "Team-Lead";
        $defaultRole2->description = "Somebody working as a team-lead for Vodafone Ziggo";
        $defaultRole2->clearance_level = 2;
        $defaultRole2->save();
        
        $defaultRole3 = new Role;
        $defaultRole3->name = "Developer";
        $defaultRole3->description = "Someone working on improving the CBuddy system'";
        $defaultRole3->clearance_level = 3;
        $defaultRole3->save();
        
        // Creates the first test user which for testing purposes is our super intendent and has the team-lead role.
        $firstUser = new User;
        $firstUser->full_name = "Harry Visser";
        $firstUser->e_mail = "harry.visser@vodafoneziggo.com";
        $firstUser->username = "Harry.V";
        $firstUser->save();
        $firstUser->roles()->attach($defaultRole2->id);
        
        // Creates 3 shifts for the second test user.
        
        $secondUserShifts = \App\Models\Shift::factory()->count(3)->create();
        
        // Creates the second test user with developer and employee role.  
            
        $secondUser = new User;
        $secondUser->full_name = "Wesley Verbrugge";
        $secondUser->e_mail = "wesley.verbrugge@vodafoneziggo.com";
        $secondUser->username = "R3solution";
        $secondUser->save();
        foreach($secondUserShifts as $shift) {
        $secondUser->shifts()->attach($shift->id);
        }
        $secondUser->roles()->attach($defaultRole3->id);
        $secondUser->roles()->attach($defaultRole1->id);
        
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
        
        //Generates a few test users and a couple of shifts linked to them..
        
        \App\Models\User::factory()
        ->count(1)
        ->hasAttached($defaultRole1)
        ->hasAttached(\App\Models\Shift::factory()->count(3))
        ->create();
        
        \App\Models\User::factory()
        ->count(1)
        ->hasAttached($defaultRole1)
        ->hasAttached(\App\Models\Shift::factory()->count(3))
        ->create();
        
        \App\Models\User::factory()
        ->count(1)
        ->hasAttached($defaultRole1)
        ->hasAttached(\App\Models\Shift::factory()->count(3))
        ->create();
        
    }
}
