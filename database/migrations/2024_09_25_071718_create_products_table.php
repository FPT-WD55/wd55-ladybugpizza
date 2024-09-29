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
            $table->string('slug')->unique();
            $table->string('image');
            $table->text('description');
            $table->foreignId('category_id')->constrained()->cascadeOnDelete();
            $table->bigInteger('price');
            $table->bigInteger('discount_price')->nullable();
            $table->integer('quantity');
            $table->string('sku')->unique();
            $table->tinyInteger('status')->default(1)->comment('1: active; 2: inactive');
            $table->tinyInteger('is_featured')->default(2)->comment('1: yes; 2: no');
            $table->float('avg_rating')->default(0);
            $table->integer('total_rating')->default(0);
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};