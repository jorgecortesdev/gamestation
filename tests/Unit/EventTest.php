<?php

namespace Tests\Unit;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_event_have_required_relationships()
    {
        $client = create('App\Client');

        $kid = create('App\Kid');
        $client->kids()->attach($kid);

        $combo = create('App\Combo');

        $event = create('App\Event', [
            'occurs_on' => Carbon::now(),
            'combo_id' => $combo->id,
            'client_id' => $client->id,
            'kid_id' => $kid->id
        ]);

        $this->assertInstanceOf('App\Client', $event->client);
        $this->assertInstanceOf('App\Kid', $event->kid);
        $this->assertInstanceOf('App\Combo', $event->combo);
    }
}
