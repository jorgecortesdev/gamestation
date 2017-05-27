<?php

namespace App\Repositories\Tasks\Events;

use App\Combo;
use Illuminate\Http\Request;

class BuildCombo extends Task
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
        $combo = Combo::findOrFail($request->input('combo_id'));

        $this->model->combo()->associate($combo);

        $this->model->chargeCombo();
    }
}
