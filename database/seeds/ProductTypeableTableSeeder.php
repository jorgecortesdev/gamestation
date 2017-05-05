<?php

use App\Combo;
use App\Extra;
use App\ProductType;
use Illuminate\Database\Seeder;

class ProductTypeableTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $combos = Combo::all();

        $basicProducts = [
            2  => ['quantity' => 1],
            11 => ['quantity' => 1],
            18 => ['quantity' => 9],
            19 => ['quantity' => 1],
        ];

        $this->syncEntities($combos, $basicProducts);

        $primeProducts = [
            3  => ['quantity' => 2],
            6  => ['quantity' => 2],
            7  => ['quantity' => 2],
            8  => ['quantity' => 35],
            10 => ['quantity' => 50],
            12 => ['quantity' => 1],
            13 => ['quantity' => 50],
            14 => ['quantity' => 14],
            15 => ['quantity' => 2],
            16 => ['quantity' => 5],
        ];

        $combos = Combo::whereIn('id', [3, 4])->get();

        $this->syncEntities($combos, $primeProducts);

        $extra = Extra::find(5);

        $cornpopsProducts = [
            12 => ['quantity' => 1],
            13 => ['quantity' => 50],
            14 => ['quantity' => 14],
            16 => ['quantity' => 5]
        ];

        $this->syncEntity($extra, $cornpopsProducts);

        $extra = Extra::find(3);

        $fruitFlavoredWaterProduct = [
            3 => ['quantity' => 1]
        ];

        $this->syncEntity($extra, $fruitFlavoredWaterProduct);

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
