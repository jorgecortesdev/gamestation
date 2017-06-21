<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class KidsTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_unauthenticated_user_can_not_browse_kids()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get('/kids');
    }

    /** @test */
    function an_unauthenticated_user_is_redirected_to_login_page()
    {
        $this->withExceptionHandling();

        $this->get('/kids')
            ->assertRedirect('/login');
    }
}
