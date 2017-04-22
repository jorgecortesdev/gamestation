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
        $properties = Property::with('renderType')
            ->get()
            ->map(function ($property) {
                return [
                    'id' => $property->id,
                    'name' => $property->label . ' (' . $property->renderType->name . ')'
                ];
            })->pluck('name', 'id');

        $colors = $this->gcalendar->eventColors();

        $view->with(compact(['properties', 'colors']));
    }
}