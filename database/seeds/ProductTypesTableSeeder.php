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
            ['name' => 'Axuliares', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Agua', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Aguas Frescas', 'product_id' => null, 'render_type_id' => null, 'configurable' => true,  'customizable' => false,'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Invitaciones', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Termos para bebidas', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Hielo', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Pizzas', 'product_id' => null, 'render_type_id' => null, 'configurable' => true,  'customizable' => true,'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Platos desechables', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Vasos desechables', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Servilletas', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Servilletas lavamanos', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Maíz palomero', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Bolsas para palomitas', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Sal para palomitas', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Guantes para alimentos', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Aceite', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Bolsas negras grandes', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Bolsas negras chicas', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Papel sanitario', 'product_id' => null, 'render_type_id' => null, 'configurable' => false, 'customizable' => false, 'created_at' => $date, 'updated_at' => $date],
        ];

        DB::table('product_types')->insert($types);
    }
}
