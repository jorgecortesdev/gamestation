<?php

namespace App\Repositories\Tasks\Events;

use App\Combo;
use Illuminate\Http\Request;

class BuildCharges extends Task
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
        $this->model->chargeCombo();
    }
}
