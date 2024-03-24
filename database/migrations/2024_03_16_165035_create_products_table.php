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
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('description');
            $table->float('price');
            $table->string('image');
            $table->integer('quantity');
            $table->enum('status', ['active', 'archived'])->default('active');
            $table->string('color');
            $table->string('size');
            $table->string('advise_for_size');
            $table->string('guidelines_for_maintenance');
            $table->foreignId('user_id')->constrained();
            $table->foreignId('category_id')->constrained()->references('id')->on('category');
            $table->foreignId('brand_id')->constrained();
            $table->foreignId('tags_id')->constrained();
            $table->foreignId('discount_id')->nullable()->constrained();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('product');
    }
};
