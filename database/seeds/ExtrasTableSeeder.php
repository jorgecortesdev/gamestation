<?php

use App\Extra;
use Illuminate\Database\Seeder;

class ExtrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $extras = [
            ['name' => 'Niño extra', 'price' => 80],
            ['name' => 'Adulto extra', 'price' => 50],
            ['name' => 'Aguas Frescas (10 lts.)', 'price' => 230],
            ['name' => 'Pizza Titán', 'price' => 380],
            ['name' => 'Palomitas ilimitadas', 'price' => 200],
            ['name' => 'Cargo por fin de semana', 'price' => 300],
            ['name' => 'Cargo por liberar horario', 'price' => 200],
        ];

        foreach ($extras as $extra) {
            (new Extra($extra))->save();
        }

        $this->initializeCornPops();
        $this->initializeFlavoredWater();
        $this->initializePizza();
    }

    public function initializeCornPops()
    {
        $extra = Extra::find(5);

        $cornpopsProducts = [
            12 => ['quantity' => 1],
            13 => ['quantity' => 50],
            14 => ['quantity' => 14],
            16 => ['quantity' => 5]
        ];

        $this->syncEntity($extra, $cornpopsProducts);
    }

    public function initializeFlavoredWater()
    {
        $extra = Extra::find(3);

        $fruitFlavoredWaterProduct = [
            3 => ['quantity' => 1]
        ];

        $this->syncEntity($extra, $fruitFlavoredWaterProduct);
    }

    public function initializePizza()
    {
        $extra = Extra::find(4);

        $pizzaProduct = [
            7 => ['quantity' => 1]
        ];

        $this->syncEntity($extra, $pizzaProduct);
    }

    protected function syncEntities($entities, $productTypes)
    {
        foreach ($entities as $entity) {
            $this->syncEntity($entity, $productTypes);
        }
    }

    protected function syncEntity($entity, $productTypes)
    {
        $data = [];
        foreach ($productTypes as $idx => $productType) {
            $data[$idx] = ['quantity' => $productTypes[$idx]['quantity']];
        }
        $entity->productTypes()->sync($data);
    }
}
