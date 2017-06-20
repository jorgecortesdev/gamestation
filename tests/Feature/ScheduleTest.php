<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class ScheduleTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    function an_unauthenticated_user_is_redirected_to_login_page_if_try_to_see_it()
    {
        $this->withExceptionHandling();

        $this->get('/schedule')
            ->assertRedirect('/login');
    }
}
