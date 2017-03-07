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
            ['name' => 'Garrafón'], // 1
            ['name' => 'Bolsa'], // 2
            ['name' => 'Mililitros'], // 3
            ['name' => 'Litros'], // 4
            ['name' => 'Galones'], // 5
            ['name' => 'Kilogramo'], // 6
            ['name' => 'Gramo'], // 7
            ['name' => 'Pieza'], // 8
            ['name' => 'Rollo'], // 9
            ['name' => 'Rebanada'], // 10
            ['name' => 'Paquete'], // 11
            ['name' => 'Caja'], // 12
        ];

        foreach ($unities as $unity) {
            $unity = new Unity($unity);
            $unity->save();
        }
    }
}
