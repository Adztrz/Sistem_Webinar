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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->date("eventDate");
            $table->date("eventLocation");
            $table->string("isPaid", 16);
            $table->date("regisStartDate");
            $table->date("regisEndDate");
            $table->string("certificate", 256);
            $table->date("certificateStartDate");
            $table->string("kategoriEvent", 32);
            $table->timestamps();
        });

        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema:: dropIfExists('events');
    }
};
