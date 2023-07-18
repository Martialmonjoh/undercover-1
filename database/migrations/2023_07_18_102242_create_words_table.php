<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('words', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('word1');
            $table->string('word2');
            $table->unsignedInteger('state')->default(0);

            // $table->unsignedBigInteger('user_id');
            // $table->foreign('user_id')->refereces('id')->on('users');

            $table->foreignId('user_id')->nullable()->constrained();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('words');
    }
};
