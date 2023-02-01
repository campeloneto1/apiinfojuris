<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::disableForeignKeyConstraints();
        Schema::create('perfis', function (Blueprint $table) {
            $table->id();

            $table->string('nome', 100);
            $table->boolean('administrador')->nullable();
            $table->boolean('gestor')->nullable();        

            $table->boolean('audiencias')->nullable();        
            $table->boolean('audiencias_cad')->nullable();        
            $table->boolean('audiencias_edt')->nullable();        
            $table->boolean('audiencias_del')->nullable(); 

            $table->boolean('filiais')->nullable();        
            $table->boolean('filiais_cad')->nullable();        
            $table->boolean('filiais_edt')->nullable();        
            $table->boolean('filiais_del')->nullable();  

            $table->boolean('lancamentos')->nullable();        
            $table->boolean('lancamentos_cad')->nullable();        
            $table->boolean('lancamentos_edt')->nullable();        
            $table->boolean('lancamentos_del')->nullable();   

            $table->boolean('pessoas')->nullable();        
            $table->boolean('pessoas_cad')->nullable();        
            $table->boolean('pessoas_edt')->nullable();        
            $table->boolean('pessoas_del')->nullable();   

            $table->boolean('processos')->nullable();        
            $table->boolean('processos_cad')->nullable();        
            $table->boolean('processos_edt')->nullable();        
            $table->boolean('processos_del')->nullable();    

            $table->boolean('usuarios')->nullable();        
            $table->boolean('usuarios_cad')->nullable();        
            $table->boolean('usuarios_edt')->nullable();        
            $table->boolean('usuarios_del')->nullable();             
            
            $table->foreignId('created_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();
        });
        Schema::enableForeignKeyConstraints();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perfis');
    }
};
