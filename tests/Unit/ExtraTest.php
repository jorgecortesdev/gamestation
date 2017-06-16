<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Configuration;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExtraTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_does_not_allow_add_product_type_without_active_product()
    {
        $extra = create('App\Extra');

        $productType = create('App\ProductType');

        $this->expectException('Exception');

        $extra->addProductType($productType);
    }

    /** @test */
    public function it_has_product_types()
    {
        $extra = create('App\Extra');

        $product = create('App\Product');
        $product->activate();

        $extra->addProductType($product->productType);

        $this->assertCount(1, $extra->productTypes);
    }

    /** @test */
    public function it_can_add_multiple_product_types()
    {
        $extra = create('App\Extra');

        $productTypes = [];
        for ($i = 1; $i < 3; $i++) {
            $productType = create('App\Product')
                ->activate()
                ->productType;
            $productTypes[$productType->id] = $i;
        }

        $extra->addProductTypes($productTypes);

        $this->assertCount(2, $extra->productTypes);
    }

    /** @test */
    public function it_has_variable_cost_when_it_has_product_types()
    {
        $extra = create('App\Extra');

        $variableCost = 0;
        $productTypes = [];

        for ($i = 1; $i < 3; $i++) {
            $price = 5.0;
            $product = create('App\Product', ['price' => $price])
                ->activate();
            $productTypes[$product->productType->id] = $i;
            $variableCost += ($product->unitPrice * $i);
        }

        $extra->addProductTypes($productTypes);

        $this->assertSame($variableCost, $extra->variableCost);
    }

    /** @test */
    function it_has_configurations_for_an_event()
    {
        $event = create('App\Event');
        $extra = create('App\Extra');
        $productType = create('App\ProductType', ['configurable' => true]);

        $event->extras()->sync([
            $extra->id => [
                'quantity' => 2
            ]
        ]);

        $extra = $event->extras()->first();

        $extra->configurations()->create([
            'event_id' => $event->id,
            'product_type_id' => $productType->id,
        ]);

        $this->assertEquals(1, Configuration::count());
    }

    /** @test */
    public function it_has_contribution_margin()
    {
        $product = create('App\Product', ['price' => 5.0])
            ->activate();

        $extra = create('App\Extra', ['price' => 10.0])
            ->addProductType($product->productType);

        $this->assertSame(5.0, $extra->contributionMargin);
    }

    /** @test */
    public function it_has_utilty()
    {
        $product = create('App\Product', ['price' => 5.0])
            ->activate();

        $extra = create('App\Extra', ['price' => 10.0])
            ->addProductType($product->productType);

        $this->assertSame(2.0, $extra->utility);
    }

    /** @test */
    public function it_deletes_all_product_types_relationships_when_is_deleted()
    {
        $product = create('App\Product')->activate();

        $extra = create('App\Extra')->addProductType($product->productType);
        $extra->delete();

        $this->assertDatabaseMissing('product_typeables', ['entity_id' => $extra->id]);
    }
}
