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
            ['name' => 'Axuliares', 'quantity' => 1, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Agua', 'quantity' => 1, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Aguas Frescas', 'quantity' => 10, 'configurable' => true,  'customizable' => false,'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Invitaciones', 'quantity' => 1, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Termos para bebidas', 'quantity' => 1, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Hielo', 'quantity' => 1, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Pizzas', 'quantity' => 1, 'configurable' => true,  'customizable' => true,'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Platos desechables', 'quantity' => 35, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Vasos desechables', 'quantity' => 1, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Servilletas', 'quantity' => 1, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Servilletas lavamanos', 'quantity' => 1, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Maíz palomero', 'quantity' => 1, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Bolsas para palomitas', 'quantity' => 1, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Sal para palomitas', 'quantity' => 5, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Guantes para alimentos', 'quantity' => 1, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Aceite', 'quantity' => 1, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Bolsas negras grandes', 'quantity' => 1, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Bolsas negras chicas', 'quantity' => 9, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Papel sanitario', 'quantity' => 1, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
        ];

        DB::table('product_types')->insert($types);
    }
}
