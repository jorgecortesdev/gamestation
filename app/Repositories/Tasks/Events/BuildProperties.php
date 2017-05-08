<?php

namespace App\Repositories\Tasks\Events;

use App\Event;
use App\Property;
use Illuminate\Http\Request;

class BuildProperties extends Task
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
        $properties = $this->model->combo->properties->pluck('id')->values();

        $this->model->properties()->sync($properties);
    }
}
