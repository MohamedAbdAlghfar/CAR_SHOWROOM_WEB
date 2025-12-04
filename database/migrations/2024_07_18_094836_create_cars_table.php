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
        Schema::create('cars', function (Blueprint $table) { 
            $table->id();  
            $table->string('name');  
            $table->string('brand');
            $table->integer('n_of_pieces');  
            $table->string('fuel_type');
            $table->integer('buy');
            $table->integer('price'); 
            $table->integer('year');
            $table->string('country');
            $table->string('color');
            $table->string('filename');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_cars');
    }
};
