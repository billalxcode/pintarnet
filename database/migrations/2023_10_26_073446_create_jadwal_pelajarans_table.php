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
        Schema::create('jadwal_pelajarans', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mapel_id');
            $table->unsignedBigInteger('ruangan_id');
            $table->unsignedBigInteger('pendidik_id');
            $table->time('start_at');
            $table->time('end_at');
            $table->timestamps();

            $table->foreign('mapel_id')->references('id')->on('mata_pelajarans')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign('ruangan_id')->references('id')->on('ruangans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('pendidik_id')->references('id')->on('tenaga_pendidiks')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jadwal_pelajarans');
    }
};
