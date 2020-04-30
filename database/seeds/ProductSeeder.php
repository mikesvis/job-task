<?php

use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the product seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = Category::where('id', '!=', 1)->get()->pluck('id')->toArray();

        factory(Product::class, 100)->create()->each(function($product) use ($categories) {
            $product->categories()->attach(Arr::random($categories, rand(1, 3)));
        });
    }
}
