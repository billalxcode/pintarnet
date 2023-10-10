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
        Schema::create('kehadirans', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('siswa_id');
            $table->enum('status', ['hadir', 'izin', 'sakit', 'alpha', 'bolos'])->default('hadir');
            $table->unsignedBigInteger('ruangan_id');
            $table->string('keterangan')->nullable();

            $table->foreign('siswa_id')->references('id')->on('siswas')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('ruangan_id')->references('id')->on('ruangans')->onUpdate('cascade')->onDelete('cascade');
            $table->text('image_path')->nullable();

            $table->index('siswa_id');
            $table->index('ruangan_id');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('kehadirans', function (Blueprint $table) {
            $table->dropConstrainedForeignId('siswa_id');
            $table->dropConstrainedForeignId('ruangan_id');
        });
        Schema::dropIfExists('kehadirans');
    }
};
