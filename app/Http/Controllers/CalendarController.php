<?php

namespace App\Http\Controllers;

use Cache;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Library\Google\Calendar;

class CalendarController extends Controller
{
    /** @var Calendar Google calendar */
    protected $calendar;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Calendar $calendar)
    {
        $this->middleware('auth');

        $this->calendar = $calendar;
    }

    public function index(Request $request)
    {
        $start = Carbon::createFromFormat('Y-m-d', $request->start)->toRfc3339String();
        $end   = Carbon::createFromFormat('Y-m-d', $request->end)->toRfc3339String();

        return $this->calendar->listEvents($start, $end);
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
            $combo->google_color_id
        );

        return redirect(route('schedule.index'));
    }

    public function freebusy(Request $request)
    {
        $start = Carbon::createFromFormat('M d, Y h:i A', $request->start, 'America/Hermosillo');
        $end = $start->copy()->addHours(3);

        return ['busy' => $this->calendar->freebusy($start->toIso8601String(), $end->toIso8601String())];
    }
}
