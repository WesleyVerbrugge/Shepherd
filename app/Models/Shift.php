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
    private $shiftTypeTranslatables = [
        1 => 'Day',
        2 => 'Evening',
        3 => 'Night'
    ];

    private $inOfficeTranslatables = [
        1 => 'Unknown',
        2 => 'Pressent',
        3 => 'Out of office'
    ];

    // Function to be able to get the in office translations inside of regular logic.
    public function translateInOfficeType(Integer $in_office) {
        return $this->inOfficeTranslatables[$user_type];
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
    public function translateShiftType(Integer $user_type) {
        return $this->shiftTypeTrnslatables[$user_type];
    }
}
