<?php

use Faker\Generator as Faker;

$factory->define(\App\EventComment::class, function (Faker $faker) {
    return [
        'user_id' =>$faker->randomElement(App\User::pluck('id')->toArray()),
        'event_id'=>$faker->randomElement(App\Event::pluck('id')->toArray()),
        'comment'=>$faker->paragraph,
    ];
});
