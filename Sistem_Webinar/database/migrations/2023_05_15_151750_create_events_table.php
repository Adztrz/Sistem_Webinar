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
            $table->integer("id_event")->primary();
            $table->integer("user_id");
            $table->date("eventDate");
            $table->date("eventLocation");
            $table->string("isPaid", 16);
            $table->date("regisStartDate");
            $table->date("regisEndDate");
            $table->string("certificate", 256);
            $table->date("certificateStartDate");
            $table->string("kategoriEvent", 32);
            $table->timestamps();

            $table->foreign("user_id")->references("id_user")->on("users")->onDelete("cascade");
        });

        Schema::create('pembicara', function (Blueprint $table) {
            $table->integer("id_pembicara")->primary();
            $table->integer("event_id");
            $table->string("namaPembicara", 256);
            $table->string("asalInstansi", 64);
            $table->string("topikMateri", 256);
            $table->timestamps();

           $table->foreign('event_id')->references('id_event')->on('events')->onDelete('cascade');
        });

        Schema::create('pendaftaran', function (Blueprint $table) {
            $table->integer("id_pendaftaran")->primary();
            $table->integer("user_id");
            $table->integer('noIdentitas');
            $table->string('noTelp', 16);
            $table->string('asalInstansi', 64);
            $table->string('isPaid', 16);
            $table->string('paymentProof', 64);
            $table->timestamps();

           $table->foreign('user_id')->references('id_user')->on('users')->onDelete('cascade');
        });

        Schema::create('notifikasi', function (Blueprint $table) {
            $table->integer("id_notifikasi")->primary();
            $table->integer('event_id');
            $table->string('namaEvent', 256);
            $table->date('tanggal');
            $table->string('topikMateri', 256);
            $table->string('sertifikat', 256);
            $table->timestamps();

           $table->foreign('event_id')->references('id_event')->on('events')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('notifikasi');
        Schema::dropIfExists('pendaftaran');
        Schema::dropIfExists('pembicara');
        Schema::dropIfExists('events');
    }
};
