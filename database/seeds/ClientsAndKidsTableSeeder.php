<?php

use Illuminate\Database\Seeder;

class ClientsAndKidsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Crea un cliente con un hijo
        factory(App\Client::class, 25)->create()->each(function ($client) {
            $client->kids()->save(factory(App\Kid::class)->make());
        });
    }
}
