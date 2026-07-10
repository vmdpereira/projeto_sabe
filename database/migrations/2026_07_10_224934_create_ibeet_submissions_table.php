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
        Schema::create('ibeet_submissions', function (Blueprint $table) {
            $table->id();
            $table->integer('score');
            $table->string('farol');
            $table->integer('axis_a');
            $table->integer('axis_b');
            $table->integer('axis_c');
            $table->integer('axis_d');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ibeet_submissions');
    }
};
