<?php

use Illuminate\Database\Seeder;

class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'XBOX One',
            'Kinect',
            'WII U',
            'PS4',
            'Pista de baile iluminada',
            'Mesa de hockey',
            'Mini beauty salon',
            'Accesorios de fiestas',
            'Auxiliar',
            'Bolsas para basura pequeñas',
            'Papel de baño',
            'Servilletas de mano (Sanitas)',
            'Agua (Garrafón)',
            'Limpieza y mantenimiento',
        ];

        $products = factory(App\Product::class, 20)->make();

        foreach ($products as $product) {
            $product->name = $names[mt_rand(1, count($names) - 1)];
            $product->product_type_id = mt_rand(1, 11); // Match the max amount of Product types seeder
            $product->save();
        }
    }
}
