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
        Schema::create('meme_comments', function (Blueprint $table) {
            $table->unsignedBigInteger('meme_id');
            $table->string('comment');

            $table->foreign('meme_id')->on('meme_pictures')->references('id')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meme_comments');
    }
};
