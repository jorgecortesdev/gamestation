<?php

namespace App\Repositories\Tasks\Events;

use App\Combo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Library\Google\Calendar;

class SaveGoogleCalendar extends Task
{
    /**
     * Handles the task.
     *
     * @param  Illuminate\Http\Request $request
     * @return void
     *
     * @throws TaskException
     */
    public function handle(Request $request)
    {
        $calendar = app()->make(Calendar::class);

        $start = Carbon::parse($this->model->occurs_on);
        $end = Carbon::parse($this->model->occurs_on)->addHours(3);

        $combo = $this->model->combo;

        $calendar->createEvent(
            strtoupper($combo->name) . ": " . $this->model->kid->name,
            $start->toRfc3339String(),
            $end->toRfc3339String(),
            $combo->color_id
        );
    }
}
