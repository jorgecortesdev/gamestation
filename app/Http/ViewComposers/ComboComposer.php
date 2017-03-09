<?php

namespace App\Http\ViewComposers;

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
        $colors = $this->gcalendar->eventColors();
        $view->with('colors', $colors);
    }
}