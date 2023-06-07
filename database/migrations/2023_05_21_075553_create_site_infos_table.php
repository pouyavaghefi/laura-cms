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
        Schema::create('site_infos', function (Blueprint $table) {
            $table->id();
            $table->string('ste_name');
            $table->string('ste_url');
            $table->text('ste_description')->nullable();
            $table->string('ste_logo')->nullable();
            $table->string('ste_favicon')->nullable();
            $table->string('ste_email')->nullable();
            $table->string('ste_phone')->nullable();
            $table->string('ste_address')->nullable();
            $table->tinyInteger('ste_main')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('site_info');
    }
};
