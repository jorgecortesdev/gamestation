<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class SupplierTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');

        $types = [
            ['name' => 'Producto', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Servicio', 'created_at' => $date, 'updated_at' => $date]
        ];

        DB::table('supplier_types')->insert($types);
    }
}
