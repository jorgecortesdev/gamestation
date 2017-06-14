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
}
