<?php

use Faker\Generator as Faker;

$factory->define(App\Event::class, function (Faker $faker) {
    return [
        'user_id'=> $faker->randomElement(App\User::pluck('id')->toArray()),
        'title'=>$faker->sentence,
        'description'=>$faker->paragraph,
        'time'=>$faker->time('H:i:s'),
        'date'=>$faker->date('Y-m-d', 'now'),
        'location'=>$faker->country,
        'status'=>$faker->randomElement(['new', 'approved','rejected']),
        'type'=>$faker->word,
        'theme'=>$faker->word,
        'img'=>'/img/events/default.jpg',
    ];
});
