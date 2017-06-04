<?php

namespace App\Http\Controllers;

use App\Event;
use App\Property;
use Illuminate\Http\Request;

class EventPropertiesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function show($event, $property)
    {
        $event = Event::findOrFail($event);

        $property = $event->properties()->with('renderType')->find($property);

        return response()->json([
            'label' => $property->label,
            'render' => strtolower($property->renderType->name),
            'options' => $property->options,
        ], 200);
    }

    public function update(Request $request, $event, $property)
    {
        $event = Event::findOrFail($event);

        $property = $event->properties()->with('renderType')->find($property);

        $value = '';
        // HARDCODE!!!!
        if ($property->renderType->id == 1) {
            $value = $request->value;
        } else {
            foreach ($request->options as $option) {
                $value .= $property->options[$option] . ', ';
            }
            $value = rtrim($value, ', ');
        }

        $event->properties()->syncWithoutDetaching([
            $property->id => ['value' => $value]
        ]);

        return back();
    }
}
