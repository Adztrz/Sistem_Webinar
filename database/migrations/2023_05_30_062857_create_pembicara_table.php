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
        Schema::create('speaker', function (Blueprint $table) {
            $table->id();  
            $table->string("namaPembicara", 256);
            $table->string("asalInstansi", 64);
            $table->string("topikMateri", 256);
            $table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pembicara');
    }
};
