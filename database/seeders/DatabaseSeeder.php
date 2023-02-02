<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;

class DatabaseSeeder extends Seeder
{
    /**
     * php artisan migrate:fresh --seed
     * php artisan passport:install
     * php artisan key:generate
     * Seed the application's database.

     UPDATE `perfis` SET `administrador`= 1,`gestor`= 1,`audiencias`= 1,`audiencias_cad`= 1,`audiencias_edt`= 1,`audiencias_del`= 1,`filiais`= 1,`filiais_cad`= 1,`filiais_edt`= 1,`filiais_del`= 1,`lancamentos`= 1,`lancamentos_cad`= 1,`lancamentos_edt`= 1,`lancamentos_del`= 1,`pessoas`= 1,`pessoas_cad`= 1,`pessoas_edt`= 1,`pessoas_del`= 1,`processos`= 1,`processos_cad`= 1,`processos_edt`= 1,`processos_del`= 1,`usuarios`= 1,`usuarios_cad`= 1,`usuarios_edt`= 1,`usuarios_del`= 1 WHERE `id` = 1
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();
        $this->call([            
            StatusSeeder::class, 
            SexosSeeder::class, 
            EstadosCivisSeeder::class, 
            TribunaisSeeder::class,
            ComarcasSeeder::class,
            VarasSeeder::class,
            NaturezasSeeder::class,
            OcupacoesSeeder::class,
            PaisesSeeder::class,          
            EscritoriosSeeder::class, 
            FiliaisSeeder::class, 
            PerfisSeeder::class, 
            UsersSeeder::class,     
            UsersFiliaisSeeder::class,            
        ]);
        Schema::enableForeignKeyConstraints();
    }
}
