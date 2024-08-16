<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    

    public function up()
    {
        Schema::create('ssperingatan', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_bsatpam');
            $table->string('periode')->nullable(); // Tambahkan kolom periode
            $table->integer('sp');
            $table->string('lampiran_surat')->nullable();
            $table->integer('konversi')->default(0);
            $table->boolean('delstatus')->default(true);
            $table->timestamps();

            $table->foreign('id_bsatpam')->references('id')->on('bsatpam')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('ssperingatan');
    }
};
