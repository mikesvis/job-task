<?php

/** @var \Illuminate\Database\Eloquent\Factory $factory */

use App\Models\Product;
use App\Models\Category;
use Faker\Generator as Faker;

$factory->define(Product::class, function (Faker $faker) {
    return [
        'title' => $faker->name,
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


$categories = Category::where('id', '!=', 1)->get();

$factory->afterCreating(Product::class, function($good, $faker) use ($categories){
    $good->categories()->attach(
        $categories->random(rand(1,3))->pluck('id')->toArray()
    );
});
