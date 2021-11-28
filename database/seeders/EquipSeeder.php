<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class EquipSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
     DB::table('equips')->insert([
           'alat' => 'Komputer Peribadi',
           'description' => 'desktop pc',
           'created_at' => now(),
           'updated_at' => now()
       ]);
    }
}
