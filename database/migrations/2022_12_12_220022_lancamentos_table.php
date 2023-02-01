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
        Schema::create('lancamentos', function (Blueprint $table) {
            $table->id();
           
            $table->foreignId('escritorio_id')->nullable()->constrained('escritorios')->onUpdate('cascade')->onDelete('set null');           
            $table->integer('codigo');            
            $table->decimal('valor',10,2);
            $table->decimal('valor_liquido',10,2);
            $table->decimal('valor_pago',10,2)->nullable();
            //$table->date('data');
            $table->date('data_vencimento');
            $table->date('data_pagamento')->nullable();
            $table->decimal('desconto',5,2)->nullable();
            $table->decimal('porcentagem',5,2)->nullable();
            $table->string('pagseguro_id', 50)->nullable();

            $table->integer('status')->default(1);
            $table->string('key', 100)->unique();
            
            $table->foreignId('created_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();

             $table->unique(['escritorio_id', 'codigo']); 
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
        Schema::dropIfExists('lancamentos');
    }
};
