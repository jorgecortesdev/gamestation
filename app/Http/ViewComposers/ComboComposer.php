<?php

namespace App\Http\ViewComposers;

use App\Combo;
use App\Property;
use Illuminate\View\View;
use App\Library\Google\Calendar;

class ComboComposer
{
    protected $gcalendar;

    public function __construct(Calendar $gcalendar)
    {
        $this->gcalendar = $gcalendar;
    }

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $properties = Property::with('propertyType')
            ->get()
            ->map(function ($property) {
                return [
                    'id' => $property->id,
                    'name' => $property->label . ' (' . $property->propertyType->name . ')'
                ];
            })->pluck('name', 'id');

        $colors = $this->gcalendar->eventColors();

        $view->with(compact(['properties', 'colors']));
    }
}