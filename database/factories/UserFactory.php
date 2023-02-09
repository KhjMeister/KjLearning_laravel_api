<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

use App\Models\User;
use Faker\Generator as Faker;
use Illuminate\Support\Str;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
class UserFactory extends Factory
{
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        static $password;
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => Str::random(10),
            'picture' => Str::random(10),
            'password' => $password ?: $password = bcrypt('secret'), // secret
            'verified' => $verified = $this->faker->randomElement([User::VERIFIED_USER, User::UNVERIFIED_USER]),
            'verification_token' => $verified == User::VERIFIED_USER ? null : User::generateVerificationToken(),
            'admin' => $this->faker->randomElement([User::ADMIN_USER, User::REGULAR_USER]),
            'email_verified_at' => now(),
            'remember_token' => Str::random(10)
    
        ];
    }

    /**
     * Indicate that the model's email address should be unverified.
     *
     * @return static
     */
    public function unverified()
    {
        return $this->state(function (array $attributes) {
            return [
                'email_verified_at' => null,
            ];
        });
    }
}




// $factory->define(User::class, function (Faker $faker) {

//     static $password;

//     return [
//         'name' => $faker->name,
//         'email' => $faker->unique()->safeEmail,
//         'phone' => $faker->unique()->phone,
//         'picture' => Str::random(10),
//         'password' => $password ?: $password = bcrypt('secret'), // secret
//         'verified' => $verified = $faker->randomElement([User::VERIFIED_USER, User::UNVERIFIED_USER]),
//         'verification_token' => $verified == User::VERIFIED_USER ? null : User::generateVerificationToken(),
//         'admin' => $faker->randomElement([User::ADMIN_USER, User::REGULAR_USER]),
//         'email_verified_at' => now(),
//         'remember_token' => Str::random(10)

//     ];
// });
