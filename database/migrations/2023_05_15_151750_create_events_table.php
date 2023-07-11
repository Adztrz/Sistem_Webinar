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
            //$table->integer("id_event")->primary();
            $table->id();

            $table->string("nama", 256);
            $table->date("tanggal");
            $table->string("poster");
            $table->string("link");
            $table->string("lokasi");
            $table->string("isPaid", 16)->default('0');
            $table->string("harga")->nullable();
            $table->string("pembicara");
            $table->string("instansi");
            $table->date("regawal");
            $table->date("regakhir");
            $table->string("sertifikat", 256);
            $table->date("tanggalsertif");
            $table->string("kategoriEvent", 32);
            $table->string("topik");
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
