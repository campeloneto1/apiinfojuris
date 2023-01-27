<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class EstadosCivisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => [ 'nome' => 'Solteiro' ],
            1 => [ 'nome' => 'Casado' ],
            2 => [ 'nome' => 'Divorciado' ],
            3 => [ 'nome' => 'Viúvo' ],        
            4 => [ 'nome' => 'União Estável' ],
        ];
        DB::table('estados_civis')->insert($init);
    }
}
