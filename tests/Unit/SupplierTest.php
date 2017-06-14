<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class SupplierTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_has_products_associated_with_it()
    {
        $supplier = create('App\Supplier');

        $this->assertInstanceOf('Illuminate\Database\Eloquent\Collection', $supplier->products);
    }

    /** @test */
    public function it_can_add_a_product()
    {
        $supplier = create('App\Supplier');

        $supplier->addProduct([
            'name' => 'Foo',
            'quantity' => 1,
            'price' => 10,
            'iva' => null,
            'product_type_id' => create('App\ProductType')->id,
            'unity_id' => create('App\Unity')->id
        ]);

        $this->assertCount(1, $supplier->products);
    }
}
