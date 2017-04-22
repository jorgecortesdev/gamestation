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
            ['id' => 2, 'supplier_product_id' => 1, 'render_type_id' => null],
            ['id' => 3, 'supplier_product_id' => 23, 'render_type_id' => 2],
            ['id' => 5, 'supplier_product_id' => 5, 'render_type_id' => null],
            ['id' => 6, 'supplier_product_id' => 2, 'render_type_id' => null],
            ['id' => 7, 'supplier_product_id' => 3, 'render_type_id' => 3],
            ['id' => 8, 'supplier_product_id' => 20, 'render_type_id' => null],
            ['id' => 10, 'supplier_product_id' => 18, 'render_type_id' => null],
            ['id' => 11, 'supplier_product_id' => 14, 'render_type_id' => null],
            ['id' => 12, 'supplier_product_id' => 11, 'render_type_id' => null],
        ];

        foreach($types as $type) {
            $productType = ProductType::find($type['id']);
            $productType->supplier_product_id = $type['supplier_product_id'];
            $productType->render_type_id = $type['render_type_id'];
            $productType->save();
        }
    }
}
