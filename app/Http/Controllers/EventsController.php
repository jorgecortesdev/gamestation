<?php

namespace App\Http\Controllers;

use App\Event;
use App\Repositories\Events;
use Illuminate\Http\Request;
use App\Http\Requests\SaveEvent;

class EventsController extends Controller
{
    /** @var Events Event repository */
    protected $events;

    public function __construct(Events $events)
    {
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

        $events->load(['client', 'kid', 'combo']);

        return view('pages.events.index', compact('events'));
    }

    public function show(Event $event)
    {
        go()->after();

        $this->events->setModel($event);

        // Properties section
        $properties = $this->events->properties();

        return view(
            'pages.events.show',
            compact('event', 'properties')
        );
    }

    public function create()
    {
        return view('pages.events.create');
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
        return view('pages.events.edit', compact('event'));
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
        try {
            $this->events->delete($id);
            flash('Evento borrado con éxito', 'success');
        } catch(\Illuminate\Database\QueryException $e) {
            flash($e->errorInfo[2], 'error');
        }

        return back();
    }
}
