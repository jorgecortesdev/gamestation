<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class EventsTest extends TestCase
{
    use DatabaseMigrations;

    protected $event;

    public function setUp()
    {
        parent::setUp();

        $this->event = create('App\Event');
    }

    /** @test */
    public function guests_cannot_browse_events()
    {
        $this->withExceptionHandling()
            ->get('/events')
            ->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_user_can_browse_events()
    {
        $this->signIn();

        $this->get('/events')
            ->assertSee($this->event->client->name);
    }

    /** @test */
    public function an_authenticated_user_can_view_a_single_event()
    {
        $this->signIn();

        $this->get($this->event->path())
            ->assertSee('Evento # ' . $this->event->id);
    }

    /** @test */
    public function an_authenticated_user_can_edit_an_event()
    {
        $this->signIn();

        $this->get($this->event->path() . '/edit')
            ->assertSee('Editar Evento # ' . $this->event->id);
    }
}