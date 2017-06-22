<?php

namespace App\GameStation\Calendar;

interface Calendar
{

    public function between($start, $end);

    public function createEvent($summary, $start, $end, $colorId);

    public function deleteEvent($eventId);

    public function verify($start, $hours = 3);

    public function editEvent($eventId);

    public function colors();

}