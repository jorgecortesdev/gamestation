<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ProductTypesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_unauthenticated_user_can_not_browse_product_types()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get('/product-types');
    }

    /** @test */
    function an_unauthenticated_user_is_redirected_to_login_page()
    {
        $this->withExceptionHandling();

        $this->get('/product-types')
            ->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_user_can_browse_all_product_types()
    {
        $this->signIn();

        $productType = create('App\ProductType');

        $this->get('/product-types')
            ->assertSee($productType->name);
    }
}
