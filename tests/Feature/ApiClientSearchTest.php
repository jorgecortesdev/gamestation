<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ApiClientSearchTest extends TestCase
{
    use DatabaseMigrations;

    protected $client;

    public function setUp()
    {
        parent::setUp();

        $this->signIn();

        $this->client = create('App\Client', ['name' => 'John Doe']);
    }

    /** @test */
    function an_unauthenticated_user_can_not_see_client_information()
    {
        $this->post('/logout');

        $this->expectException('Illuminate\Auth\AuthenticationException');

        $this->json('GET', '/api/v1/client/' . $this->client->id);
    }

    /** @test */
    function an_authenticated_user_may_fetch_client_information_by_client_id()
    {
        $response = $this->json('GET', '/api/v1/client/' . $this->client->id);

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'name' => $this->client->name
                ]
            ]);
    }

    /** @test */
    function an_authenticated_user_may_search_by_client_name_for_select2_component()
    {
        $response = $this->json('GET', '/api/v1/client/search/select2?q=joh');

        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'items' => [
                        ['text' => $this->client->name]
                    ]
                ]
            ]);
    }
}
