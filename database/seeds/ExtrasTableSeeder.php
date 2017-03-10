<?php

use App\Extra;
use Illuminate\Database\Seeder;

class ExtrasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $extras = [
            ['name' => 'Niño extra', 'price' => 80],
            ['name' => 'Adulto extra', 'price' => 50],
            ['name' => 'Servicio de palomitas', 'price' => 200],
            ['name' => 'Aguas Frescas (10 lts.)', 'price' => 230],
            ['name' => 'Cargo por fin de semana', 'price' => 300],
            ['name' => 'Cargo por liberar horario', 'price' => 200],
        ];

        foreach ($extras as $extra) {
            (new Extra($extra))->save();
        }
    }
}
