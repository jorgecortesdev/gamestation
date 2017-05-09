<?php

use App\Event;
use Illuminate\Database\Seeder;

class EventsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = [
            ['occurs_on' => '2017-01-01 14:00:00', 'combo_id' => 4, 'client_id' => 1, 'kid_id' => 1],
            ['occurs_on' => '2017-04-01 17:00:00', 'combo_id' => 3, 'client_id' => 2, 'kid_id' => 2],
            ['occurs_on' => '2017-06-01 17:00:00', 'combo_id' => 3, 'client_id' => 3, 'kid_id' => 3],
            ['occurs_on' => '2017-06-02 14:00:00', 'combo_id' => 2, 'client_id' => 4, 'kid_id' => 4],
            ['occurs_on' => '2017-06-02 14:00:00', 'combo_id' => 1, 'client_id' => 5, 'kid_id' => 5],
        ];

        foreach ($events as $event) {
            $event = new Event($event);
            $event->save();
        }

        $this->addExtrasToSomeEvents();
        $this->addPropertiesToEvents();
    }

    protected function addExtrasToSomeEvents()
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

    protected function addPropertiesToEvents()
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
