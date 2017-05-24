<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');

        $types = [
            ['name' => 'Axuliares', 'quantity' => 1, 'configurable' => false, 'customizable' => false],
            ['name' => 'Agua', 'quantity' => 1, 'configurable' => false, 'customizable' => false],
            ['name' => 'Aguas Frescas', 'quantity' => 10, 'configurable' => true,  'customizable' => false],
            ['name' => 'Invitaciones', 'quantity' => 1, 'configurable' => false, 'customizable' => false],
            ['name' => 'Termos para bebidas', 'quantity' => 1, 'configurable' => false, 'customizable' => false],
            ['name' => 'Hielo', 'quantity' => 1, 'configurable' => false, 'customizable' => false],
            ['name' => 'Pizzas', 'quantity' => 1, 'configurable' => true,  'customizable' => true],
            ['name' => 'Platos desechables', 'quantity' => 35, 'configurable' => false, 'customizable' => false],
            ['name' => 'Vasos desechables', 'quantity' => 1, 'configurable' => false, 'customizable' => false],
            ['name' => 'Servilletas', 'quantity' => 1, 'configurable' => false, 'customizable' => false],
            ['name' => 'Servilletas lavamanos', 'quantity' => 1, 'configurable' => false, 'customizable' => false],
            ['name' => 'Maíz palomero', 'quantity' => 1, 'configurable' => false, 'customizable' => false],
            ['name' => 'Bolsas para palomitas', 'quantity' => 1, 'configurable' => false, 'customizable' => false],
            ['name' => 'Sal para palomitas', 'quantity' => 5, 'configurable' => false, 'customizable' => false],
            ['name' => 'Guantes para alimentos', 'quantity' => 1, 'configurable' => false, 'customizable' => false],
            ['name' => 'Aceite', 'quantity' => 1, 'configurable' => false, 'customizable' => false],
            ['name' => 'Bolsas negras grandes', 'quantity' => 1, 'configurable' => false, 'customizable' => false],
            ['name' => 'Bolsas negras chicas', 'quantity' => 9, 'configurable' => false, 'customizable' => false],
            ['name' => 'Papel sanitario', 'quantity' => 1, 'configurable' => false, 'customizable' => false],
        ];

        $productTypes = factory(App\ProductType::class, count($types))->make();

        foreach ($productTypes as $key => $productType) {
            $productType->name         = $types[$key]['name'];
            $productType->quantity     = $types[$key]['quantity'];
            $productType->configurable = $types[$key]['configurable'];
            $productType->customizable = $types[$key]['customizable'];
            // $productType->product_id = $types[$key]['product_id'];
            $productType->save();
        }
    }
}
