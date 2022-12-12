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
        Schema::create('varas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('comarca_id')->nullable()->constrained('comarcas')->onUpdate('cascade')->onDelete('set null');
            $table->string('nome', 100);
            $table->string('email', 100)->nullable();
            $table->string('telefone1', 12)->nullable();
            $table->string('telefone2', 12)->nullable();
            
             $table->string('rua', 100)->nullable();
            $table->string('numero', 15)->nullable();
            $table->string('bairro', 50)->nullable();
            $table->string('complemento', 150)->nullable();
            $table->foreignId('cidade_id')->nullable()->constrained('cidades')->onUpdate('cascade')->onDelete('set null');
            $table->string('cep', 10)->nullable();

            $table->string('key', 100)->unique();
            
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
        Schema::dropIfExists('varas');
    }
};
