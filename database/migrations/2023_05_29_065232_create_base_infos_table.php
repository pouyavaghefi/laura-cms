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
        Schema::create('base_infos', function (Blueprint $table) {
            $table->id();
            $table->string('bas_type');
            $table->string('bas_value');
            $table->unsignedBigInteger('bas_parent_id')->nullable();
            $table->unsignedBigInteger('bas_grand_parent_id')->nullable();
            $table->tinyInteger('bas_can_user_add')->default(0);
            $table->string('bas_extra_value',200)->nullable();

            $table->foreign('bas_parent_id')->on('base_infos')->references('id')->onDelete('CASCADE');
            $table->foreign('bas_grand_parent_id')->on('base_infos')->references('id')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('base_infos');
    }
};
