<?php

use App\Unity;
use Illuminate\Database\Seeder;

class UnitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $unities = [
            ['name' => 'Mililitros'],
            ['name' => 'Litros'],
            ['name' => 'Galones'],
            ['name' => 'Kilogramo'],
            ['name' => 'Gramo'],
            ['name' => 'Pieza'],
            ['name' => 'Rollo'],
            ['name' => 'Rebanada'],
            ['name' => 'Paquete'],
            ['name' => 'Caja'],
        ];

        foreach ($unities as $unity) {
            $unity = new Unity($unity);
            $unity->save();
        }
    }
}
