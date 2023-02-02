<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TribunaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => [ 'nome' => 'Tribunal 01', 'key' => bcrypt('Tribunal 01')],
            1 => [ 'nome' => 'Tribunal 02', 'key' => bcrypt('Tribunal 02')],
            2 => [ 'nome' => 'Tribunal 03', 'key' => bcrypt('Tribunal 03')],           
        ];
        DB::table('tribunais')->insert($init);
    }
}
