<?php

use Faker\Generator as Faker;

$factory->define(App\Gallery::class, function (Faker $faker) {
    return [
        //
        'name' => $faker->sentence(1,true),
        'description' => $faker->text(600),
    ];
});
