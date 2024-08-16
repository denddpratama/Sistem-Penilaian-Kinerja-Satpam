<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('spenilaian', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('id_bsatpam');
            $table->date('tanggal_penilaian');
            $table->string('periode')->nullable(); 
            $table->integer('kualitas_kerja');
            $table->integer('kuantitas_kerja');
            $table->integer('profesionalisme');
            $table->integer('inisiatif');
            $table->integer('integritas');
            $table->integer('komunikasi_tim');
            $table->integer('kerja_sama_tim');
            $table->integer('etika_kerja');
            $table->integer('kedisiplinan');
            $table->integer('kehadiran');
            $table->integer('kesehatan_keselamatan');
            $table->text('keterangan')->nullable();
            $table->boolean('delstatus')->default(true);
            $table->string('nilai_s')->nullable(); // This line is sufficient
            $table->boolean('status_validasi')->default(false);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('spenilaian');
        Schema::table('spenilaians', function (Blueprint $table) {
            $table->dropColumn('status_validasi');
        });
    }
};
