<?php

use App\Extra;
use Illuminate\Database\Seeder;

class ExtraSupplierProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $extra = Extra::find(3);

        $extra->products()->attach([11, 12, 17, 19]);
    }
}
