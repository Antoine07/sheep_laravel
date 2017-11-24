<?php

use Faker\Generator as Faker;

$factory->define(App\Spend::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
        'price' => $faker->randomFloat(2,5, 4000),
        'status' => rand(1,10) === 1 ? 'account' : 'paid',
        'description' => $faker->paragraph(rand(2,5))
    ];
});
