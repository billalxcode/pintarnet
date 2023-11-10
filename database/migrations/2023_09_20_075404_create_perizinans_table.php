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
        Schema::create('perizinans', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('siswa_id');
            $table->unsignedBigInteger('guru_id');
            $table->unsignedBigInteger('guru_piket_id');
            $table->unsignedBigInteger('ruangan_id');
            $table->string('keterangan')->nullable();
            $table->enum('status', ['meminta', 'diizinkan', 'ditolak', 'selesai'])->default('meminta');
            $table->enum('jenis', ['masuk', 'keluar'])->default('keluar');

            $table->dateTime('exit_at')->nullable();
            $table->dateTime('entry_at')->nullable();
            $table->dateTime('return_at')->nullable();

            $table->foreign('siswa_id')->references('id')->on('siswas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('guru_id')->references('id')->on('tenaga_pendidiks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('guru_piket_id')->references('id')->on('tenaga_kependidikans')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ruangan_id')->references('id')->on('ruangans')->onUpdate('cascade')->onDelete('cascade');

            $table->index('siswa_id');
            $table->index('guru_id');
            $table->index('guru_piket_id');
            $table->index('ruangan_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('perizinans', function (Blueprint $table) {
            $table->dropConstrainedForeignId('siswa_id');
            $table->dropConstrainedForeignId('guru_id');
            $table->dropConstrainedForeignId('guru_piket_id');
        });
        Schema::dropIfExists('perizinans');
    }
};
