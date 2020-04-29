<?php

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $root = Category::find(1);

        for ($i=1; $i <= 4 ; $i++) {
            Category::create([
                'title' => 'Категория '.$i,
                'children' => $this->makeChildrenArray($i),
            ], $root);
        }
    }

    /**
     * Prepare array of children nodes
     *
     * @param int|string $parent_index
     * @return void
     */
    public function makeChildrenArray($parent_index)
    {
        $result = [];

        for ($i=1; $i <= 4 ; $i++) {
            $result[] = ['title' => 'Категория '.$parent_index.'.'.$i];
        }

        return $result;
    }
}
