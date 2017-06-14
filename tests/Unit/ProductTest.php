<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProductTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_price_stored_in_cents()
    {
        $product = create('App\Product', [
            'price' => '150',
            'quantity' => 2,
        ]);

        $this->assertEquals(15000, $product->getAttributes()['price']);
    }

    /** @test */
    public function it_returns_price_in_pesos()
    {
        $product = create('App\Product', [
            'price' => '150',
            'quantity' => 2
        ]);

        $this->assertEquals(150, $product->price);
    }

    /** @test */
    public function it_has_unit_price()
    {
        $product = create('App\Product', [
            'price' => 150,
            'quantity' => 2
        ]);

        $this->assertEquals(75, $product->unitPrice);
    }

    /** @test */
    public function it_does_not_have_iva_if_is_set_to_null()
    {
        $product = create('App\Product', [
            'iva' => null
        ]);

        $this->assertFalse($product->getAttributes()['iva']);
    }

    /** @test */
    public function it_returns_zero_if_no_iva_defined()
    {
        $product = create('App\Product', [
            'iva' => null
        ]);

        $this->assertSame(0, $product->iva);
    }

    /** @test */
    public function it_returns_iva_if_is_defined()
    {
        $product = create('App\Product', [
            'price' => 116,
            'quantity' => 2,
            'iva' => true
        ]);

        $this->assertSame(16.0, $product->iva);
    }

    /** @test */
    public function it_has_an_unity()
    {
        $product = create('App\Product');

        $this->assertInstanceOf('App\Unity', $product->unity);
    }

    /** @test */
    public function it_has_a_product_type()
    {
        $product = create('App\Product');

        $this->assertInstanceOf('App\ProductType', $product->productType);
    }

}
