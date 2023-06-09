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
        Schema::table('events', function (Blueprint $table) {
            // Foreign Key ke Users('id_user')
            $table->foreignId('user_id')
                ->constrained(table: 'users')
                ->onDelete('cascade');
            });

        Schema::table('speaker', function (Blueprint $table) {
            // Foreign Key ke Users('event_id')
            $table->foreignId('event_id')
                ->constrained(table: 'events')
                ->onDelete('cascade');
            });

        Schema::table('registration', function (Blueprint $table) {
            // Foreign Key ke Users('id_user')
            $table->foreignId('user_id')
                ->constrained(table: 'users')
                ->onDelete('cascade');
            });
        
        Schema::table('notification', function (Blueprint $table) {
            // Foreign Key ke Users('event_id')
            $table->foreignId('event_id')
                ->constrained(table: 'events')
                ->onDelete('cascade');
            });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        
        Schema::table('events', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
        });

        Schema::table('pembicara', function (Blueprint $table) {
            $table->dropConstrainedForeignId('event_id');
        });

        Schema::table('pendaftaran', function (Blueprint $table) {
            $table->dropConstrainedForeignId('user_id');
        });

        Schema::table('notifikasi', function (Blueprint $table) {
            $table->dropConstrainedForeignId('event_id');
        });

    }
};
