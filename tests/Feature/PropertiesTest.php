<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PropertiesTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_unauthenticated_user_can_not_browse_properties()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->get('/properties');
    }

    /** @test */
    function an_unauthenticated_user_is_redirected_to_login_page()
    {
        $this->withExceptionHandling();

        $this->get('/properties')
            ->assertRedirect('/login');
    }

    /** @test */
    public function an_authenticated_user_can_view_all_properties()
    {
        $this->signIn();

        $property = create('App\Property');

        $this->get('/properties')
            ->assertSee($property->label);
    }

    /** @test */
    public function an_authenticated_user_can_delete_a_property()
    {
        $this->signIn();

        $property = create('App\Property');

        $this->delete('/properties/' . $property->id);

        $this->assertDatabaseMissing('properties', ['id' => $property->id]);
    }
}
