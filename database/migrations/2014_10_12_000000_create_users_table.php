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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('usr_name');
            $table->tinyInteger('usr_is_active')->default(0);
            $table->tinyInteger('usr_is_super')->default(0);
            $table->tinyInteger('usr_is_admin')->default(0);
            $table->string('usr_email')->nullable()->unique();
            $table->timestamp('usr_email_verified_at')->nullable();
            $table->string('usr_avatar')->nullable();
            $table->string('usr_password')->nullable();
            $table->rememberToken();
            $table->timestamp('usr_last_login_at')->nullable();
            $table->unsignedBigInteger('usr_creator_id')->nullable();
            $table->unsignedBigInteger('usr_editor_id')->nullable();
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('usr_creator_id')->on('users')->references('id')->onDelete('cascade');
            $table->foreign('usr_editor_id')->on('users')->references('id')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};
