<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProductType extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_does_not_have_an_active_product_on_create()
    {
        $product = create('App\Product');

        $productType = $product->productType;

        $this->assertFalse($productType->hasActiveProduct());
        $this->assertNull($productType->activeProduct);
    }

    /** @test */
    public function it_have_an_active_product()
    {
        $product = create('App\Product');

        $productType = $product->productType;

        $product->activate();

        $this->assertTrue($productType->hasActiveProduct());
        $this->assertInstanceOf('App\Product', $productType->activeProduct);
    }

    /** @test */
    public function it_doesn_not_have_active_product_when_a_product_is_deactivated()
    {
        $product = create('App\Product');

        $product->activate();
        $product->deactivate();

        $productType = $product->fresh()->productType;

        $this->assertFalse($productType->hasActiveProduct());
        $this->assertNull($productType->activeProduct);
    }
}
