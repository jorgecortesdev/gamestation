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
        $data = [
            ['name' => 'Agua Premier', 'price' => 25, 'iva' => 0, 'supplier_id' => 3, 'quantity' => 1, 'unity_id' => 1, 'product_type_id' => 2],
            ['name' => 'Bahía Hielo 3.6KG', 'price' => 20, 'iva' => 0, 'supplier_id' => 3, 'quantity' => 1, 'unity_id' => 2, 'product_type_id' => 6],
            ['name' => 'Pizza Titán Redonda', 'price' => 267, 'iva' => 42.72, 'supplier_id' => 6, 'quantity' => 1, 'unity_id' => 8, 'product_type_id' => 7],
            ['name' => 'Invitación Standard', 'price' => 208, 'iva' => 0, 'supplier_id' => 4, 'quantity' => 156, 'unity_id' => 8, 'product_type_id' => 4],
            ['name' => 'Ánfora Sinker Transparente', 'price' => 14000, 'iva' => 2240, 'supplier_id' => 5, 'quantity' => 1000, 'unity_id' => 8, 'product_type_id' => 5],
            ['name' => 'Pizza Mega', 'price' => 169, 'iva' => 0, 'supplier_id' => 7, 'quantity' => 1, 'unity_id' => 8, 'product_type_id' => 7],
            ['name' => 'Horchata', 'price' => 300, 'iva' => 0, 'supplier_id' => 8, 'quantity' => 20, 'unity_id' => 4, 'product_type_id' => 3],
            ['name' => 'Jamaica', 'price' => 200, 'iva' => 0, 'supplier_id' => 8, 'quantity' => 20, 'unity_id' => 4, 'product_type_id' => 3],
            ['name' => 'Limonada', 'price' => 200, 'iva' => 0, 'supplier_id' => 8, 'quantity' => 20, 'unity_id' => 4, 'product_type_id' => 3],
            ['name' => 'Piña', 'price' => 200, 'iva' => 0, 'supplier_id' => 8, 'quantity' => 20, 'unity_id' => 4, 'product_type_id' => 3],
            ['name' => 'Maíz Palomero', 'price' => 17, 'iva' => 2.72, 'supplier_id' => 1, 'quantity' => 1, 'unity_id' => 6, 'product_type_id' => 12],
            ['name' => 'Bolsa café #1', 'price' => 14.8, 'iva' => 2.37, 'supplier_id' => 1, 'quantity' => 100, 'unity_id' => 11, 'product_type_id' => 13],
            ['name' => 'Papel de baño', 'price' => 25, 'iva' => 4, 'supplier_id' => 1, 'quantity' => 4, 'unity_id' => 9, 'product_type_id' => 19],
            ['name' => 'Servilletas de mano (Sanitas)', 'price' => 21.8, 'iva' => 3.49, 'supplier_id' => 1, 'quantity' => 1, 'unity_id' => 11, 'product_type_id' => 11],
            ['name' => 'Bolsas para basura pequeñas', 'price' => 32, 'iva' => 5.12, 'supplier_id' => 1, 'quantity' => 18, 'unity_id' => 11, 'product_type_id' => 18],
            ['name' => 'Guantes de polietileno', 'price' => 25, 'iva' => 4, 'supplier_id' => 1, 'quantity' => 100, 'unity_id' => 11, 'product_type_id' => 15],
            ['name' => 'Aceite Nutrioli', 'price' => 32, 'iva' => 5.12, 'supplier_id' => 1, 'quantity' => 1000, 'unity_id' => 3, 'product_type_id' => 16],
            ['name' => 'Servilletas MAX', 'price' => 23, 'iva' => 3.68, 'supplier_id' => 1, 'quantity' => 500, 'unity_id' => 11, 'product_type_id' => 10],
            ['name' => 'Sal para palomitas', 'price' => 30, 'iva' => 4.80, 'supplier_id' => 1, 'quantity' => 500, 'unity_id' => 7, 'product_type_id' => 14],
            ['name' => 'Charola Mariel #66', 'price' => 15, 'iva' => 2.4, 'supplier_id' => 1, 'quantity' => 50, 'unity_id' => 11, 'product_type_id' => 8],
            ['name' => 'Fabuloso naranja', 'price' => 20, 'iva' => 3.2, 'supplier_id' => 2, 'quantity' => 1000, 'unity_id' => 3, 'product_type_id' => 2],
            ['name' => 'MR Músculo Windex', 'price' => 41, 'iva' => 6.56, 'supplier_id' => 9, 'quantity' => 1000, 'unity_id' => 3, 'product_type_id' => 2],
            ['name' => 'Otros', 'price' => 300, 'iva' => 0, 'supplier_id' => 8, 'quantity' => 20, 'unity_id' => 4, 'product_type_id' => 3],
            ['name' => 'Jamón', 'price' => 230.17, 'iva' => 36.82, 'supplier_id' => 6, 'quantity' => 1, 'unity_id' => 8, 'product_type_id' => 7],
            ['name' => 'Pepperoni', 'price' => 230.17, 'iva' => 36.82, 'supplier_id' => 6, 'quantity' => 1, 'unity_id' => 8, 'product_type_id' => 7],
        ];

        $products = factory(App\SupplierProduct::class, count($data))->make();

        foreach ($products as $key => $product) {
            $product->name            = $data[$key]['name'];
            $product->price           = $data[$key]['price'];
            $product->iva             = $data[$key]['iva'];
            $product->supplier_id     = $data[$key]['supplier_id'];
            $product->quantity        = $data[$key]['quantity'];
            $product->unity_id        = $data[$key]['unity_id'];
            $product->product_type_id = $data[$key]['product_type_id'];
            $product->save();
        }
    }
}
