<?php

use Faker\Generator as Faker;

$factory->define(App\Image::class, function (Faker $faker) {
    return [
        'imageUrl' => $faker->imageUrl(800, 400, 'cats', true, 'Faker'),
    ];
});
