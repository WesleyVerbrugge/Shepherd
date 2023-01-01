<?php

namespace App\Observers;

use App\Models\Shift;
use App\Jobs\CheckForNotificationUpdates;

class ShiftObserver
{
    /**
     * Handle the Shift "created" event.
     *
     * @param  \App\Models\Shift  $shift
     * @return void
     */
    public function created(Shift $shift)
    {
        //
    }

    /**
     * Handle the Shift "updated" event.
     *
     * @param  \App\Models\Shift  $shift
     * @return void
     */
    //When shift is updated, which is when in_office is edited. Update notification job is dispatched.
    public function updated($shift)
    {
        //check if the updated model had its in_office field updated. If so dispatches the CheckForNotificationUpdates job
        if($shift->isDirty('in_office')){
            CheckForNotificationUpdates::dispatch($shift);
        }
    }

    /**
     * Handle the Shift "deleted" event.
     *
     * @param  \App\Models\Shift  $shift
     * @return void
     */
    public function deleted(Shift $shift)
    {
        //
    }

    /**
     * Handle the Shift "restored" event.
     *
     * @param  \App\Models\Shift  $shift
     * @return void
     */
    public function restored(Shift $shift)
    {
        //
    }

    /**
     * Handle the Shift "force deleted" event.
     *
     * @param  \App\Models\Shift  $shift
     * @return void
     */
    public function forceDeleted(Shift $shift)
    {
        //
    }
}
