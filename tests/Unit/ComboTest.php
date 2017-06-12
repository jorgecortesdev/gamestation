<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Configuration;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ComboTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function a_combo_can_have_configurations_for_an_event()
    {
        $event = create('App\Event');

        $event->combo->configurations()->create([
            'event_id' => $event->id,
            'product_type_id' => 3,
        ]);

        $this->assertEquals(1, Configuration::count());
    }
}
