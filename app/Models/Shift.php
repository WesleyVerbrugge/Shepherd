<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Notification;

class Shift extends Model
{
    use HasFactory;

    // Defines fillable properties on database entry for this model.
    public $fillable = [
        'shift_start_details',
        'shift_end_details',
        'shift_type',
        'in_office'
    ];

    // Defines the translations of the status numbers saved to the database entries.
    public $shiftTypeTranslatables = [
        0 => 'Day',
        1 => 'Evening',
        2 => 'Night'
    ];

    public $inOfficeTranslatables = [
        0 => 'Unknown',
        1 => 'Pressent',
        2 => 'Out of office'
    ];

    // Function to be able to get the in office translations inside of regular logic.
    public function translateInOfficeType(Int $in_office) {
        return $this->inOfficeTranslatables[$in_office];
    }

    // Defines the inverse of the many to many relationship with users
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    // Defines the inverse of the one to one relationship with notifications
    public function notification(){
        return $this->hasOne(Notification::class);
    }

    // Function to be able to get the shift type translations inside of regular logic.
    public function translateShiftType(Int $shift_type) {
        return $this->shiftTypeTranslatables[$shift_type];
    }
}
