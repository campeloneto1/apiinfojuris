<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VarasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => [ 'comarca_id' => 1,'nome' => 'Vara 01', 'key' => bcrypt('Vara 01')],
            1 => [ 'comarca_id' => 2,'nome' => 'Vara 02', 'key' => bcrypt('Vara 02')],
            2 => [ 'comarca_id' => 3,'nome' => 'Vara 03', 'key' => bcrypt('Vara 03')],
            3 => [ 'comarca_id' => 4,'nome' => 'Vara 04', 'key' => bcrypt('Vara 04')],
            4 => [ 'comarca_id' => 5,'nome' => 'Vara 05', 'key' => bcrypt('Vara 05')],
            5 => [ 'comarca_id' => 6,'nome' => 'Vara 06', 'key' => bcrypt('Vara 06')],
        ];
        DB::table('varas')->insert($init);
    }
}
