<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AdicionarCamposUsuario extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users',function(Blueprint $table){

            $table->string('apellidos',50)->after('name');
            $table->string('celular',50)->nullable()->after('password');
            $table->string('tipo_documento',50)->nullable()->after('celular');
            $table->string('documento',50)->nullable()->after('tipo_documento');
            $table->string('direccion',50)->nullable()->after('documento');
            $table->string('score',50)->nullable()->after('direccion');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users',function(Blueprint $table){


            $table->dropColumn('apellidos');
            $table->dropColumn('celular');
            $table->dropColumn('tipo_documento');
            $table->dropColumn('documento');
            $table->dropColumn('direccion');
            $table->dropColumn('score');

        });
    }
}
