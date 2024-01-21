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
        DB::table('personnels')->insert([
            ['name' => 'John',       'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Tomas',      'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Chris',      'created_at' => date('Y-m-d H:i:s')],
            ['name' => 'Melissa',    'created_at' => date('Y-m-d H:i:s')]
            ]);
    }
}
