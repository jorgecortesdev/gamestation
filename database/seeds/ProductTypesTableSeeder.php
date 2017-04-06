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
            ['name' => 'Axuliares', 'supplier_product_id' => null, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Agua', 'supplier_product_id' => 1, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Aguas Frescas', 'supplier_product_id' => null, 'configurable' => true, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Invitaciones', 'supplier_product_id' => null, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Termos para bebidas', 'supplier_product_id' => 5, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Hielo', 'supplier_product_id' => 2, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Pizzas', 'supplier_product_id' => null, 'configurable' => true, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Platos desechables', 'supplier_product_id' => 20, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Vasos desechables', 'supplier_product_id' => null, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Servilletas', 'supplier_product_id' => 18, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Servilletas lavamanos', 'supplier_product_id' => 14, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Maíz palomero', 'supplier_product_id' => 11, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Bolsas para palomitas', 'supplier_product_id' => null, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Sal para palomitas', 'supplier_product_id' => null, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Guantes para alimentos', 'supplier_product_id' => null, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Aceite', 'supplier_product_id' => null, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Bolsas negras grandes', 'supplier_product_id' => null, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Bolsas negras chicas', 'supplier_product_id' => null, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Papel sanitario', 'supplier_product_id' => null, 'configurable' => false, 'created_at' => $date, 'updated_at' => $date],
        ];

        DB::table('product_types')->insert($types);
    }
}
