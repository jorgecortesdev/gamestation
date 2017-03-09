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
            ['name' => 'Mini', 'price' => 2400, 'google_color_id' => 10],
            ['name' => 'Básico', 'price' => 3200, 'google_color_id' => 9],
            ['name' => 'Plus', 'price' => 4500, 'google_color_id' => 5],
            ['name' => 'Premier', 'price' => 6900, 'google_color_id' => 11]
        ];

        $combos = factory(App\Combo::class, 4)->make();

        foreach ($combos as $key => $combo) {
            $combo->name  = $data[$key]['name'];
            $combo->price = $data[$key]['price'];
            $combo->google_color_id = $data[$key]['google_color_id'];
            $combo->save();
        }
    }
}
