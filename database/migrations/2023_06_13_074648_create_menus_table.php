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
        Schema::create('menus', function (Blueprint $table) {
            $table->id();
            $table->string('men_name');
            $table->string('men_description');
            $table->unsignedBigInteger('men_creator_id');
            $table->unsignedBigInteger('men_position')->nullable();
            $table->timestamps();

            $table->foreign('men_creator_id')->on('users')->references('id')->onDelete('CASCADE');
            $table->foreign('men_position')->on('base_infos')->references('id')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('menus');
    }
};
