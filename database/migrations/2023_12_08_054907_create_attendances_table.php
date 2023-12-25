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
        Schema::create('attendances', function (Blueprint $table) {
            $table->id();
            $table->date("tanggal_masuk");
            $table->time("jam_masuk");
            $table->date("tanggal_keluar")->nullable();
            $table->time("jam_keluar")->nullable();
            $table->string("lat-in");
            $table->string('long-in');
            $table->string("lat-out");
            $table->string('long-out');
            $table->enum("status", ['0', '1']);
            $table->foreignId('user_id');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('attendances');
    }
};
