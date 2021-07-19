<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaTabelaUsuario extends Migration
{
    public function up()
    {
        DB::beginTransaction();
        try {
            Schema::create('usuario', function (Blueprint $table) {
                $table->id();
                $table->string('email', 100)->unique();
                $table->timestamp('email_verified_at')->nullable();
                $table->string('password', 50)->nullable(false);
                $table->string('nome', 255)->nullable(false);
                $table->string('rua')->nullable();
                $table->string('bairro')->nullable();
                $table->string('cep')->nullable(false);
                $table->decimal('lat', 10, 8)->nullable();
                $table->decimal('long', 11, 8)->nullable();
                $table->unsignedBigInteger('genero_id')->nullable(false)->default(0);
                $table->dateTime('data_nasc')->nullable(false);
                $table->rememberToken();
                $table->timestamps();
            });
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }

    public function down()
    {
        DB::beginTransaction();
        try {
            Schema::dropIfExists('usuario');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
