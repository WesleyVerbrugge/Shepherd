<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Shift;
use App\Models\Role;
use Database\Factories\RoleFactory;

class Role extends Model
{
    use HasFactory;

    // Defines fillable properties on database entry for this model.
    public $fillable = [
        'role_name',
        'role_description',
        'clearance_level'
    ];

    // Defines the translations of the clearance level numbers saved to the database entries.
    private $clearanceLevelTranslatables = [
        1 => 'Unknown',
        2 => 'Pressent in office',
        3 => 'Out of office'
    ];

    // Defines factory belonging to the role model.
    protected static function newFactory()
    {
        return RoleFactory::new();
    }

    // Function to be able to get the clearance level translations inside of regular logic.
    public function translateClearanceLevel(Integer $Level) {
        return $this->shiftTypeTrnslatables[$userLevel];
    }
}
