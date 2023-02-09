<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Courses;
use App\Models\User;
use Faker\Generator as Faker;

$factory->define(Courses::class, function (Faker $faker) {
    return [
        'name' => $faker->word,
        'description' => $faker->paragraph(1),
        'status' => $faker->randomElement([Course::PUBLISHED_COURSE, Course::UNPUBLISHED_COURSE]),
        'image' => $faker->randomElement(['1.jpg', '2.jpg', '3.jpg']),
        'instructor_id' => User::all()->random()->id, //select single user
    ];
});
