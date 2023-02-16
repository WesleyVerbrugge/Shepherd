<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;
use Faker as Faker;
use Illuminate\Support\Facades\Hash;

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
        //Creates a faker instance for generating of fake database content.
        $faker = Faker\Factory::create();

        //Generated a fake e-mail for the user.
        $email = $faker->email();

        //Returns a factory instance on which multiple inserts in the database can be done by the seeder. The amount depending on the factory call.
        return [
            'superintendent_id' => 1,
            'username' => $email,
            'e_mail' => $email,
            'full_name' => $faker->firstName() . $faker->lastName(),
            'password' => Hash::make("test")
        ];
    }
}
