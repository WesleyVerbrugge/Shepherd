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

    public $shift;

    public $notification;

    public $updatedNotification;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($shift)
    {
        $this->shift = $shift;

        $this->notification = $shift->notification->first();
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //Checks if office status was updated. And archives a the related notification for the user if filled in.
        if($this->shift->in_office == 1 || $this->shift->in_office == 2) {
            $this->notification->archived = 1;
            $this->notification->save();
        }
    }
}
