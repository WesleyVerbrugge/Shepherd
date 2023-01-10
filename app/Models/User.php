<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shift;
use App\Models\Role;
use Database\Factories\UserFactory;

class User extends Model
{
    use HasFactory;

    // Defines fillable properties on database entry for this model.
    public $fillable = [
        'username',
        'e_mail',
        'full_name',
        'superintendent_id'
    ];

    // Defines factory belonging to the user model.
    protected static function newFactory()
    {
        return UserFactory::new();
    }

    //Defines the many to many relationship between shifts and users.
    public function shifts()
    {
        return $this->belongsToMany(Shift::class);
    }

    // Defines the many to many relationship between roles and users.
    public function roles()
    {
        return $this->belongsToMany(Role::class);
    }
    
    // defines the one to one relationship between a user and another user that should receive updates about their notifications as well. (Team Lead)
    public function superIntendent() {
        return $this->belongsTo(User::class , 'superintendent_id');
    }
}
