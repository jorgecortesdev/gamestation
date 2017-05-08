<?php

use App\Event;
use App\Extra;
use Illuminate\Database\Seeder;
// use Illuminate\Support\Facades\DB;

class ConfigurablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Find the event
        $event = Event::find(3);

        $this->addComboConfigurations($event);
        $this->addExtrasConfigurations($event);
        $this->initializeOneConfiguration($event);

        // Find another event
        $event = Event::find(5);
        $this->addExtrasConfigurations($event);
        $this->initializeOneConfiguration($event);
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
        $configurables = $entity->configurables()->get();

        foreach ($configurables as $configurable) {
            $quantity = $configurable->pivot->quantity;
            for ($i = 1; $i <= $quantity; $i++) {
                $entity->configurations()->create([
                    'event_id' => $event->id,
                    'product_type_id' => $configurable->pivot->product_type_id,
                    'product_id' => null,
                    'custom' => null
                ]);
            }
        }
    }

    protected function initializeOneConfiguration($event)
    {
        $configuration = $event->configurations->first();
        $product = $this->firstAvailableProductOption($configuration);
        $configuration->product_id = $product->id;
        $configuration->save();
    }

    protected function firstAvailableProductOption($configuration)
    {
        return $configuration->options()->random();
    }
}
