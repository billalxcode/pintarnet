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
        Schema::create('tenaga_pendidiks', function (Blueprint $table) {
            $table->id();
            
            $table->string('nip');
            $table->string('nama');
            $table->enum('jk', ['pria', 'wanita']);
            $table->string('alamat');
            $table->string('tempat_lahir');
            $table->date('tanggal_lahir');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tenaga_pendidiks');
    }
};
