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
        Schema::create('addresses', function (Blueprint $table) {
            $table->uuid('id');
            $table->foreignUuid('supplier_id');
            $table->foreign('supplier_id')->references('id')->on('suppliers')->cascadeOnDelete();
            $table->string('country');
            $table->string('country_code')->default('GH');
            $table->string('region');
            $table->string('city');
            $table->string('street');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('addresses');
    }
};
