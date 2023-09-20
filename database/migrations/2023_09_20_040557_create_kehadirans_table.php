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
            $table->enum('status', ['hadir', 'izin', 'sakit', 'alpha'])->default('alpha');
            $table->unsignedBigInteger('entered_by');
            $table->string('keterangan');
            
            $table->foreign('siswa_id')->references('id')->on('siswas');
            $table->foreign('entered_by')->references('id')->on('siswas');

            $table->index('siswa_id');
            $table->index('entered_by');

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
            $table->dropConstrainedForeignId('entered_by');
        });
        Schema::dropIfExists('kehadirans');
    }
};
