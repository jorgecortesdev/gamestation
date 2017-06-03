<?php

use Carbon\Carbon;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $date = Carbon::now()->format('Y-m-d H:i:s');

        $user = [
            'name' => 'Administrador',
            'email' => 'admin@gamestation.mx',
            'password' => bcrypt('secret'),
            'created_at' => $date,
            'updated_at' => $date,
        ];

        DB::table('users')->insert($user);
    }
}
