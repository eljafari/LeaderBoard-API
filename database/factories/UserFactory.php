<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

$factory->define(User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'age' => $faker->numberBetween(18, 70),
        'points' => $faker->numberBetween(0, 100),
        'address' => $faker->address,
    ];
});
