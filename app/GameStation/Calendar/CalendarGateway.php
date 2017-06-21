<?php

namespace App\GameStation\Calendar;

use Carbon\Carbon;

class CalendarGateway
{
    protected $calendar;

    public function __construct($calendar)
    {
        $this->calendar = $calendar;
    }

    public function list($start, $end)
    {
        $start = Carbon::createFromFormat('Y-m-d', $start)->toRfc3339String();
        $end = Carbon::createFromFormat('Y-m-d', $end)->toRfc3339String();

        return $this->calendar->list($start, $end);
    }

    public function create($summary, $start, $end, $colorId)
    {
        return $this->calendar->create($summary, $start, $end, $colorId);
    }

    public function editEvent($start)
    {

    }

    public function deleteEvent($start)
    {

    }

}
