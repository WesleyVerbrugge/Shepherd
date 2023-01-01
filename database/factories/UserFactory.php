<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Faker as Faker;

class UserFactory extends Factory
{
    protected $model = User::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $faker = Faker\Factory::create();
        $email = $faker->email();
        return [
            'superintendent_id' => 1,
            'username' => $email,
            'e_mail' => $email,
            'full_name' => $faker->firstName() . $faker->lastName()
        ];
    }
}
