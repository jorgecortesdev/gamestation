<?php

use App\Combo;
use Carbon\Carbon;
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
        $date = Carbon::now()->format('Y-m-d H:i:s');

        $combos = Combo::all();

        foreach($combos as $combo) {
            $combo->products()->attach(mt_rand(1,10), ['quantity' => mt_rand(1, 10)]);
        }
    }
}
