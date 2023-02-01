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
        Schema::create('audiencias_pessoas', function (Blueprint $table) {
            $table->id();
           
            $table->foreignId('audiencia_id')->nullable()->constrained('audiencias')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('pessoa_id')->nullable()->constrained('pessoas')->onUpdate('cascade')->onDelete('set null');

            $table->foreignId('created_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('updated_by')->nullable()->constrained('users')->onUpdate('cascade')->onDelete('set null');
            $table->timestamps();

            $table->unique(['audiencia_id', 'pessoa_id']); 
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
        Schema::dropIfExists('processos_pessoas');
    }
};
