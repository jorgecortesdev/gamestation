<?php

use App\Event;
use App\Extra;
use Illuminate\Database\Seeder;

class ConfigurablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $events = Event::all();
        foreach ($events as $event) {
            $this->addComboConfigurations($event);
            $this->addExtrasConfigurations($event);
            $this->initializeOneConfiguration($event);
        }
    }

    protected function addComboConfigurations($event)
    {
        $combo = $event->combo;
        $this->createConfigurations($event, $combo);
    }

    protected function addExtrasConfigurations($event)
    {
        $extras = $event->extras;
        foreach ($extras as $extra) {
            $quantity = $extra->pivot->quantity;
            for ($i = 1; $i <= $quantity; $i++) {
                $this->createConfigurations($event, $extra);
            }
        }
    }

    protected function createConfigurations($event, $entity)
    {
        $configurables = $entity->configurables;
        foreach ($configurables as $configurable) {
            $quantity = $configurable->pivot->quantity;
            for ($i = 1; $i <= $quantity; $i++) {
                $config = [
                    'event_id' => $event->id,
                    'product_type_id' => $configurable->pivot->product_type_id,
                    'product_id' => null,
                    'custom' => null
                ];
                $entity->configurations()->create($config);
            }
        }
    }

    protected function initializeOneConfiguration($event)
    {
        $configuration = $event->configurations->first();
        $product = $this->randomProductOption($configuration);
        if ( ! is_null($product)) {
            $configuration->product_id = $product->id;
            $configuration->save();
        }
    }

    protected function randomProductOption($configuration)
    {
        if ( ! is_null($configuration)) {
            return $configuration->options()->random();
        }

        return null;
    }
}
