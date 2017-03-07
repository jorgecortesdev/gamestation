<?php

use Illuminate\Database\Seeder;

class CombosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = [
            ['name' => 'Paquete Mini', 'price' => 2400, 'color' => 'green'],
            ['name' => 'Paquete Básico', 'price' => 3200, 'color' => 'blue'],
            ['name' => 'Paquete Plus', 'price' => 4500, 'color' => 'yellow'],
            ['name' => 'Paquete Premier', 'price' => 6900, 'color' => 'red']
        ];

        $combos = factory(App\Combo::class, 4)->make();

        foreach ($combos as $key => $combo) {
            $combo->name  = $data[$key]['name'];
            $combo->price = $data[$key]['price'];
            $combo->color = $data[$key]['color'];
            $combo->save();
        }
    }
}
