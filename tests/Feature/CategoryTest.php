<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Category;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CategoryTest extends TestCase
{
    use DatabaseMigrations, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        factory(Category::class, 10)->create()->each(function($category) {
            $randomParent = Category::where('id', '<', $category->id)->inRandomOrder()->first();
            $category->appendToNode($randomParent)->save();
        });
    }

    /** @test */
    public function categories_tree_can_be_fetched()
    {
        $this->getJson('/api/category')
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'title',
                        'depth',
                        'parent_id',
                    ]
                ]
            ]);
    }

    /** @test */
    public function category_can_be_fetched()
    {
        $category = Category::inRandomOrder()->first();

        $this->getJson("/api/category/{$category->id}")
            ->assertStatus(200)
            ->assertJsonStructure([
                'category' => [
                    'id',
                    'title',
                    'depth',
                    'parent_id',
                ]
            ]);
    }

    /** @test */
    public function category_can_be_created()
    {
        $parent = Category::inRandomOrder()->first();

        $body = [
            'title' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'parent_id' => $parent->id
        ];

        $this->postJson('/api/category', $body)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'title',
                    'depth',
                    'parent_id',
                ]
            ]);
    }

    /** @test */
    public function category_can_be_updated()
    {
        $category = Category::where('id', '!=', 1)->inRandomOrder()->first();

        $body = [
            'title' => $this->faker->sentence($nbWords = 2, $variableNbWords = true),
            'parent_id' => 1
        ];

        $this->patchJson("/api/category/{$category->id}", $body)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'title',
                    'depth',
                    'parent_id',
                ]
            ]);
    }

    /** @test */
    public function category_can_be_deleted()
    {
        $category = Category::where('id', '!=', 1)->inRandomOrder()->first();

        $this->deleteJson("/api/category/{$category->id}");

        $this->assertDatabaseMissing('categories', ['id' => $category->id]);
    }




}
