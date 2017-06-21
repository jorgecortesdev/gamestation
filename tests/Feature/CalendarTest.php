<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CalendarTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_unauthenticated_user_is_redirected_to_login_page()
    {
        $this->withExceptionHandling();

        $this->get('/calendar')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_can_browse_events_list()
    {
        $this->signIn();

        $response = $this->getJson('/calendar?start=2017-03-27&end=2017-04-02');

        $response->assertJson([
            ['title' =>  'PLUS: Damian Delgado Soto']
        ]);
    }
}
