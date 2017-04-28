<?php

namespace App\Http\Controllers;

use App\Kid;
use App\Combo;
use App\Event;
use Validator;
use App\Client;
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

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->events->save($request->all());

        flash('Evento agregado con éxito', 'success');

        return redirect(route('events.index'));
    }

    public function edit(Event $event)
    {
        return view('events.edit', compact('event'));
    }

    public function update(Request $request, Event $event)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $this->events->save($request->all(), $event);

        flash('Evento actualizado con éxito', 'success');

        return redirect(route('events.index'));
    }

    public function destroy($id)
    {
        $this->events->delete($id);

        flash('Evento borrado con éxito', 'success');

        return back();
    }

    protected function validator(array $data)
    {
        $rules = [
            'eventDate' => 'required|date',
            'combo_id' => 'required|numeric|min:1',
            'clientIdOrName' => 'required',
            'clientAddress' => 'required',
            'clientTelephone' => 'required|numeric|min:10',
            'clientEmail' => 'email',
            'kidName' => 'required',
            'kidBirthday' => 'required|date',
            'kidGender' => 'required|numeric',
        ];

        $messages = [
            'eventDate.required' => 'El campo es requerido.',
            'combo_id.required' => 'El campo es requerido.',
            'clientIdOrName.required' => 'El campo es requerido.',
            'clientAddress.required' => 'El campo es requerido.',
            'clientTelephone.required' => 'El campo es requerido.',
            'clientEmail.email' => 'Debe ser un correo válido.',
            'kidName.required' => 'El campo es requerido.',
            'kidBirthday.required' => 'El campo es requerido.',
            'kidGender.required' => 'El campo es requerido.',
        ];

        return Validator::make($data, $rules, $messages);
    }
}
