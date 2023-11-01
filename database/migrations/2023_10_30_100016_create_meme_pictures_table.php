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
        Schema::create('meme_pictures', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('uploader_id');
            $table->string('title');
            $table->string('slug');
            $table->string('type');
            $table->string('size');
            $table->text('description')->nullable();
            $table->string('path');
            $table->unsignedBigInteger('category_id');
            $table->integer('views')->default(0);
            $table->integer('likes')->default(0);
            $table->integer('downloads')->default(0);
            $table->integer('reported')->default(0);
            $table->integer('shared')->default(0);
            $table->boolean('featured')->default(false);
            $table->unsignedBigInteger('modified_by')->nullable();
            $table->boolean('is_private')->default(false);
            $table->boolean('is_draft')->default(false);
            $table->boolean('is_verified')->default(false);
            $table->text('related_memes')->nullable();
            $table->string('original_source')->nullable();
            $table->text('external_data')->nullable();
            $table->string('resolution')->nullable();
            $table->text('watermark')->nullable();
            $table->timestamp('scheduled_publish')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();


            $table->foreign('uploader_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('meme_categories')->onDelete('cascade');
            $table->foreign('modified_by')->references('id')->on('users')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('meme_pictures');
    }
};
