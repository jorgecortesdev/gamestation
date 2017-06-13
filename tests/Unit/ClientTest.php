<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Database\QueryException;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class ClientTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_new_client_must_have_a_unique_name()
    {
        $client = create('App\Client');

        $this->expectException(QueryException::class);

        $newClient = create('App\Client', ['name' => $client->name]);
    }
}
