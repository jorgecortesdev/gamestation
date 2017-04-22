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
            ['occurs_on' => '2017-06-02 14:00:00', 'combo_id' => 2, 'client_id' => 4, 'kid_id' => 1],
        ];

        foreach ($events as $event) {
            $event = new Event($event);
            $event->save();
        }
    }
}
