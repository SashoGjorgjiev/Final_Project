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
        Schema::table('brands', function (Blueprint $table) {
            $table->unsignedBigInteger('tag_id')->nullable();
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('tag_id')->references('id')->on('tags')->onDelete('set null');
            $table->foreign('category_id')->references('id')->on('category')->onDelete('set null');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('brands', function (Blueprint $table) {
            //
        });
    }
};
