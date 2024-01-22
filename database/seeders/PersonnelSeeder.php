<?php

namespace Database\Seeders;

use App\Models\Personnel;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PersonnelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('personnel')->insert([
            ['name' => 'John', 'responsibility_id' => '1', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Tomas', 'responsibility_id' => '1', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Chris', 'responsibility_id' => '1', 'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Melissa', 'responsibility_id' => '1', 'created_at' => date('Y-m-d H:i:s')]
            ]);
    }
}
