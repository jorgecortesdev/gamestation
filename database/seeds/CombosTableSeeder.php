<?php

use App\Combo;
use App\Property;
use Illuminate\Database\Seeder;

class CombosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['id' => 1, 'name' => 'Mini', 'hours' => 3, 'kids' => 13, 'adults' => 5, 'price' => 2400, 'color_id' => 10],
            ['id' => 2, 'name' => 'Básico', 'hours' => 3, 'kids' => 25, 'adults' => 5, 'price' => 3200, 'color_id' => 9],
            ['id' => 3, 'name' => 'Plus', 'hours' => 3, 'kids' => 30, 'adults' => 5, 'price' => 4500, 'color_id' => 5],
            ['id' => 4, 'name' => 'Premier', 'hours' => 3, 'kids' => 30, 'adults' => 5, 'price' => 6900, 'color_id' => 11]
        ];

        $combos = factory(Combo::class, 4)->make();

        foreach ($combos as $key => $combo) {
            $combo->id       = $data[$key]['id'];
            $combo->name     = $data[$key]['name'];
            $combo->hours    = $data[$key]['hours'];
            $combo->kids     = $data[$key]['kids'];
            $combo->adults   = $data[$key]['adults'];
            $combo->price    = $data[$key]['price'];
            $combo->color_id = $data[$key]['color_id'];
            $combo->save();
        }

        // Prime Combos: Plus, Premier
        $this->addBasicProductsToAllCombos();
        $this->addProductsToPrimeCombos();
        $this->addPropertiesToPrimeCombos();
    }

    protected function addBasicProductsToAllCombos()
    {
        $products = [
            2  => ['quantity' => 1],
            11 => ['quantity' => 1],
            18 => ['quantity' => 9],
            19 => ['quantity' => 1],
        ];

        $combos = Combo::all();
        $this->syncEntities($combos, $products);
    }

    protected function addProductsToPrimeCombos()
    {
        $products = [
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
        $this->syncEntities($combos, $products);
    }

    public function addPropertiesToPrimeCombos()
    {
        $properties = Property::all()->pluck('id')->values();

        // PLUS
        $combo = Combo::find(3);
        $combo->properties()->attach($properties[0]);

        // PREMIER
        $combo = Combo::find(4);
        $combo->properties()->attach($properties);
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
