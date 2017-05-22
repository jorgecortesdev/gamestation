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
        $data = [
            ['name' => 'Agua Premier', 'price' => 2500, 'iva' => false, 'supplier_id' => 3, 'quantity' => 1, 'unity_id' => 1, 'product_type_id' => 2],
            ['name' => 'Bahía Hielo 3.6KG', 'price' => 2000, 'iva' => false, 'supplier_id' => 3, 'quantity' => 1, 'unity_id' => 2, 'product_type_id' => 6],
            ['name' => 'Pizza Titán Redonda', 'price' => 26699, 'iva' => true, 'supplier_id' => 6, 'quantity' => 1, 'unity_id' => 8, 'product_type_id' => 7],
            ['name' => 'Invitación Standard', 'price' => 133, 'iva' => false, 'supplier_id' => 4, 'quantity' => 156, 'unity_id' => 8, 'product_type_id' => 4],
            ['name' => 'Ánfora Sinker Transparente', 'price' => 1624, 'iva' => true, 'supplier_id' => 5, 'quantity' => 1000, 'unity_id' => 8, 'product_type_id' => 5],
            ['name' => 'Pizza Mega', 'price' => 16900, 'iva' => false, 'supplier_id' => 7, 'quantity' => 1, 'unity_id' => 8, 'product_type_id' => 7],
            ['name' => 'Horchata', 'price' => 1500, 'iva' => false, 'supplier_id' => 8, 'quantity' => 20, 'unity_id' => 4, 'product_type_id' => 3],
            ['name' => 'Jamaica', 'price' => 1000, 'iva' => false, 'supplier_id' => 8, 'quantity' => 20, 'unity_id' => 4, 'product_type_id' => 3],
            ['name' => 'Limonada', 'price' => 1000, 'iva' => false, 'supplier_id' => 8, 'quantity' => 20, 'unity_id' => 4, 'product_type_id' => 3],
            ['name' => 'Piña', 'price' => 10000, 'iva' => false, 'supplier_id' => 8, 'quantity' => 20, 'unity_id' => 4, 'product_type_id' => 3],
            ['name' => 'Maíz Palomero', 'price' => 1972, 'iva' => true, 'supplier_id' => 1, 'quantity' => 1, 'unity_id' => 6, 'product_type_id' => 12],
            ['name' => 'Bolsa café #1', 'price' => 17.17, 'iva' => true, 'supplier_id' => 1, 'quantity' => 100, 'unity_id' => 11, 'product_type_id' => 13],
            ['name' => 'Papel de baño', 'price' => 725, 'iva' => true, 'supplier_id' => 1, 'quantity' => 4, 'unity_id' => 9, 'product_type_id' => 19],
            ['name' => 'Servilletas de mano (Sanitas)', 'price' => 2529, 'iva' => true, 'supplier_id' => 1, 'quantity' => 1, 'unity_id' => 11, 'product_type_id' => 11],
            ['name' => 'Bolsas para basura pequeñas', 'price' => 206.22, 'iva' => true, 'supplier_id' => 1, 'quantity' => 18, 'unity_id' => 11, 'product_type_id' => 18],
            ['name' => 'Guantes de polietileno', 'price' => 29, 'iva' => true, 'supplier_id' => 1, 'quantity' => 100, 'unity_id' => 11, 'product_type_id' => 15],
            ['name' => 'Aceite Nutrioli', 'price' => 3.712, 'iva' => true, 'supplier_id' => 1, 'quantity' => 1000, 'unity_id' => 3, 'product_type_id' => 16],
            ['name' => 'Servilletas MAX', 'price' => 5.336, 'iva' => true, 'supplier_id' => 1, 'quantity' => 500, 'unity_id' => 11, 'product_type_id' => 10],
            ['name' => 'Sal para palomitas', 'price' => 6.96, 'iva' => true, 'supplier_id' => 1, 'quantity' => 500, 'unity_id' => 7, 'product_type_id' => 14],
            ['name' => 'Charola Mariel #66', 'price' => 34.8, 'iva' => true, 'supplier_id' => 1, 'quantity' => 50, 'unity_id' => 11, 'product_type_id' => 8],
            ['name' => 'Fabuloso naranja', 'price' => 2.32, 'iva' => true, 'supplier_id' => 2, 'quantity' => 1000, 'unity_id' => 3, 'product_type_id' => 2],
            ['name' => 'MR Músculo Windex', 'price' => 4.756, 'iva' => true, 'supplier_id' => 9, 'quantity' => 1000, 'unity_id' => 3, 'product_type_id' => 2],
            ['name' => 'Otros', 'price' => 1500, 'iva' => false, 'supplier_id' => 8, 'quantity' => 20, 'unity_id' => 4, 'product_type_id' => 3],
            ['name' => 'Jamón', 'price' => 26699, 'iva' => true, 'supplier_id' => 6, 'quantity' => 1, 'unity_id' => 8, 'product_type_id' => 7],
            ['name' => 'Pepperoni', 'price' => 26699, 'iva' => true, 'supplier_id' => 6, 'quantity' => 1, 'unity_id' => 8, 'product_type_id' => 7],
        ];

        $products = factory(App\Product::class, count($data))->make();

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
