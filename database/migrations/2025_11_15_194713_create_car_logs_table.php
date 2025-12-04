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
        Schema::create('car_logs', function (Blueprint $table) {
            $table->id();
            $table->string('car_name');   // Which car
            $table->string('user_name');  // Which admin/user performed action
            $table->string('action');               // e.g., 'created', 'updated', 'deleted', 'sold'
            $table->text('details')->nullable();    // Optional: store extra info
            $table->timestamps();  

    
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('car_logs');
    }
};
