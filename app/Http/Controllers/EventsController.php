<?php

namespace App\Http\Controllers;

use App\Event;
use App\Configuration;
use App\Repositories\Events;
use Illuminate\Http\Request;
use App\Http\Requests\SaveEvent;

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

    public function index(Request $request)
    {
        go()->after();

        if ($request->input('query')) {
            $events = $this->events->search($request->input('query'));
        } else {
            $events = $this->events->latest();
        }

        return view('events.index', compact('events'));
    }

    public function show(Event $event)
    {
        go()->after();

        $this->events->setModel($event);

        // Get event invoice
        $invoice = $this->events->invoice();

        // Configuration section
        $configurations = $this->events->configurations();

        // Properties section
        $properties = [
            ['label' => 'Hora de la Pizza', 'value' => '2:30 pm'],
            ['label' => 'Personaje', 'value' => 'Mario Bros']
        ];

        return view('events.show', compact('event', 'configurations', 'invoice', 'properties'));
    }

    public function create()
    {
        return view('events.create');
    }

    public function store(SaveEvent $request)
    {
        $this->events->save($request);

        flash('Evento agregado con éxito', 'success');

        $event = $this->events->latest(1)->first();

        return redirect(route('events.show', [$event->id]));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(SaveEvent $request, Event $event)
    {
        $this->events->setModel($event);

        $this->events->save($request, $event);

        flash('Evento actualizado con éxito', 'success');

        return go()->now();
    }

    public function destroy($id)
    {
        $this->events->delete($id);

        flash('Evento borrado con éxito', 'success');

        return back();
    }
}
