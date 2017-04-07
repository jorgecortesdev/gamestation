<?php

use App\Combo;
use App\Property;
use Illuminate\Database\Seeder;

class ComboPropertyTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $property = Property::find(1);
        $combo = Combo::find(4);

        $combo->properties()->attach($property);
        $combo->save();

        $combo = Combo::find(3);
        $combo->properties()->attach($property);
        $combo->save();
    }
}
