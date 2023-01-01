<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use App\Models\Shift;

class Notification extends Model
{
    use HasFactory;

    public $fillable = [
        'description',
        'archived',
        'shift_id',
        'user_id',
        'superintendent_id'
    ];

    // Defines one to one relationship between users and notifications
    public function user() {
        return $this->hasOne(User::class);
    }

    // Defines one to one relationship between shifts and notifications
    public function shift() {
        return $this->belongsTo(Shift::class);
    }

    // Defines the one to one relationship between super intendent user (team-lead) and notification belonging to a employee (user).
    public function superIntendent() {
        return $this->hasOne(User::class, 'superintendent_id');
    }
}

