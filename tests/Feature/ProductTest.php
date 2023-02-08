<?php

namespace Tests\Feature;

use App\Models\Product;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public function test_products_route_return_ok()
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
    }

    public function test_product_has_name()
    {
        $product = Product::factory()->create([
            'name' => 'Product 1',
            'type' => 'type 1',
            'price' => 100,
        ]);

        $this->assertNotEmpty($product->name);
    }

    public function test_products_are_empty()
    {
        $response = $this->get('/products');
        $response->assertSeeText('No products found');
    }

    public function test_products_are_not_empty()
    {
        $product =  Product::factory()->create([
            'name' => 'Product 1',
            'type' => 'type 1',
            'price' => 100,
        ]);
        $response = $this->get('/products');
        $response->assertSeeText($product->name);
    }
}
