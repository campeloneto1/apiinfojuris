<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class FiliaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => [ 'escritorio_id' => 1, 'nome' => 'Filial 01', 'key' => bcrypt('1Filial 01')],
            2 => [ 'escritorio_id' => 1,'nome' => 'Filial 02', 'key' => bcrypt('1Filial 02')],
            3 => [ 'escritorio_id' => 2, 'nome' => 'Filial 03', 'key' => bcrypt('2Filial 03')],
        ];
        DB::table('filiais')->insert($init);
    }
}
