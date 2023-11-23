<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Faker\Generator as Faker;
use App\Models\User;

// $factory->define(User::class, function (Faker $faker) {
//     return [
//         'name' => $faker->name,
//         'age' => $faker->numberBetween(8, 80),
//         'points' => $faker->numberBetween(0, 200),
//         'address' => $faker->address,
//     ];
// });
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name(),
        'age' => $this->faker->numberBetween(8, 80),
        'points' => $this->faker->numberBetween(0, 200),
        'address' => $this->faker->address(),
        ];
    }
}

