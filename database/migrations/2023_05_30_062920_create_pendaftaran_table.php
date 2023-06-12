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
        Schema::create('registration', function (Blueprint $table) {
            $table->id();
            $table->integer('noIdentitas');
            $table->string('noTelp', 16);
            $table->string('asalInstansi', 64);
            $table->string('isPaid', 16);
            $table->string('paymentProof', 64);
            $table->timestamps();
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pendaftaran');
    }
};
