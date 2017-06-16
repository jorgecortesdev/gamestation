<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Configuration;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ComboTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function a_combo_can_have_configurations_for_an_event()
    {
        $event = create('App\Event');
        $productType = create('App\ProductType', ['configurable' => true]);

        $event->combo->configurations()->create([
            'event_id' => $event->id,
            'product_type_id' => $productType->id,
        ]);

        $this->assertEquals(1, Configuration::count());
    }

   /** @test */
    public function it_does_not_allow_add_product_type_without_active_product()
    {
        $combo = create('App\Combo');

        $productType = create('App\ProductType');

        $this->expectException('Exception');

        $combo->addProductType($productType);
    }

    /** @test */
    public function it_has_product_types()
    {
        $combo = create('App\Combo');

        $product = create('App\Product');
        $product->activate();

        $combo->addProductType($product->productType);

        $this->assertCount(1, $combo->productTypes);
    }

    /** @test */
    public function it_has_variable_cost_when_it_has_product_types()
    {
        $combo = create('App\Combo');

        $variableCost = 0;
        $productTypes = [];

        for ($i = 1; $i < 3; $i++) {
            $price = 5.0;
             $product = create('App\Product', ['price' => $price])
                ->activate();
            $productTypes[$product->productType->id] = $i;
            $variableCost += ($product->unitPrice * $i);
        }

        $combo->addProductTypes($productTypes);

        $this->assertSame($variableCost, $combo->variableCost);
    }

    /** @test */
    public function it_has_contribution_margin()
    {
        $product = create('App\Product', ['price' => 5.0])
            ->activate();

        $combo = create('App\Combo', ['price' => 10.0])
            ->addProductType($product->productType);

        $this->assertSame(5.0, $combo->contributionMargin);
    }

    /** @test */
    public function it_has_utilty()
    {
        $product = create('App\Product', ['price' => 5.0])
            ->activate();

        $combo = create('App\Combo', ['price' => 10.0])
            ->addProductType($product->productType);

        $this->assertSame(2.0, $combo->utility);
    }

    /** @test */
    public function it_deletes_all_product_types_relationships_when_is_deleted()
    {
        $product = create('App\Product')->activate();

        $combo = create('App\Combo')->addProductType($product->productType);
        $combo->delete();

        $this->assertDatabaseMissing('product_typeables', ['entity_id' => $combo->id]);
    }
}
