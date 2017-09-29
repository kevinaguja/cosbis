<?php

use Faker\Generator as Faker;


$factory->define(App\User::class, function (Faker $faker) {
    static $password;

    return [
        'firstname' => $faker->firstName,
        'lastname' => $faker->lastName,
        'email' => $faker->unique()->safeEmail,
        'is_verified' => $faker->boolean(1),
        'student_number' => str_random(15),
        'phone' => $faker->phoneNumber,
        'role_id' => $faker->randomElement(App\Role::pluck('id')->toArray()),
        'is_suspended' => $faker->boolean(0),
        'password' => $password ?: $password = bcrypt('secret'),
        'remember_token' => str_random(15),
    ];
});
