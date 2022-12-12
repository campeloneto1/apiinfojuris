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
            0 => [ 'nome' => 'Escritorio 01', 'cnpj' => '000000001/0001', 'key' => bcrypt('000000001/0001')],
            2 => [ 'nome' => 'Escritorio 02', 'cnpj' => '000000002/0002', 'key' => bcrypt('000000002/0002')],
            3 => [ 'nome' => 'Escritorio 03', 'cnpj' => '000000003/0003', 'key' => bcrypt('000000003/0003')],
        ];
        DB::table('escritorios')->insert($init);
    }
}
