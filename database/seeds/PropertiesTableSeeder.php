<?php

use App\Property;
use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $properties = [
            ['label' => 'Hora de la pizza', 'property_type_id' => 1, 'options' => []],
            ['label' => 'Personaje', 'property_type_id' => 1, 'options' => []],
            ['label' => 'Sabor bollitos', 'property_type_id' => 3, 'options' => ['Vainilla', 'Chocolate']],
            ['label' => 'Snack 1', 'property_type_id' => 3, 'options' => ['Vasos con bombones', 'Paletas payaso']],
            ['label' => 'Tipo de evento', 'property_type_id' => 2, 'options' => ['Regalo', 'Sobre']],
            ['label' => 'Entrega de invitaciones', 'property_type_id' => 1, 'options' => []],
        ];

        foreach ($properties as $property) {
            $property = new Property($property);
            $property->save();
        }
    }
}
