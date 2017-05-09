<?php

namespace App\Http\Controllers;

use App\Event;
use App\Property;
use Illuminate\Http\Request;

class EventPropertiesController extends Controller
{
    public function show(Property $property)
    {
        $property->load('renderType');
        $property = [
            'label' => $property->label,
            'render' => strtolower($property->renderType->name),
            'options' => $property->options,
        ];
        return $property;
    }

    public function update(Request $request, Event $event, Property $property)
    {
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
