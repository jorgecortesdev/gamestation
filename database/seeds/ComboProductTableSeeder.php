<?php

use App\Combo;
use App\ProductType;
use Illuminate\Database\Seeder;

class ComboProductTableSeeder extends Seeder
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

        foreach ($combos as $combo) {
            $data = [];

            foreach ($productTypes as $idx => $productType) {
                $data[$idx] = ['quantity' => $basicProducts[$idx]['quantity']];
            }

            $combo->productTypes()->sync($data);
        }

        $primeProducts = [
            3  => ['quantity' => 20],
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

        foreach ($combos as $combo) {
            $data = [];

            foreach ($primeProducts as $idx => $productType) {
                $data[$idx] = ['quantity' => $primeProducts[$idx]['quantity']];
            }

            $combo->productTypes()->sync($data);
        }
    }
}
