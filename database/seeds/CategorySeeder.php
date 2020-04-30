<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the category seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Category::class, 24)->create()->each(function($category) {
            $randomParent = Category::where('id', '<', $category->id)->inRandomOrder()->first();
            $category->appendToNode($randomParent)->save();
        });
    }
}
