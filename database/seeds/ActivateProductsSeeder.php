<?php

use App\ProductType;
use Illuminate\Database\Seeder;

class ActivateProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            ['id' => 2, 'product_id' => 1],
            ['id' => 3, 'product_id' => 23],
            ['id' => 5, 'product_id' => 5],
            ['id' => 6, 'product_id' => 2],
            ['id' => 7, 'product_id' => 3],
            ['id' => 8, 'product_id' => 20],
            ['id' => 10, 'product_id' => 18],
            ['id' => 11, 'product_id' => 14],
            ['id' => 12, 'product_id' => 11],
            ['id' => 13, 'product_id' => 12],
            ['id' => 14, 'product_id' => 19],
            ['id' => 15, 'product_id' => 16],
            ['id' => 16, 'product_id' => 17],
            ['id' => 18, 'product_id' => 15],
            ['id' => 19, 'product_id' => 13],
        ];

        foreach($types as $type) {
            $productType = ProductType::find($type['id']);
            $productType->product_id = $type['product_id'];
            $productType->save();
        }
    }
}
