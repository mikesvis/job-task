<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Arr;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProductTest extends TestCase
{
    use DatabaseMigrations, WithFaker;

    public function setUp(): void
    {
        parent::setUp();

        factory(Product::class, 100)->create();
    }

    /** @test */
    public function list_of_products_can_be_fetched()
    {
        $this->getJson('/api/product')
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    '*' => [
                        'id',
                        'title',
                        'description',
                        'image_path',
                    ]
                ]
            ]);
    }

    /** @test */
    public function product_can_be_fetched()
    {
        $product = Product::inRandomOrder()->first();

        $this->getJson("/api/product/{$product->id}")
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'title',
                    'description',
                    'image_path',
                ]
            ]);
    }

    /** @test */
    public function product_can_be_created()
    {
        $categories = factory(Category::class, 2)->create();

        $body = [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'description'=> $this->faker->text,
            'image_path' => '/dummy_image_here.jpg',
            'categories' => $categories->pluck('id')->toArray()
        ];

        $this->postJson('/api/product', $body)
            ->assertStatus(201)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'title',
                    'description',
                    'image_path',
                ]
            ]);
    }

    /** @test */
    public function product_can_be_updated()
    {
        $product = Product::inRandomOrder()->first();

        $categories = factory(Category::class, 2)->create();

        $body = [
            'title' => $this->faker->sentence($nbWords = 6, $variableNbWords = true),
            'description'=> $this->faker->text,
            'image_path' => '/dummy_image_here.jpg',
            'categories' => $categories->pluck('id')->toArray()
        ];

        $this->patchJson("/api/product/{$product->id}", $body)
            ->assertStatus(200)
            ->assertJsonStructure([
                'data' => [
                    'id',
                    'title',
                    'description',
                    'image_path',
                ]
            ]);
    }

    /** @test */
    public function product_can_be_deleted()
    {
        $product = Product::inRandomOrder()->first();

        $this->deleteJson("/api/product/{$product->id}");

        $this->assertDatabaseMissing('products', ['id' => $product->id]);
    }
}
