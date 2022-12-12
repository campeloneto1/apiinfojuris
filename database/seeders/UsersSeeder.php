<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Schema::disableForeignKeyConstraints();
        $init = [
            0 => [ 'nome' => 'Jose de Barros Campelo Neto', 'cpf' => '05906219471', 'password' => bcrypt('123456'), 'email' => 'campeloneto1@gmail.com', 'telefone1' => '88999492036',  'perfil_id' => 1, 'key' => bcrypt('05906219471')],
            1 => [ 'nome' => 'Nathalia Araujo Pereira', 'cpf' => '04219964398', 'password' => bcrypt('123456'), 'email' => 'campeloneto1@gmail.com', 'telefone1' => '88999492036', 'perfil_id' => 2, 'key' => bcrypt('04219964398')],
           
        ];
        DB::table('users')->insert($init);
        //Schema::enableForeignKeyConstraints();
    }
}
