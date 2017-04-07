<?php

use App\PropertyType;
use Illuminate\Database\Seeder;

class PropertyTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $property_types = [
            ['name' => 'Texto'],
            ['name' => 'Checkbox'],
            ['name' => 'Radio'],
        ];

        foreach ($property_types as $property_type) {
            $property_type = new PropertyType($property_type);
            $property_type->save();
        }
    }
}
