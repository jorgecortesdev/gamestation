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
        $missingConfigurations = $this->missingConfigurationsFromCombo();

        foreach ($missingConfigurations as $producTypeId => $quantity) {
            for ($i = 0; $i < $quantity; $i++) {
                $this->model->combo->configurations()->create([
                    'event_id'        => $this->model->id,
                    'product_type_id' => $producTypeId,
                    'product_id'      => null,
                    'custom'          => null
                ]);
            }
        }
    }

    /**
     * Calculate wish configurations aren't created already.
     *
     * @return array
     */
    protected function missingConfigurationsFromCombo()
    {
        $comboConfigurables    = $this->configurableProductsFromCombo();
        $currentConfigurations = $this->currentConfigurations();

        return $this->substractCurrentConfigurations(
            $comboConfigurables,
            $currentConfigurations
        );
    }

    /**
     * Configurable products from combo.
     *
     * @return array
     */
    protected function configurableProductsFromCombo()
    {
        $configurables = $this->model->combo->configurables()->get();

        return $configurables->map(function ($productType) {
            return [
                'product_type_id' => $productType->id,
                'quantity' => $productType->pivot->quantity
            ];
        })->keyBy('product_type_id')->map(function ($item) {
            return $item['quantity'];
        })->toArray();
    }

    /**
     * Already created configurations.
     *
     * @return array
     */
    protected function currentConfigurations()
    {
        $currentConfigurations = Configuration::where('event_id', $this->model->id)->get();
        return $currentConfigurations->map(function ($item) {
            return [
                'product_type_id' => $item->product_type_id
            ];
        });
    }

    /**
     * Calculate the difference between the combo configurations
     * and the already created configurations.
     *
     * @param  array $comboConfigurables
     * @param  array $currentConfigurations
     * @return array
     */
    protected function substractCurrentConfigurations($comboConfigurables, $currentConfigurations)
    {
        foreach ($currentConfigurations as $configuration) {
            $comboConfigurables[$configuration['product_type_id']]--;
        }

        return $comboConfigurables;
    }
}
