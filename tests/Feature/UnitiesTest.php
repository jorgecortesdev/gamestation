<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class UnitiesTest extends TestCase
{
    use DatabaseMigrations;

    public function setUp()
    {
        parent::setUp();

        $this->signIn();
    }

    /** @test */
    public function an_authenticated_user_can_view_all_unities()
    {
        $unity = create('App\Unity');

        $this->get('/unities')
            ->assertSee($unity->name);
    }

    /** @test */
    public function an_authenticated_user_can_create_a_new_unity()
    {
        $response = $this->post('/unities', ['name' => 'foo']);

        $this->get($response->headers->get('Location'))
            ->assertSee('foo');
    }

    /** @test */
    public function an_authenticated_user_can_delete_a_unity()
    {
        $unity = create('App\Unity');

        $this->delete('/unities/' . $unity->id);

        $this->assertDatabaseMissing('unities', ['id' => $unity->id]);
    }
}
