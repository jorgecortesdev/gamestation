<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProductTypesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function an_authenticated_user_can_browse_all_product_types()
    {
        $this->signIn();

        $productType = create('App\ProductType');

        $this->get('/product-types')
            ->assertSee($productType->name);
    }
}
