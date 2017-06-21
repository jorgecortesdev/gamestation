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

    public function verify($start)
    {
        $start = Carbon::parse($start);
        $end = $start->copy()->addHours(3);

        return $this->calendar->verify(
            $start->toIso8601String(),
            $end->toIso8601String()
        );
    }

    public function create($summary, $start, $end, $colorId)
    {
        return $this->calendar->create($summary, $start, $end, $colorId);
    }

    public function colors()
    {
        return $this->calendar->colors();
    }
}
