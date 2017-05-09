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
            ['id' => 1, 'name' => 'Zazueta'],
            ['id' => 2, 'name' => 'Costco'] ,
            ['id' => 3, 'name' => '7 Eleven'] ,
            ['id' => 4, 'name' => 'Pixel'] ,
            ['id' => 5, 'name' => 'Proexss'] ,
            ['id' => 6, 'name' => 'La Macedonia'] ,
            ['id' => 7, 'name' => 'Rafaelos'] ,
            ['id' => 8, 'name' => 'Tuttifruti'] ,
            ['id' => 9, 'name' => 'Walmart'] ,
            ['id' => 10, 'name' => 'Liverpool'] ,
            ['id' => 11, 'name' => 'Sams'] ,
            ['id' => 12, 'name' => 'Megaeders'],
        ];
        $suppliers = factory(App\Supplier::class, count($names))->make();
        foreach($suppliers as $key => $supplier) {
            $supplier->id = $names[$key]['id'];
            $supplier->name = $names[$key]['name'];
            $supplier->save();
        }
    }
}
