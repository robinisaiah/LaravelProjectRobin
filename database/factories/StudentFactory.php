<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Student;
use Faker\Generator as Faker;

$factory->define(Student::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'age' => $faker->numberBetween(18, 60), // Generate a random age between 18 and 60
        'country' => $faker->country,           // Generate a random country name
    ];
});
