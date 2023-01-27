<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class StatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => [ 'nome' => 'Protocolado', 'aberto' => 1, 'andamento' => 0, 'concluido' => 0, 'cancelado' => 0, 'incidente' => 0 ],
            1 => [ 'nome' => 'Fase de Instrução', 'aberto' => 0, 'andamento' => 1, 'concluido' => 0, 'cancelado' => 0, 'incidente' => 0 ],
            2 => [ 'nome' => 'Aguardando Sentença', 'aberto' => 0, 'andamento' => 1, 'concluido' => 0, 'cancelado' => 0, 'incidente' => 0 ],
            2 => [ 'nome' => 'Grau de Recurso', 'aberto' => 0, 'andamento' => 1, 'concluido' => 0, 'cancelado' => 0, 'incidente' => 0 ],
            2 => [ 'nome' => 'Fase de Cumprimento de Setença', 'aberto' => 0, 'andamento' => 1, 'concluido' => 0, 'cancelado' => 0, 'incidente' => 0 ],
            2 => [ 'nome' => 'Incidente em Fase de Cumprimento de Sentença', 'aberto' => 0, 'andamento' => 0, 'concluido' => 0, 'cancelado' => 0, 'incidente' => 1 ],
            2 => [ 'nome' => 'Suspenso', 'aberto' => 0, 'andamento' => 0, 'concluido' => 0, 'cancelado' => 1, 'incidente' => 0  ],
            2 => [ 'nome' => 'Arquivamento Provisoriamente', 'aberto' => 0, 'andamento' => 0, 'concluido' => 0, 'cancelado' => 1, 'incidente' => 0  ],
            2 => [ 'nome' => 'Arquivamento Definitivo', 'aberto' => 0, 'andamento' => 0, 'concluido' => 0, 'cancelado' => 1, 'incidente' => 0 ],
        ];
        DB::table('status')->insert($init);
    }
}
