<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function it_has_a_client()
    {
        $event = create('App\Event');

        $this->assertInstanceOf('App\Client', $event->client);
    }
}
