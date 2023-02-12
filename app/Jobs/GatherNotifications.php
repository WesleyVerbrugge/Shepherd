<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\User;
use App\Models\Shift;
use App\Models\Notification;
use Carbon\Carbon;

class GatherNotifications implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    //Shift with open occupancy to be filled in with in 7 days.
    public $shiftsWithOpenAction;
    
    //Current timestamp with additional 7 days for query.
    public $currentTimestamp;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //Takes current time and adds 7 days on top as well as formatting for SQL query.
        $this->currentTimestamp = Carbon::today()->addDays(7)->format("Y-m-d");
        
        //Takes all shifts with unfilled occupancy's and gathers them.
        $this->shiftsWithOpenAction = Shift::whereDate('shift_start_details', '<=', $this->currentTimestamp)->where('in_office', '=', 1)->get();
        
        //For each shift with an open occupancy a notification is generated for the designated shift.
        foreach($this->shiftsWithOpenAction as $shift) {
            $notification_description = "Voor datum: " . Carbon::parse($shift->shift_start_details)->format("d-m-Y") . " is reeds nog geen bezetting ingevuld! Je actie wordt vereist!";
            
            //Gets the user information that is linked to the shift with open occupancy to fill in for the notification model.
            foreach($shift->users()->get() as $user){
                //Checks in database if for whatever reason there already exists a notification for the specific shift.
                $newNotification = Notification::firstOrNew(
                    ['description' =>  $notification_description],
                    ['shift_id' => $shift->id, 'archived' => false, 'user_id' => $user->id, 'superintendent_id' => $user->superIntendent()->first()->id],
                    );
                $newNotification->save();
            }
        }
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
    }
}
