<?php

use App\Product;
use App\ProductType;
use Illuminate\Database\Seeder;

class ActiveProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $products = [1, 23, 5, 2, 3, 20, 18, 14, 11, 12, 19, 16, 17, 15, 13];

        $products = Product::whereIn('id', $products)->get();

        foreach ($products as $product) {
            $product->activate();
        }
    }
}
