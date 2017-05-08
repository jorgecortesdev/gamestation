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
        $this->call(SupplierTypesTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(UnitiesTableSeeder::class);
        $this->call(ProductTypesTableSeeder::class);
        $this->call(ProductsTableSeeder::class);
        $this->call(CombosTableSeeder::class);
        $this->call(ExtrasTableSeeder::class);
        $this->call(ClientsAndKidsTableSeeder::class);
        $this->call(RenderTypesTableSeeder::class);
        $this->call(PropertiesTableSeeder::class);
        $this->call(ComboPropertyTableSeeder::class);
        $this->call(ActivateProductsSeeder::class);
        $this->call(EventsTableSeeder::class);
        $this->call(ProductTypeableTableSeeder::class);
        $this->call(EventExtraTableSeeder::class);
        $this->call(ConfigurablesTableSeeder::class);
        $this->call(EventPropertyTableSeeder::class);
    }
}
