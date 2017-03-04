<?php

use Illuminate\Database\Seeder;

class SupplierProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Agua',
            'Hielo',
            'Pizza Titán',
            'Invitaciones',
            'Ánfora Sinker Transparente',
            'Pizzas Mega',
            'Horchata',
            'Jamaica',
            'Limonada',
            'Maíz Palomero',
            'Servilletas',
            'Bolsa café #1',
            'Papel de baño',
            'Servilletas de mano (Sanitas)',
            'Bolsas para basura pequeñas',
            'Guantes de polietileno',
            'Aceite Nutrioli',
            'Servilletas MAX',
            'Sal para palomitas',
            'Charola Mariel #66',
            'Fabuloso naranja',
            'MR Músculo Windex'
        ];

        $products = factory(App\SupplierProduct::class, 50)->make();

        foreach ($products as $product) {
            $product->name = $names[mt_rand(1, count($names) - 1)];
            $product->supplier_id = mt_rand(1, 12); // Match the max amount of Suppliers seeder
            $product->quantity = mt_rand(1, 100);
            $product->unity_id = mt_rand(1, 10); // Match the max amount of Unities seeder
            $product->product_type_id = mt_rand(1, 11); // Match the max amount of Product types seeder
            $product->save();
        }
    }
}
