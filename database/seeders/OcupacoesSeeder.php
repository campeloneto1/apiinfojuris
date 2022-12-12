<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OcupacoesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => [ 'nome' => 'Pedreiro' ],
            1 => [ 'nome' => 'Engenheiro' ],
            2 => [ 'nome' => 'Advogado' ],           
            3 => [ 'nome' => 'Policial' ],           
        ];
        DB::table('ocupacoes')->insert($init);
    }
}
