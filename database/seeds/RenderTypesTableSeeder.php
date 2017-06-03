<?php

use App\RenderType;
use Illuminate\Database\Seeder;

class RenderTypesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $render_types = [
            ['name' => 'Texto'],
            ['name' => 'Checkbox'],
            ['name' => 'Radio'],
        ];

        foreach ($render_types as $render_type) {
            $render_type = new RenderType($render_type);
            $render_type->save();
        }
    }
}
