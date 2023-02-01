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
        Schema::create('audiencias', function (Blueprint $table) {
            $table->id();

            $table->foreignId('processo_id')->nullable()->constrained('processos')->onUpdate('cascade')->onDelete('set null');
            $table->date('data');
            $table->time('hora');
            $table->integer('tipo_id');  
            $table->string('link', 200)->nullable();

            /*$table->string('rua', 100)->nullable();
            $table->string('numero', 15)->nullable();
            $table->string('bairro', 50)->nullable();
            $table->string('complemento', 150)->nullable();
            $table->foreignId('cidade_id')->nullable()->constrained('cidades')->onUpdate('cascade')->onDelete('set null');
            $table->string('cep', 10)->nullable();*/

            $table->foreignId('status_id')->nullable()->constrained('status')->onUpdate('cascade')->onDelete('set null');

            $table->text('obs')->nullable();

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
         Schema::dropIfExists('audiencias');
    }
};
