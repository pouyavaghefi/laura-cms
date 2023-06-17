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
        Schema::create('menu_links', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('mel_men_id');
            $table->unsignedBigInteger('mel_parent_id')->nullable();
            $table->string('mel_label')->nullable();
            $table->string('mel_color')->nullable();
            $table->string('mel_hover_color')->nullable();
            $table->string('mel_icon')->nullable();
            $table->string('mel_url')->nullable();
            $table->tinyInteger('mel_status')->default(1);
            $table->string('mel_show_icon_only')->nullable();
            $table->timestamps();

            $table->foreign('mel_men_id')->on('menus')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menu_links');
    }
};
