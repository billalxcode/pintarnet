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
        Schema::table('tenaga_pendidiks', function (Blueprint $table) {
            $table->unsignedBigInteger('mapel_id')->nullable();

            $table->foreign('mapel_id')->references('id')->on('mata_pelajarans')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('tenaga_pendidiks', function (Blueprint $table) {
            $table->dropConstrainedForeignId('mapel_id');
        });
    }
};
