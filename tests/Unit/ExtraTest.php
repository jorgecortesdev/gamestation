<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Configuration;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ExtraTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_extra_can_have_configurations_for_an_event()
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
}
