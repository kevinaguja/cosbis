<?php

use Faker\Generator as Faker;

$factory->define(Model::class, function (Faker $faker) {
    return [
        'user_id' => $faker->randomDigit,
        'position_id' => $faker->randomDigit,
        'slogan' => $faker->paragraph,
        'statement' =>$faker->paragraph,
        'party' => $faker->randomDigit,
    ];
});
