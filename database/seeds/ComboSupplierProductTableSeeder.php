<?php

use App\Combo;
use Illuminate\Database\Seeder;

class ComboSupplierProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $combos = Combo::all();

        foreach($combos as $combo) {
            $combo->products()->attach(mt_rand(1,10), ['quantity' => mt_rand(1, 10)]);
        }
    }
}
