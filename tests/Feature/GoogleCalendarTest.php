<?php

namespace Tests\Feature;

use Carbon\Carbon;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class GoogleCalendarTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_authenticated_user_may_verify_if_a_date_is_available()
    {
        // Given we are sign in
        $this->signIn();

        // When a user hits the provided endpoint

        $response = $this->json('POST', '/api/v1/calendar/verify', ['start' => Carbon::now()->toDateTimeString()]);

        // Then we should get a response if is available or busy
        $response->assertStatus(200)
            ->assertJson([
                'data' => [
                    'busy' => false
                ]
            ]);
    }
}
