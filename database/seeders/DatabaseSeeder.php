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
