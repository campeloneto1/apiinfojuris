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
            0 => [ 'nome' => 'Tribunal de Justiça do Acre', 'sigla' => 'TJAC', 'key' => bcrypt('Tribunal de Justiça do Acre')],
            1 => [ 'nome' => 'Tribunal de Justiça de Alagoas', 'sigla' => 'TJAL', 'key' => bcrypt('Tribunal de Justiça de Alagoas')],
            3 => [ 'nome' => 'Tribunal de Justiça do Amapá', 'sigla' => 'TJAP', 'key' => bcrypt('Tribunal de Justiça do Amapá')], 
            4 => [ 'nome' => 'Tribunal de Justiça do Amazonas', 'sigla' => 'TJAM', 'key' => bcrypt('Tribunal de Justiça do Amazonas')], 
            5 => [ 'nome' => 'Tribunal de Justiça da Bahia', 'sigla' => 'TJBA', 'key' => bcrypt('Tribunal de Justiça da Bahia')], 
            6 => [ 'nome' => 'Tribunal de Justiça do Ceará', 'sigla' => 'TJCE', 'key' => bcrypt('Tribunal de Justiça do Ceará')], 
            7 => [ 'nome' => 'Tribunal de Justiça do Distrito Federal e Territórios', 'sigla' => 'TJDFT', 'key' => bcrypt('Tribunal de Justiça do Distrito Federal e Territórios')], 
            8 => [ 'nome' => 'Tribunal de Justiça do Espírito Santo', 'sigla' => 'TJES', 'key' => bcrypt('Tribunal de Justiça do Espírito Santo')], 
            9 => [ 'nome' => 'Tribunal de Justiça de Goiás', 'sigla' => 'TJGO', 'key' => bcrypt('Tribunal de Justiça de Goiás')], 
            10 => [ 'nome' => 'Tribunal de Justiça do Maranhão', 'sigla' => 'TJMA', 'key' => bcrypt('Tribunal de Justiça do Maranhão')], 
            11 => [ 'nome' => 'Tribunal de Justiça de Mato Grosso', 'sigla' => 'TJMT', 'key' => bcrypt('Tribunal de Justiça de Mato Grosso')], 
            12 => [ 'nome' => 'Tribunal de Justiça de Mato Grosso do Sul', 'sigla' => 'TJMS', 'key' => bcrypt('Tribunal de Justiça de Mato Grosso do Sul')], 
            13 => [ 'nome' => 'Tribunal de Justiça de Minas Gerais', 'sigla' => 'TJMG', 'key' => bcrypt('Tribunal de Justiça de Minas Gerais')], 
            14 => [ 'nome' => 'Tribunal de Justiça do Pará', 'sigla' => 'TJPA', 'key' => bcrypt('Tribunal de Justiça do Pará')], 
            15 => [ 'nome' => 'Tribunal de Justiça da Paraíba', 'sigla' => 'TJPB', 'key' => bcrypt('Tribunal de Justiça da Paraíba')], 
            16 => [ 'nome' => 'Tribunal de Justiça do Paraná', 'sigla' => 'TJPR', 'key' => bcrypt('Tribunal de Justiça do Paraná')], 
            17 => [ 'nome' => 'Tribunal de Justiça de Pernambuco', 'sigla' => 'TJPE', 'key' => bcrypt('Tribunal de Justiça de Pernambuco')], 
            18 => [ 'nome' => 'Tribunal de Justiça do Piauí', 'sigla' => 'TJPI', 'key' => bcrypt('Tribunal de Justiça do Piauí')], 
            19 => [ 'nome' => 'Tribunal de Justiça do Rio de Janeiro', 'sigla' => 'TJRJ', 'key' => bcrypt('Tribunal de Justiça do Rio de Janeiro')], 
            20 => [ 'nome' => 'Tribunal de Justiça do Rio Grande do Norte', 'sigla' => 'TJRN', 'key' => bcrypt('Tribunal de Justiça do Rio Grande do Norte')], 
            21 => [ 'nome' => 'Tribunal de Justiça do Rio Grande do Sul', 'sigla' => 'TJRS', 'key' => bcrypt('Tribunal de Justiça do Rio Grande do Sul')], 
            22 => [ 'nome' => 'Tribunal de Justiça de Rondônia', 'sigla' => 'TJRO', 'key' => bcrypt('Tribunal de Justiça de Rondônia')], 
            23 => [ 'nome' => 'Tribunal de Justiça de Roraima', 'sigla' => 'TJRR', 'key' => bcrypt('Tribunal de Justiça de Roraima')], 
            24 => [ 'nome' => 'Tribunal de Justiça de Santa Catarina', 'sigla' => 'TJSC', 'key' => bcrypt('Tribunal de Justiça de Santa Catarina')], 
            25 => [ 'nome' => 'Tribunal de Justiça de São Paulo', 'sigla' => 'TJSP', 'key' => bcrypt('Tribunal de Justiça de São Paulo')], 
            26 => [ 'nome' => 'Tribunal de Justiça de Sergipe', 'sigla' => 'TJSE', 'key' => bcrypt('Tribunal de Justiça de Sergipe')], 
            27 => [ 'nome' => 'Tribunal de Justiça do Tocantins', 'sigla' => 'TJTO', 'key' => bcrypt('Tribunal de Justiça do Tocantins')], 

            28 => [ 'nome' => 'Tribunal Regional Eleitoral do Acre', 'sigla' => 'TREAC', 'key' => bcrypt('Tribunal Regional Eleitoral do Acre')],
            29 => [ 'nome' => 'Tribunal Regional Eleitoral de Alagoas', 'sigla' => 'TREAL', 'key' => bcrypt('Tribunal Regional Eleitoral de Alagoas')],
            30 => [ 'nome' => 'Tribunal Regional Eleitoral do Amapá', 'sigla' => 'TREAP', 'key' => bcrypt('Tribunal Regional Eleitoral do Amapá')], 
            31 => [ 'nome' => 'Tribunal Regional Eleitoral do Amazonas', 'sigla' => 'TREAM', 'key' => bcrypt('Tribunal Regional Eleitoral do Amazonas')], 
            32 => [ 'nome' => 'Tribunal Regional Eleitoral da Bahia', 'sigla' => 'TREBA', 'key' => bcrypt('Tribunal Regional Eleitoral da Bahia')], 
            33 => [ 'nome' => 'Tribunal Regional Eleitoral do Ceará', 'sigla' => 'TRECE', 'key' => bcrypt('Tribunal Regional Eleitoral do Ceará')], 
            34 => [ 'nome' => 'Tribunal Regional Eleitoral do Distrito Federal e Territórios', 'sigla' => 'TREDFT', 'key' => bcrypt('Tribunal Regional Eleitoral do Distrito Federal e Territórios')], 
            35 => [ 'nome' => 'Tribunal Regional Eleitoral do Espírito Santo', 'sigla' => 'TREES', 'key' => bcrypt('Tribunal Regional Eleitoral do Espírito Santo')], 
            36 => [ 'nome' => 'Tribunal Regional Eleitoral de Goiás', 'sigla' => 'TREGO', 'key' => bcrypt('Tribunal Regional Eleitoral de Goiás')], 
            37 => [ 'nome' => 'Tribunal Regional Eleitoral do Maranhão', 'sigla' => 'TREMA', 'key' => bcrypt('Tribunal Regional Eleitoral do Maranhão')], 
            38 => [ 'nome' => 'Tribunal Regional Eleitoral de Mato Grosso', 'sigla' => 'TREMT', 'key' => bcrypt('Tribunal Regional Eleitoral de Mato Grosso')], 
            39 => [ 'nome' => 'Tribunal Regional Eleitoral de Mato Grosso do Sul', 'sigla' => 'TREMS', 'key' => bcrypt('Tribunal Regional Eleitoral de Mato Grosso do Sul')], 
            40 => [ 'nome' => 'Tribunal Regional Eleitoral de Minas Gerais', 'sigla' => 'TREMG', 'key' => bcrypt('Tribunal Regional Eleitoral de Minas Gerais')], 
            41 => [ 'nome' => 'Tribunal Regional Eleitoral do Pará', 'sigla' => 'TREPA', 'key' => bcrypt('Tribunal Regional Eleitoral do Pará')], 
            42 => [ 'nome' => 'Tribunal Regional Eleitoral da Paraíba', 'sigla' => 'TREPB', 'key' => bcrypt('Tribunal Regional Eleitoral da Paraíba')], 
            43 => [ 'nome' => 'Tribunal Regional Eleitoral do Paraná', 'sigla' => 'TREPR', 'key' => bcrypt('Tribunal Regional Eleitoral do Paraná')], 
            44 => [ 'nome' => 'Tribunal Regional Eleitoral de Pernambuco', 'sigla' => 'TREPE', 'key' => bcrypt('Tribunal Regional Eleitoral de Pernambuco')], 
            45 => [ 'nome' => 'Tribunal Regional Eleitoral do Piauí', 'sigla' => 'TREPI', 'key' => bcrypt('Tribunal Regional Eleitoral do Piauí')], 
            46 => [ 'nome' => 'Tribunal Regional Eleitoral do Rio de Janeiro', 'sigla' => 'TRERJ', 'key' => bcrypt('Tribunal Regional Eleitoral do Rio de Janeiro')], 
            47 => [ 'nome' => 'Tribunal Regional Eleitoral do Rio Grande do Norte', 'sigla' => 'TRERN', 'key' => bcrypt('Tribunal Regional Eleitoral do Rio Grande do Norte')], 
            48 => [ 'nome' => 'Tribunal Regional Eleitoral do Rio Grande do Sul', 'sigla' => 'TRERS', 'key' => bcrypt('Tribunal Regional Eleitoral do Rio Grande do Sul')], 
            49 => [ 'nome' => 'Tribunal Regional Eleitoral de Rondônia', 'sigla' => 'TRERO', 'key' => bcrypt('Tribunal Regional Eleitoral de Rondônia')], 
            50 => [ 'nome' => 'Tribunal Regional Eleitoral de Roraima', 'sigla' => 'TRERR', 'key' => bcrypt('Tribunal Regional Eleitoral de Roraima')], 
            51 => [ 'nome' => 'Tribunal Regional Eleitoral de Santa Catarina', 'sigla' => 'TRESC', 'key' => bcrypt('Tribunal Regional Eleitoral de Santa Catarina')], 
            52 => [ 'nome' => 'Tribunal Regional Eleitoral de São Paulo', 'sigla' => 'TRESP', 'key' => bcrypt('Tribunal Regional Eleitoral de São Paulo')], 
            53 => [ 'nome' => 'Tribunal Regional Eleitoral de Sergipe', 'sigla' => 'TRESE', 'key' => bcrypt('Tribunal Regional Eleitoral de Sergipe')], 
            54 => [ 'nome' => 'Tribunal Regional Eleitoral do Tocantins', 'sigla' => 'TRETO', 'key' => bcrypt('Tribunal Regional Eleitoral do Tocantins')], 

            55 => [ 'nome' => 'Tribunal Regional do Trabalho da 1ª Região  (RJ)', 'sigla' => 'TRT1', 'key' => bcrypt('Tribunal Regional do Trabalho da 1ª Região')],
            56 => [ 'nome' => 'Tribunal Regional do Trabalho da 2ª Região (SP / Grande São Paulo e Baixada Santista)', 'sigla' => 'TRT2', 'key' => bcrypt('Tribunal Regional do Trabalho da 2ª Região')],
            57 => [ 'nome' => 'Tribunal Regional do Trabalho da 3ª Região (MG)', 'sigla' => 'TRT3', 'key' => bcrypt('Tribunal Regional do Trabalho da 3ª Região')],
            58 => [ 'nome' => 'Tribunal Regional do Trabalho da 4ª Região (RS)', 'sigla' => 'TRT4', 'key' => bcrypt('Tribunal Regional do Trabalho da 4ª Região')], 
            59 => [ 'nome' => 'Tribunal Regional do Trabalho da 5ª Região (BA)', 'sigla' => 'TRT5', 'key' => bcrypt('Tribunal Regional do Trabalho da 5ª Região')],
            60 => [ 'nome' => 'Tribunal Regional do Trabalho da 6ª Região (PE)', 'sigla' => 'TRT6', 'key' => bcrypt('Tribunal Regional do Trabalho da 6ª Região')],
            61 => [ 'nome' => 'Tribunal Regional do Trabalho da 7ª Região (CE)', 'sigla' => 'TRT7', 'key' => bcrypt('Tribunal Regional do Trabalho da 7ª Região')],
            62 => [ 'nome' => 'Tribunal Regional do Trabalho da 8ª Região (AP e PA)', 'sigla' => 'TRT8', 'key' => bcrypt('Tribunal Regional do Trabalho da 8ª Região')],
            63 => [ 'nome' => 'Tribunal Regional do Trabalho da 9ª Região (PR)', 'sigla' => 'TRT9', 'key' => bcrypt('Tribunal Regional do Trabalho da 9ª Região')],
            64 => [ 'nome' => 'Tribunal Regional do Trabalho da 10ª Região (DF e TO)', 'sigla' => 'TRT10', 'key' => bcrypt('Tribunal Regional do Trabalho da 10ª Região')],
            65 => [ 'nome' => 'Tribunal Regional do Trabalho da 11ª Região (AM e RR)', 'sigla' => 'TRT11', 'key' => bcrypt('Tribunal Regional do Trabalho da 11ª Região')],
            66 => [ 'nome' => 'Tribunal Regional do Trabalho da 12ª Região (SC)', 'sigla' => 'TRT12', 'key' => bcrypt('Tribunal Regional do Trabalho da 12ª Região')],
            67 => [ 'nome' => 'Tribunal Regional do Trabalho da 13ª Região (PB)', 'sigla' => 'TRT13', 'key' => bcrypt('Tribunal Regional do Trabalho da 13ª Região')],
            68 => [ 'nome' => 'Tribunal Regional do Trabalho da 14ª Região (AC e RO)', 'sigla' => 'TRT14', 'key' => bcrypt('Tribunal Regional do Trabalho da 14ª Região')],
            69 => [ 'nome' => 'Tribunal Regional do Trabalho da 15ª Região (SP / Interior e Litoral Norte e Sul)', 'sigla' => 'TRT15', 'key' => bcrypt('Tribunal Regional do Trabalho da 15ª Região')],
            70 => [ 'nome' => 'Tribunal Regional do Trabalho da 16ª Região  (MA)', 'sigla' => 'TRT16', 'key' => bcrypt('Tribunal Regional do Trabalho da 16ª Região')],
            71 => [ 'nome' => 'Tribunal Regional do Trabalho da 17ª Região (ES)', 'sigla' => 'TRT17', 'key' => bcrypt('Tribunal Regional do Trabalho da 17ª Região')],
            72 => [ 'nome' => 'Tribunal Regional do Trabalho da 18ª Região (GO)', 'sigla' => 'TRT18', 'key' => bcrypt('Tribunal Regional do Trabalho da 18ª Região')],
            73 => [ 'nome' => 'Tribunal Regional do Trabalho da 19ª Região (AL)', 'sigla' => 'TRT19', 'key' => bcrypt('Tribunal Regional do Trabalho da 19ª Região')],
            74 => [ 'nome' => 'Tribunal Regional do Trabalho da 20ª Região (SE)', 'sigla' => 'TRT20', 'key' => bcrypt('Tribunal Regional do Trabalho da 20ª Região')],
            75 => [ 'nome' => 'Tribunal Regional do Trabalho da 21ª Região (RN)', 'sigla' => 'TRT21', 'key' => bcrypt('Tribunal Regional do Trabalho da 21ª Região')],
            76 => [ 'nome' => 'Tribunal Regional do Trabalho da 22ª Região (PI)', 'sigla' => 'TRT22', 'key' => bcrypt('Tribunal Regional do Trabalho da 22ª Região')],
            77 => [ 'nome' => 'Tribunal Regional do Trabalho da 23ª Região (MT)', 'sigla' => 'TRT23', 'key' => bcrypt('Tribunal Regional do Trabalho da 23ª Região')],
            78 => [ 'nome' => 'Tribunal Regional do Trabalho da 24ª Região (MS)', 'sigla' => 'TRT24', 'key' => bcrypt('Tribunal Regional do Trabalho da 24ª Região')],

            79 => [ 'nome' => 'Tribunal de Justiça Militar de Minas Gerais', 'sigla' => 'TJMMG', 'key' => bcrypt('Tribunal de Justiça Militar de Minas Gerais')],
            80 => [ 'nome' => 'Tribunal de Justiça Militar do Rio Grande do Sul', 'sigla' => 'TJMRS', 'key' => bcrypt('Tribunal de Justiça Militar do Rio Grande do Sul')],
            81 => [ 'nome' => 'Tribunal de Justiça Militar de São Paulo', 'sigla' => 'TJMSP', 'key' => bcrypt('Tribunal de Justiça Militar de São Paulo')],
           
        ];
        DB::table('tribunais')->insert($init);

    }
}
