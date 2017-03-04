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
            'Zazueta',
            'Liverpool',
            'Walmart',
            '7 Eleven',
            'Oxxo',
            'Santa fe',
            'Super del Norte',
            'Vimark',
            'Soriana',
            'Costco',
            'Sams',
            'Megaeders',
            'Tuttifruti',
            'Pixel',
            'Proexss'
        ];

        $suppliers = factory(App\Supplier::class, count($names))->make();

        foreach($suppliers as $key => $supplier) {
            $supplier->name = $names[$key];
            $supplier->save();
        }
    }
}
