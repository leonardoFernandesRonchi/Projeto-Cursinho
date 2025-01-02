<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('study_plans', function (Blueprint $table) {
            $table->date('date')->nullable()->change(); // Permite valores nulos para o campo 'date'
        });
    }
    
    public function down(): void
    {
        Schema::table('study_plans', function (Blueprint $table) {
            $table->date('date')->nullable(false)->change(); // Reverte para não permitir nulos
        });
    }
    
};
