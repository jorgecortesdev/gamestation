<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class ComboItemsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');


        for ($i = 1; $i < 5; $i++) {
            for ($j = 1; $j < 21; $j++) {
                $combo_item = new App\ComboItem();
                $combo_item->combo_id = $i;
                $combo_item->supplier_product_id = $j;
                $combo_item->created_at = $date;
                $combo_item->updated_at = $date;
                $combo_item->save();
            }
        }
    }
}
