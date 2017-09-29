<?php

use Faker\Generator as Faker;

$factory->define(App\Announcement::class, function (Faker $faker) {
    return [
        'title'=>$faker->sentence,
        'announcement'=>$faker->paragraph,
        'user_id'=>$faker->randomElement(App\User::pluck('id')->toArray()),
    ];
});
