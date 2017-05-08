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
        // PREMIER
        $combo = Combo::find(4);
        $properties = Property::all()->pluck('id')->values();
        $combo->properties()->attach($properties);

        // PLUS
        $combo = Combo::find(3);
        $combo->properties()->attach($properties[0]);
    }
}
