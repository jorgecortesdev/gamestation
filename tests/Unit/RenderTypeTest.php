<?php

namespace Tests\Unit;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class RenderTypeTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function it_can_not_be_deleted_if_was_assigned_to_an_entity()
    {
        $renderType = create('App\Property')->renderType;

        $this->expectException('Illuminate\Database\QueryException');

        $renderType->delete();
    }
}
