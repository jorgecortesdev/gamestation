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

        $combo = $event->combo;
        $this->createConfigurations($event, $combo);

        // Add extra products configurations
        $extras = $event->extras;
        foreach ($extras as $extra) {
            $quantity = $extra->pivot->quantity;
            for ($i = 1; $i <= $quantity; $i++) {
                $this->createConfigurations($event, $extra);
            }
        }

        // Set some configurations
        $configurations = $event->combo->configurations;
        $configuration = $configurations->first();
        $product = $configuration->options()->first();
        $configuration->product_id = $product->id;
        $configuration->save();

        $configuration = $configurations->last();
        $product = $configuration->options()->first();
        $configuration->product_id = $product->id;
        $configuration->save();
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
}
