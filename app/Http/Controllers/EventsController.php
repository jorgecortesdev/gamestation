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

        // obtener productos configurables del paquete
        // |
        // +- sacar el paquete del evento X
        // +- sacar los tipos de productos configurables del paquete X
        $comboProductTypes = $event->combo->configurableProductTypes()->get();

        // +- sacar todos los productos de ese tipo que pertenecen al proveedor activo
        // +- remover el producto activo
        $products = $comboProductTypes->map(function ($productType) {
            $productType->load('product');
            $activeProductId = $productType->product->id;
            $productType->product->load('supplier.products');
            return $productType->product->supplier->products->filter(function ($product) use ($activeProductId) {
                return $product->id != $activeProductId;
            });
        });
        // dd($products);

        // obtener los productos extras del evento
        // configurar los productos extras del evento

        $statements = [
            ['concept' => 'Paquete Plus', 'price' => '$4,500', 'quantity' => 1],
            ['concept' => 'Cargo por liberar horario', 'price' => '$200', 'quantity' => 1],
            ['concept' => 'Cargo por fin de semana', 'price' => '$300', 'quantity' => 1],
            ['concept' => 'Aguas Frescas (10 lts.)', 'price' => '$230', 'quantity' => 1],
            ['concept' => 'Servicio de palomitas', 'price' => '$200', 'quantity' => 1],
            ['concept' => 'Adulto Extra', 'price' => '$50', 'quantity' => 5],
            ['concept' => 'Niño Extra', 'price' => '$80', 'quantity' => 10]

        ];

        $products = [
            [
                'label' => 'Aguas Frescas',
                'products' => [
                    ['name' => 'Horchata', 'checked' => true],
                    ['name' => 'Piña', 'checked' => false],
                    ['name' => 'Limonada', 'checked' => false],
                    ['name' => 'Jamaica', 'checked' => true],
                ]
            ],
            [
                'label' => 'Pizza 1',
                'products' => [
                    ['name' => 'Jamón', 'checked' => true],
                    ['name' => 'Peperoni', 'checked' => false],
                ]
            ],
            [
                'label' => 'Pizza 2',
                'products' => [
                    ['name' => 'Jamón', 'checked' => false],
                    ['name' => 'Peperoni', 'checked' => true],
                ]
            ],
        ];

        $properties = [
            ['label' => 'Hora de la Pizza', 'value' => '2:30 pm'],
            ['label' => 'Personaje', 'value' => 'Mario Bros']
        ];

        return view('events.show', compact('event', 'products', 'statements', 'properties'));
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
