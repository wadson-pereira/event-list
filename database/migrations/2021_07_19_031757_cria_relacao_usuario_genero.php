<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CriaRelacaoUsuarioGenero extends Migration
{

    public function up()
    {
        DB::beginTransaction();
        try {
            Schema::table('usuario', function (Blueprint $table) {
                $table->foreign('genero_id')->references('id')->on('genero');
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
            Schema::table('usuario', function (Blueprint $table) {
                $table->dropForeign(['genero_id']);
            });
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
