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
            $event->addComboConfigurations();
            $event->addExtrasConfigurations();
            $this->initializeOneConfiguration($event);
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
