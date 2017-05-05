<?php

namespace App\Repositories\Tasks\Events;

use App\Event;
use App\Configuration;
use Illuminate\Http\Request;

class BuildConfigurations extends Task
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
        $combo = $this->model->combo;

        $configurables = $combo->configurables()->get();

        if (Configuration::where('event_id', $this->model->id)->count() > 0) {
            return;
        }

        foreach ($configurables as $configurable) {
            $quantity = $configurable->pivot->quantity;
            for ($i = 1; $i <= $quantity; $i++) {
                $combo->configurations()->create([
                    'event_id'        => $this->model->id,
                    'product_type_id' => $configurable->pivot->product_type_id,
                    'product_id'      => null,
                    'custom'          => null
                ]);
            }
        }
    }
}
