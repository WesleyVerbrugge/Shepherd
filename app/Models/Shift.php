<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        1 => 'Unknown',
        2 => 'Pressent in office',
        3 => 'Out of office'
    ];

    // Function to be able to get the shift type translations inside of regular logic.
    public function translateShiftType(Integer $user_type) {
        return $this->shiftTypeTrnslatables[$user_type];
    }
}
