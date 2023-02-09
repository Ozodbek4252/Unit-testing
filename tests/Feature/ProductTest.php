<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ProductTest extends TestCase
{
    use RefreshDatabase;

    public $product;

    public function setUp(): void
    {
        parent::setUp();
        $this->product = Product::factory()->create([
            'name' => 'Product 1',
            'type' => 'type 1',
            'price' => 100,
        ]);
    }

    public function test_products_route_return_ok()
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
    }

    public function test_product_has_name()
    {
        $this->assertNotEmpty($this->product->name);
    }

    public function test_products_are_not_empty()
    {
        $response = $this->get('/products');
        $response->assertSeeText($this->product->name);
    }

    public function test_auth_user_can_see_the_button()
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/products');
        $response->assertSeeText('Add to Cart');
    }

    public function test_unauth_user_cant_see_the_button()
    {
        $response = $this->get('/products');
        $response->assertDontSeeText('Add to Cart');
    }

    public function test_auth_admin_user_can_create_a_product()
    {
        $admin = User::factory()->create(['type'=>1]);

        $response = $this->actingAs($admin)->get('/products');
        $response->assertSeeText('Create Product');
    }

    public function test_unauth_user_cant_see_the_create_button()
    {
        $response = $this->get('/products');
        $response->assertDontSeeText('Create Product');
    }

    public function test_auth_admin_user_can_visit_the_product_create_route()
    {
        $admin = User::factory()->create(['type'=>1]);

        $response = $this->actingAs($admin)->get('/products/create');
        $response->assertStatus(200);
    }

    public function test_unauth_user_can_visit_the_product_create_route()
    {
        $response = $this->get('/products/create');
        $response->assertStatus(302);
    }

}
