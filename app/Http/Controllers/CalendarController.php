<?php

namespace App\Http\Controllers;

use Cache;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\GameStation\Calendar\CalendarGateway;

class CalendarController extends ApiController
{
    /** @var Calendar Google calendar */
    protected $calendar;

    public function __construct(CalendarGateway $calendar)
    {
        $this->calendar = $calendar;
    }

    public function index(Request $request)
    {
        return $this->calendar->between($request->start, $request->end);
    }

    public function verify(Request $request)
    {
        $this->validate($request, ['start' => 'bail|required|date']);

        return $this->respond(['busy' => $this->calendar->verify($request->start)]);
    }

    public function store(Request $request)
    {
        $start = Carbon::parse($request->date);
        $end = Carbon::parse($request->date)->addHours(3);

        $combo = \App\Combo::find($request->combo_id);

        $event = $this->calendar->createEvent(
            strtoupper($combo->name) . ": " . $request->name,
            $start->toRfc3339String(),
            $end->toRfc3339String(),
            $combo->color_id
        );

        return redirect(route('schedule.index'));
    }
}
