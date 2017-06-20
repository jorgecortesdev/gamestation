<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class HomeTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_unauthenticated_user_can_not_browse_dashboard()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get('/home');
    }

    /** @test */
    function an_unauthenticated_user_is_redirected_to_login_page_if_try_to_hit_dashboard()
    {
        $this->withExceptionHandling();

        $this->get('/home')
            ->assertRedirect('/login');
    }
}
