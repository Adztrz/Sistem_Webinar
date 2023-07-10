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
        Schema::create('speakers', function (Blueprint $table) {
            //$table->integer("id_pembicara")->primary();
            $table->id();
            
            //$table->integer("event_id");
            $table->string("nama", 128);
            $table->string("asal_instansi", 64);
            $table->string("materi");
            $table->string("topik", 128);
            $table->timestamps();

        //   $table->foreign('event_id')->references('id_event')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('speakers');
    }
};
