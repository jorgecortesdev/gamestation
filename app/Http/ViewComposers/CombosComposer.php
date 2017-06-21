<?php

namespace App\Http\ViewComposers;

use App\Combo;
use App\Property;
use Illuminate\View\View;
use App\GameStation\Calendar\CalendarGateway;

class CombosComposer
{
    protected $calendar;

    public function __construct(CalendarGateway $calendar)
    {
        $this->calendar = $calendar;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $properties = Property::with('renderType')
            ->get()
            ->map(function ($property) {
                return [
                    'id' => $property->id,
                    'name' => $property->label . ' (' . $property->renderType->name . ')'
                ];
            })->pluck('name', 'id');

        $colors = $this->calendar->colors();

        $view->with(compact(['properties', 'colors']));
    }
}