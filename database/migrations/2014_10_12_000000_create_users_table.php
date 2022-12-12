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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nome', 100);
            $table->string('email', 100)->nullable();
            $table->string('cpf', 15)->unique();
            $table->string('telefone1', 12)->nullable();
            $table->string('telefone2', 12)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password', 100);
            $table->foreignId('escritorio_id')->nullable()->constrained('escritorios')->onUpdate('cascade')->onDelete('set null');             
            $table->foreignId('perfil_id')->nullable()->constrained('perfis')->onUpdate('cascade')->onDelete('set null');
            $table->rememberToken();

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
        Schema::dropIfExists('users');
    }
};
