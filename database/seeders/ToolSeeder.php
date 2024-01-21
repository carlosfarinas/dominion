<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ToolSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tools')->insert([
            ['name' => 'Shovel', 'stock' => '480', 'stock_min' => '500', 'stock_max' => '1000','created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Rake', 'stock' => '320', 'stock_min' => '250', 'stock_max' => '800','created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Basket', 'stock' => '200', 'stock_min' => '300', 'stock_max' => '950','created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Hoses', 'stock' => '180', 'stock_min' => '120', 'stock_max' => '500','created_at' => date('Y-m-d H:i:s')]
        ]);
    }
}
