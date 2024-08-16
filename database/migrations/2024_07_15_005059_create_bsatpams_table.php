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
        Schema::create('bsatpam', function (Blueprint $table) {
            $table->id();
            $table->string('avatar')->nullable();
            $table->string('nrp_satpam');
            $table->string('nama');
            $table->string('nip');
            $table->string('ttl');
            $table->bigInteger('id_jabatan');
            $table->string('grade');
            $table->bigInteger('id_lokasi');
            $table->string('departemen');
            $table->string('status_kontrak');
            $table->string('jenis_kelamin');
            $table->string('pendidikan');
            $table->string('martial_status');
            $table->string('alamat_tinggal');
            $table->string('no_telp');
            $table->boolean('delstatus')->default(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('bsatpam');
    }
};
