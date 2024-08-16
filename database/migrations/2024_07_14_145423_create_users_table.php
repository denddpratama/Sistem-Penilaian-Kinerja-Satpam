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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('nrp_admin');
            $table->string('nama');
            $table->unsignedBigInteger('id_jabatan');

            // Definisi foreign keys
            $table->foreign('id_jabatan')->references('id')->on('jabatan')->onDelete('cascade');

            $table->string('level', 25);
            $table->string('email')->unique();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Menghapus foreign keys
            $table->dropForeign(['id_jabatan']);
        });

        Schema::dropIfExists('users');
    }

};