<?php

namespace Tests\Feature;

use App\Models\Vendor;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ProductTest extends TestCase
{
  use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function test_example(): void
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_product_can_be_created(){
      $vendor = new Vendor();
      $vendor->vendor_code = 1111;
      $vendor->vendor_name = 'SAMURAI商店';
      $vendor->save();

      $product = [
        'product_name' => 'テスト商品',
        'price' => 123,
        'vendor_code' => 1111,
        'image_name' => null
      ];
      $this->post(route('products.store'), $product);

      $this->assertDatabaseHas('products', $product);
    }
}
