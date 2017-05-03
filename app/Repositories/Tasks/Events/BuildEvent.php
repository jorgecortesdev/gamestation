<?php

namespace App\Repositories\Tasks\Events;

use DateTime;
use Illuminate\Http\Request;

class BuildEvent extends Task
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
        $date = DateTime::createFromFormat(
            'F j, Y H:i A',
            $request->input('eventDate')
        );

        $this->model->occurs_on = $date;
    }
}
