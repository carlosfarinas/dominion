<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(ProductSeeder::class);
        $this->call(PersonnelSeeder::class);
        $this->call(ToolSeeder::class);
        $this->call(SuppliesSeeder::class);
    }
}
