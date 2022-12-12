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
        Schema::create('processos', function (Blueprint $table) {
            $table->id();


            $table->foreignId('autor')->nullable()->constrained('pessoas')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('reu')->nullable()->constrained('pessoas')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('escritorio_id')->nullable()->constrained('escritorios')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('natureza_id')->nullable()->constrained('naturezas')->onUpdate('cascade')->onDelete('set null');
            $table->foreignId('vara_id')->nullable()->constrained('varas')->onUpdate('cascade')->onDelete('set null');
            $table->string('codigo', 50)->unique();            
            $table->decimal('valor',10,2);
            $table->date('data');

            $table->text('obs')->nullable();

            $table->integer('status')->default(1);
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
        Schema::dropIfExists('processos');
    }
};
