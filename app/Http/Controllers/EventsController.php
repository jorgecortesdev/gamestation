<?php

namespace App\Http\Controllers;

use Validator;
use App\ProductType;
use App\Repositories\Events;
use Illuminate\Http\Request;
use App\Http\Requests\SaveKid;
use App\Library\Google\Calendar;
use App\Http\Requests\SaveClient;
use App\Http\Requests\EventWizardStep1;
use App\Http\Requests\EventWizardStep2;

class EventsController extends Controller
{
    /** @var Events Event repository */
    protected $events;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Events $events)
    {
        $this->middleware('auth');

        $this->events = $events;
    }

    public function index(Request $request, Calendar $gcalendar)
    {
        // $start = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2017-04-21 18:00:00', 'America/Hermosillo')->toIso8601String();
        // $end = \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', '2017-04-21 21:00:00', 'America/Hermosillo')->toIso8601String();
        // dd($gcalendar->freebusy($start, $end));

        $events = $this->events->latest();

        return view('events.index', compact('events'));
    }

    public function create()
    {
        return view('events.create');
    }
}
