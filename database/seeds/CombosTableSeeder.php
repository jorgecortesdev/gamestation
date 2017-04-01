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
            ['name' => 'Mini', 'hours' => 3, 'kids' => 13, 'adults' => 5, 'price' => 2400, 'google_color_id' => 10],
            ['name' => 'Básico', 'hours' => 3, 'kids' => 25, 'adults' => 5, 'price' => 3200, 'google_color_id' => 9],
            ['name' => 'Plus', 'hours' => 3, 'kids' => 30, 'adults' => 5, 'price' => 4500, 'google_color_id' => 5],
            ['name' => 'Premier', 'hours' => 3, 'kids' => 30, 'adults' => 5, 'price' => 6900, 'google_color_id' => 11]
        ];

        $combos = factory(App\Combo::class, 4)->make();

        foreach ($combos as $key => $combo) {
            $combo->name = $data[$key]['name'];
            $combo->hours = $data[$key]['hours'];
            $combo->kids = $data[$key]['kids'];
            $combo->adults = $data[$key]['adults'];
            $combo->price = $data[$key]['price'];
            $combo->google_color_id = $data[$key]['google_color_id'];
            $combo->save();
        }
    }
}
