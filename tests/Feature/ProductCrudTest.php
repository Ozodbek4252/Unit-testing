<?php

namespace Tests\Feature;

use App\Models\Product;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductCrudTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_can_store_new_product()
    {
        $admin = User::factory()->create(['type' => 1]);

        $response = $this->actingAs($admin)->post('/products', [
            'name' => 'Apple',
            'type' => 'Fruit',
            'price' => 2.99,
        ]);
        $response->assertSessionHasNoErrors();

        $response->assertRedirect('/products');

        $this->assertCount(1, Product::all());

        $this->assertDatabaseHas('products', [
            'name' => 'Apple',
            'type' => 'Fruit',
            'price' => 2.99,
        ]);
    }

    public function test_admin_can_see_the_edit_product_page()
    {
        $admin = User::factory()->create(['type' => 1]);
        $product = Product::factory()->create();

        $response = $this->actingAs($admin)->get('/products/' . $product->id . '/edit');

        $response->assertStatus(200);

        $response->assertViewIs('front.products.edit');

        $response->assertViewHas('product');

        $response->assertSee($product->name );
    }

    public function test_admin_can_update_product()
    {
        $admin = User::factory()->create(['type' => 1]);
        $product = Product::factory()->create();

        $this->assertCount(1, Product::all());

        $response = $this->actingAs($admin)->put('/products/' . $product->id, [
            'name' => 'Apple',
            'type' => 'Fruit',
            'price' => 2.99,
        ]);

        $response->assertSessionHasNoErrors();

        $response->assertRedirect('/products');

        $this->assertEquals($product->id, Product::first()->id);
        $this->assertEquals('Apple', Product::first()->name);

        $this->assertCount(1, Product::all());

        $this->assertDatabaseHas('products', [
            'name' => 'Apple',
            'type' => 'Fruit',
            'price' => 2.99,
        ]);
    }

    public function test_admin_can_delete_product()
    {
        $admin = User::factory()->create(['type' => 1]);
        $product = Product::factory()->create();

        $this->assertCount(1, Product::all());

        $response = $this->actingAs($admin)->delete('/products/' . $product->id);

        $response->assertSessionHasNoErrors();

        $response->assertStatus(302);

        $response->assertRedirect('/products');

        $this->assertCount(0, Product::all());
    }
}
