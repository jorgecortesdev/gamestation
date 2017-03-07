<?php

use Illuminate\Database\Seeder;

class SuppliersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $names = [
            'Zazueta', // 1
            'Costco', // 2
            '7 Eleven', // 3
            'Pixel', // 4
            'Proexss', // 5
            'La Macedonia', // 6
            'Rafaelos', // 7
            'Tuttifruti', // 8
            'Walmart', // 9
            'Liverpool',
            'Oxxo',
            'Santa fe',
            'Super del Norte',
            'Vimark',
            'Soriana',
            'Sams',
            'Megaeders',
        ];

        $suppliers = factory(App\Supplier::class, count($names))->make();

        foreach($suppliers as $key => $supplier) {
            $supplier->name = $names[$key];
            $supplier->save();
        }
    }
}
