<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;


class InsereDadosGenero extends Migration
{

    public function up()
    {
        DB::beginTransaction();
        try {
            DB::table('genero')->insert([
                                            [
                                                'id'     => config('constantes.genero.nao_informado.id'),
                                                'titulo' => config('constantes.genero.nao_informado.titulo')
                                            ],
                                            [
                                                'id'     => config('constantes.genero.masculino.id'),
                                                'titulo' => config('constantes.genero.masculino.titulo')
                                            ],
                                            [
                                                'id'     => config('constantes.genero.feminino.id'),
                                                'titulo' => config('constantes.genero.feminino.titulo')
                                            ]
                                        ]);
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
            DB::table('genero')->whereIn('id', [
                config('constantes.genero.nao_informado.id'),
                config('constantes.genero.masculino.id'),
                config('constantes.genero.feminino.id')
            ]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
}
