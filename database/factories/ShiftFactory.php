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
        $faker = Faker\Factory::create();
        $dateTimeFormattedA = Carbon::now();
        $dateTimeFormattedB = $dateTimeFormattedA->add(1, "hour")->format("Y.m.d H:i:s");
        $dateTimeFormattedA = $dateTimeFormattedA->format("Y.m.d H:i:s");

        return [
            'shift_start_details' => $dateTimeFormattedA,
            'shift_end_details' => $dateTimeFormattedB,
            'shift_type' => 1,
            'in_office' => 0
        ];
    }
}
