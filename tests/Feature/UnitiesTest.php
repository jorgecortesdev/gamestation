<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UnitiesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_unauthenticated_user_can_not_browse_unities()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get('/unities');
    }

    /** @test */
    function an_unauthenticated_user_is_redirected_to_login_page()
    {
        $this->withExceptionHandling();

        $this->get('/unities')
            ->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_user_can_view_all_unities()
    {
        $this->signIn();

        $unity = create('App\Unity');

        $this->get('/unities')
            ->assertSee($unity->name);
    }

    /** @test */
    public function an_authenticated_user_can_create_a_new_unity()
    {
        $this->signIn();

        $response = $this->post('/unities', ['name' => 'foo']);

        $this->get($response->headers->get('Location'))
            ->assertSee('foo');
    }

    /** @test */
    public function an_authenticated_user_can_delete_a_unity()
    {
        $this->signIn();

        $unity = create('App\Unity');

        $this->delete('/unities/' . $unity->id);

        $this->assertDatabaseMissing('unities', ['id' => $unity->id]);
    }
}
