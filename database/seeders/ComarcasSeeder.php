<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ComarcasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
       $init = [
            0 => [ 'tribunal_id' => 1,'nome' => 'Comarca 01', 'key' => bcrypt('Comarca 01')],
            1 => [ 'tribunal_id' => 1,'nome' => 'Comarca 02', 'key' => bcrypt('Comarca 02')],
            2 => [ 'tribunal_id' => 2,'nome' => 'Comarca 03', 'key' => bcrypt('Comarca 03')],
            3 => [ 'tribunal_id' => 2,'nome' => 'Comarca 04', 'key' => bcrypt('Comarca 04')],
            4 => [ 'tribunal_id' => 3,'nome' => 'Comarca 05', 'key' => bcrypt('Comarca 05')],
            5 => [ 'tribunal_id' => 3,'nome' => 'Comarca 06', 'key' => bcrypt('Comarca 06')],
        ];
        DB::table('comarcas')->insert($init);
    }
}
