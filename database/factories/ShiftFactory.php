<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Shift;
use Faker as Faker;
use Carbon\Carbon;

class ShiftFactory extends Factory
{
    protected $model = Shift::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        //Creates a faker instance for fake filler data to be seeded into the database.
        $faker = Faker\Factory::create();
        
        //Takes current timestamp and formats it for SQL use.
        $dateTimeFormattedA = Carbon::now()->format("Y.m.d H:i:s");
        
        //Takes current timestap and adds 8 hours on top of it while formatting it for SQL use.
        $dateTimeFormattedB = Carbon::now()->addHours(8)->format("Y.m.d H:i:s");
        
        //Returns a factory instance on which multiple inserts in the database can be done by the seeder. The amount depending on the factory call.
        return [
            'shift_start_details' => $dateTimeFormattedA,
            'shift_end_details' => $dateTimeFormattedB,
            'shift_type' => 1,
            'in_office' => 1
        ];
    }
}
