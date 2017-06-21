<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ClientsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_unauthenticated_user_can_not_browse_clients()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get('/clients');
    }

    /** @test */
    function an_unauthenticated_user_is_redirected_to_login_page()
    {
        $this->withExceptionHandling();

        $this->get('/clients')
            ->assertRedirect('/login');
    }
}
