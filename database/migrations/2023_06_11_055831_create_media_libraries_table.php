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
        Schema::create('media_libraries', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('med_group_base');
            $table->unsignedBigInteger('med_uploader_id');
            $table->unsignedBigInteger('med_group_images')->nullable();
            $table->string('med_path',512);
            $table->string('med_name',512);
            $table->string('med_hash_name',512);
            $table->string('med_mime_type',128);
            $table->string('med_size',128);
            $table->string('med_extension',128);
            $table->string('med_dimension',128)->nullable();
            $table->timestamp('deleted_at');
            $table->timestamps();

            $table->foreign('med_group_base')->references('id')->on('base_infos')->onDelete('CASCADE');
            $table->foreign('med_uploader_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('med_group_images')->references('id')->on('media_libraries')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('media_libraries');
    }
};
