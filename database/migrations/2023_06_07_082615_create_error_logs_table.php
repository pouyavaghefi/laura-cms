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
        Schema::create('error_logs', function (Blueprint $table) {
            $table->id();
            $table->text('err_message');
            $table->text('err_stack_trace');
            $table->string('err_page');
            $table->string('err_method');
            $table->unsignedBigInteger('err_creator_id');
            $table->string('err_ip_address')->nullable();
            $table->string('err_user_agent')->nullable();
            $table->json('err_additional_data')->nullable();
            $table->timestamps();

            $table->foreign('err_creator_id')->on('users')->references('id')->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('error_logs');
    }
};
