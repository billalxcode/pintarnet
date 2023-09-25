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
            $table->string('keterangan');
            $table->enum('status', ['request', 'allowed', 'notAllowed', 'progress', 'alreadyBack']);

            $table->dateTime('exit_at');
            $table->dateTime('entry_at');
            $table->dateTime('return_at');

            $table->foreign('siswa_id')->references('id')->on('siswas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('guru_id')->references('id')->on('tenaga_pendidiks')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('guru_piket_id')->references('id')->on('tenaga_kependidikans')->onUpdate('cascade')->onDelete('cascade');

            $table->index('siswa_id');
            $table->index('guru_id');
            $table->index('guru_piket_id');
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
