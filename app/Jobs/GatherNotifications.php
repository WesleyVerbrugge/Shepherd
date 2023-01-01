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

    public $shiftsWithOpenAction;

    public $currentTimestamp;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->currentTimestamp = Carbon::today()->addDays(7)->format("Y-m-d");

        $this->shiftsWithOpenAction = Shift::whereDate('shift_start_details', '<=', $this->currentTimestamp)->where('in_office', '=', 0)->get();

        foreach($this->shiftsWithOpenAction as $shift) {
            $notification_description = "Voor datum: " . Carbon::parse($shift->shift_start_details)->format("d-m-Y") . " is reeds nog geen bezetting ingevuld! Je actie wordt vereist!";

            foreach($shift->users()->get() as $user){
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
