<?php

namespace App\GameStation\Calendar;

use Carbon\Carbon;

class CalendarGateway
{
    protected $calendar;

    public function __construct(Calendar $calendar)
    {
        $this->calendar = $calendar;
    }

    public function between($start, $end)
    {
        return $this->calendar->between($start, $end);
    }

    public function verify($start, $hours = 3)
    {
        return $this->calendar->verify($start, $hours);
    }

    public function createEvent($summary, $start, $end, $colorId)
    {
        return $this->calendar->create($summary, $start, $end, $colorId);
    }

    public function colors()
    {
        return $this->calendar->colors();
    }
}
