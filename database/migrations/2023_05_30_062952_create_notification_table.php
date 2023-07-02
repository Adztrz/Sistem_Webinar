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
        Schema::create('notifications', function (Blueprint $table) {
           // $table->integer("id_notifikasi")->primary();
            $table->id();

           // $table->integer('event_id');
           //$table->string('namaEvent', 256);
            $table->date('tanggal');
            $table->string('topikMateri', 256);
            $table->string('sertifikat', 256);
            $table->timestamps();

      //     $table->foreign('event_id')->references('id_event')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
    }
};
