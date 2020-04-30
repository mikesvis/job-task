<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->sentence($nbWords = 6, $variableNbWords = true),
        'description' => $faker->text,
        'image_path' => $faker->randomElement([
            '/test/images/good/01.jpg',
            '/test/images/good/02.jpg',
            '/test/images/good/03.jpg',
            '/test/images/good/04.jpg',
            '/test/images/good/05.jpg',
        ]),
    ];
});
