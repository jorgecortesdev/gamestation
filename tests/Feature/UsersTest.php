<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UsersTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_unauthenticated_user_can_not_browse_users_list()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get('/users');
    }

    /** @test */
    function an_unauthenticated_user_is_redirected_to_login()
    {
        $this->withExceptionHandling();

        $this->get('/users')
            ->assertRedirect('/login');
    }

    /** @test */
    function an_authenticated_user_can_see_users_list()
    {
        $this->signIn();

        $user = create('App\User', ['name' => 'John Doe']);

        $this->get('users')
            ->assertSee($user->name);
    }
}
