<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class QuantifiablesTest extends TestCase
{
    use DatabaseMigrations;

    protected $activeProducts;
    protected $extra;

    public function setUp()
    {
        parent::setUp();

        $this->signIn();

        $this->activeProducts = factory('App\Product', 3)
            ->create()->each->activate();
    }

    /** @test */
    public function an_authenticated_user_can_see_available_product_types_to_add_to_an_extra()
    {
        $extra = create('App\Extra');

        $productType = $this->activeProducts->first()->productType;

        $this->get($this->buildEndPoint($extra))
            ->assertJson([
                'available' => [
                    ['name' => $productType->name]
                ]
            ]);
    }

    /** @test */
    public function an_authenticated_user_can_see_selected_product_types_of_an_extra()
    {
        $extra = create('App\Extra');

        $productType = $this->activeProducts->first()->productType;

        $extra->addProductType($productType);

        $this->get($this->buildEndPoint($extra))
            ->assertJson([
                'selected' => [
                    ['name' => $productType->name]
                ]
            ]);
    }

    /** @test */
    public function an_authenticated_user_can_add_a_product_type_to_an_extra()
    {
        $extra = create('App\Extra');

        $productType = $this->activeProducts->first()->productType;

        $this->get($this->buildEndPoint($extra))
            ->assertJson([
                'available' => [
                    ['name' => $productType->name]
                ]
            ]);

        $this->patch($this->buildEndPoint($extra), [
            'items' => [
                ['id' => $productType->id, 'selected' => 1]
            ]
        ]);

        $this->get($this->buildEndPoint($extra))
            ->assertJson([
                'selected' => [
                    ['name' => $productType->name]
                ]
            ]);
    }

    protected function buildEndPoint($entity)
    {
        $type = get_class($entity);
        return "/api/v1/quantities/entity/{$entity->id}/type/{$type}";
    }
}
