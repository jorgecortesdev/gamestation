<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ProductTypesTableSeeder extends Seeder
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
            ['name' => 'Agua Fresca', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Pizza', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Plato', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Vaso', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Servilleta cuadro', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Servilleta mano', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Grano palomero', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Aceite', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Bolsa negra grande', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Bolsa negra chica', 'created_at' => $date, 'updated_at' => $date],
            ['name' => 'Papel sanitario', 'created_at' => $date, 'updated_at' => $date],
        ];

        DB::table('product_types')->insert($types);
    }
}
