<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class PropertiesTest extends TestCase
{
    use DatabaseMigrations;

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
