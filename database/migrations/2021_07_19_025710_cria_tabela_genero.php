<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CriaTabelaGenero extends Migration
{
    public function up()
    {
        DB::beginTransaction();
        try {
            Schema::dropIfExists('genero');
            Schema::create('genero', function (Blueprint $table) {
                $table->id();
                $table->string('titulo', 100)->unique();
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
            Schema::dropIfExists('genero');
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
