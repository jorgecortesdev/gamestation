<?php

namespace App\Http\Controllers;

use Cache;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Library\Google\Calendar;

class CalendarController extends Controller
{
    public function index(Request $request, Calendar $gcalendar)
    {
        $start = Carbon::createFromFormat('Y-m-d', $request->start)->toRfc3339String();
        $end   = Carbon::createFromFormat('Y-m-d', $request->end)->toRfc3339String();

        return $gcalendar->listEvents($start, $end);
    }

    public function store(Request $request, Calendar $gcalendar)
    {
        $start = Carbon::parse($request->date);
        $end = Carbon::parse($request->date)->addHours(3);

        $combo = \App\Combo::find($request->combo_id);

        $event = $gcalendar->createEvent(
            strtoupper($combo->name) . ": " . $request->name,
            $start->toRfc3339String(),
            $end->toRfc3339String(),
            $combo->google_color_id
        );

        return redirect(route('schedule.index'));
    }
}
