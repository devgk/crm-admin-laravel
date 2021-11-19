<?php

namespace Tests\Feature;

use Tests\TestCase;
use App\Models\User;
use App\Models\Product;
use App\Models\ProductCategory;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        // Create Test Admin User
        $user = User::factory()->create(['role' => 1]);

        // Try to access manage category page
        $response = $this->actingAs($user)->get('/category');
        $response->assertStatus(200);

        // Create Product Category User
        $category = ProductCategory::make([
            'name' => 'Test Category',
            'slug' => 'test-category',
            'description' => 'Test Category'
        ]);

        $response->assertStatus(200);

        // Try to access manage product page
        $response = $this->actingAs($user)->get('/product');
        $response->assertStatus(200);

        // Create Product Category User
        $category = Product::make([
            'name' => 'Test Product',
            'slug' => 'test-product',
            'description' => 'Test Product',
            'price' => 100,
            'category_id' => 1
        ]);

        $response->assertStatus(200);
    }
}
