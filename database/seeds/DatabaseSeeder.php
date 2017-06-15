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
        /** Users */
        $this->call(UsersTableSeeder::class);

        /** Catalogues */
        $this->call(RenderTypesTableSeeder::class);
        // $this->call(UnitiesTableSeeder::class);
        // $this->call(ProductTypesTableSeeder::class);
        // $this->call(PropertiesTableSeeder::class);

        /** Products */
        // $this->call(SuppliersTableSeeder::class);
        // $this->call(ProductsTableSeeder::class);
        // $this->call(ActivateProducts::class);

        /** Clients & Kids */
        // $this->call(ClientsTableSeeder::class);

        /** Combos */
        // $this->call(CombosTableSeeder::class);

        /** Extras */
        // $this->call(ExtrasTableSeeder::class);

        /** Events */
        // $this->call(EventsTableSeeder::class);
        // $this->call(ConfigurationsTableSeeder::class);
    }
}
