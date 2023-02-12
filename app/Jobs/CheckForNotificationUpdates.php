<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class CheckForNotificationUpdates implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    
    //Shift model linked to the existing notification
    public $shift;
    
    //Notification model that is being checked.
    public $notification;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($shift)
    {
        $this->shift = $shift;
        $this->notification = $shift->notification;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        dd($this->notification);
        //Checks if office status was updated. And archives a the related notification for the user if filled in.
        if($this->shift->in_office == 1 || $this->shift->in_office == 2) {
            $this->notification->archived = 1;
            $this->notification->save();
        }
    }
}
