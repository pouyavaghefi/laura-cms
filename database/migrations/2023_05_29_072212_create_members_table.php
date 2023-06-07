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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('mbr_fname')->nullable();
            $table->string('mbr_lname')->nullable();
            $table->string('mbr_en_fname')->nullable();
            $table->string('mbr_en_lname')->nullable();
            $table->string('mbr_nick_name')->nullable();
            $table->string('mbr_father_name')->nullable();
            $table->unsignedBigInteger('mbr_usr_id')->nullable();
            $table->unsignedBigInteger('mbr_type_id')->nullable();
            $table->unsignedBigInteger('mbr_cnt_id')->nullable();
            $table->unsignedBigInteger('mbr_prv_id')->nullable();
            $table->unsignedBigInteger('mbr_cit_id')->nullable();
            $table->unsignedBigInteger('mbr_gender_id')->nullable();
            $table->string('mbr_national_code')->nullable();
            $table->string('mbr_birthday')->nullable();
            $table->string('mbr_phone')->nullable();
            $table->string('mbr_mobile')->nullable();
            $table->string('mbr_email')->nullable();
            $table->string('mbr_secondary_email')->nullable();
            $table->string('mbr_postal_code')->nullable();
            $table->string('mbr_address')->nullable();
            $table->string('mbr_referer_code')->nullable();
            $table->string('mbr_personal_code')->nullable();
            $table->string('mbr_current_age')->nullable();
            $table->tinyInteger('mbr_status')->default(1)->comment('1 = member, 0 = not member');
            $table->timestamp('deleted_at')->nullable();
            $table->timestamps();

            $table->foreign('mbr_usr_id')->references('id')->on('users')->onDelete('CASCADE');
            $table->foreign('mbr_cnt_id')->references('id')->on('countries')->onDelete('CASCADE');
            $table->foreign('mbr_prv_id')->references('id')->on('provinces')->onDelete('CASCADE');
            $table->foreign('mbr_cit_id')->references('id')->on('cities')->onDelete('CASCADE');
            $table->foreign('mbr_gender_id')->references('id')->on('base_infos')->onDelete('CASCADE');
            $table->foreign('mbr_type_id')->references('id')->on('base_infos')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
