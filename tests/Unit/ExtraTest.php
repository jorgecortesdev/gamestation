<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Configuration;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ExtraTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_extra_can_have_configurations_for_an_event()
    {
        $event = create('App\Event');
        $extra = create('App\Extra');

        $event->extras()->sync([
            $extra->id => [
                'quantity' => 2
            ]
        ]);

        $extra = $event->extras()->first();

        $extra->configurations()->create([
            'event_id' => $event->id,
            'product_type_id' => 3,
        ]);

        $this->assertEquals(1, Configuration::count());
    }
}
