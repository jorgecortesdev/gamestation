<?php

namespace App\Http\Controllers;

use Cache;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\GameStation\Calendar\CalendarGateway;

class CalendarController extends Controller
{
    /** @var Calendar Google calendar */
    protected $calendar;

    public function __construct(CalendarGateway $calendar)
    {
        $this->calendar = $calendar;
    }

    public function index(Request $request)
    {
        return $this->calendar->list($request->start, $request->end);
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

    public function freebusy(Request $request)
    {
        $start = Carbon::parse($request->start);
        $end = $start->copy()->addHours(3);

        return ['busy' => $this->calendar->freebusy($start->toIso8601String(), $end->toIso8601String())];
    }
}
