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
        factory(App\SupplierProduct::class, 50)->create()->each(function($product) {
            $product->supplier_id = mt_rand(1, 13); // Match the max amount of Suppliers seeder
            $product->quantity = mt_rand(1, 100);
            $product->unity_id = mt_rand(1, 10); // Match the max amount of Unities seeder
            $product->product_type_id = mt_rand(1, 11); // Match the max amount of Product types seeder
            $product->save();
        });
    }
}
