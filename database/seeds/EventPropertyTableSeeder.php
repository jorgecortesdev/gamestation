<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventPropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $event = Event::find(3);

        $property = $event->combo->properties->first();

        $event->properties()->sync([$property->id => ['value' => '5:30 pm']]);

        $event = Event::find(6);

        $property = $event->combo->properties->first();

        $event->properties()->sync([$property->id => ['value' => '5:30 pm']]);
    }
}
