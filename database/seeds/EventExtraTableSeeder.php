<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventExtraTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = Event::find(5);

        $extra[1] = ['quantity' => 10];
        $extra[2] = ['quantity' => 5];
        $extra[3] = ['quantity' => 1];
        $extra[4] = ['quantity' => 1];
        $extra[5] = ['quantity' => 1];

        $event->extras()->sync($extra);

        $event = Event::find(3);

        $extra = [];
        $extra[4] = ['quantity' => 1];
        $extra[3] = ['quantity' => 1];

        $event->extras()->sync($extra);
    }
}
