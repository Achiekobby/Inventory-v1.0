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
            $table->uuid('id')->primary();
            $table->foreignUuid('category_id');
            $table->foreign('category_id')->references('id')->on('categories')->cascadeOnDelete();
            $table->foreignUuid('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->cascadeOnDelete();
            $table->string('brand');
            $table->string('SKU');
            $table->string('name');
            $table->longText('desc')->nullable();
            $table->string('slug');
            $table->string('code');
            $table->string('image');
            $table->unsignedBigInteger('quantity');
            $table->string('unit_price');
            $table->string('total_price')->nullable();
            $table->string('status')->default('active');
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
