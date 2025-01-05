<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        Schema::table('anotacoes', function (Blueprint $table) {
            $table->string('title'); // Adiciona a coluna 'title'
        });
    }
    
    public function down()
    {
        Schema::table('anotacoes', function (Blueprint $table) {
            $table->dropColumn('title'); // Remove a coluna 'title' caso seja necessário reverter a migração
        });
    }
};
