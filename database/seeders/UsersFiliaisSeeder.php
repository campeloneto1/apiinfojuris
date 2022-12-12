<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class UsersFiliaisSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = [
            0 => [ 'user_id' => 2, 'filial_id' => 1],
            1 => [ 'user_id' => 2, 'filial_id' => 2],   
        ];
        DB::table('users_filiais')->insert($init);
       
    }
}
