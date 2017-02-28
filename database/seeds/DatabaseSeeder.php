<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(UsersTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(UnitiesTableSeeder::class);
        $this->call(ProductTypesTableSeeder::class);
        $this->call(SupplierProductsTableSeeder::class);
    }
}
