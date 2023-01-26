<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EscritoriosSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => [ 'nome' => 'Escritorio 01', 'cnpj' => '0000000010001', 'key' => bcrypt('0000000010001')],
            2 => [ 'nome' => 'Escritorio 02', 'cnpj' => '0000000020002', 'key' => bcrypt('0000000020002')],
            3 => [ 'nome' => 'Escritorio 03', 'cnpj' => '0000000030003', 'key' => bcrypt('0000000030003')],
        ];
        DB::table('escritorios')->insert($init);
    }
}
