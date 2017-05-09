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
        $values = [
            1 => '5:30 pm',
            2 => 'Mario Bros',
            3 => 'Vainilla',
            4 => 'Vaso con bombones',
            5 => 'Regalo',
            6 => 'Lunes 5'
        ];

        $events = Event::all();

        foreach ($events as $event) {
            $properties = $event->combo->properties;
            if ( ! is_null($properties)) {
                $eventProperties = [];
                foreach ($properties as $property) {
                    $eventProperties[$property->id] = ['value' => $values[$property->id]];
                }
                $event->properties()->sync($eventProperties);
            }
        }
    }
}
