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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->nullable();
            $table->unsignedBigInteger('product_id');
            $table->string('sizes')->nullable();
            $table->string('custom_design')->nullable();
            $table->string('product_title')->nullable();
            $table->decimal('unit_price', 10, 2)->nullable();
            $table->decimal('embroidery_price', 10, 2)->nullable();
            $table->decimal('total_price', 10, 2)->nullable();
            $table->decimal('decoration_price', 10, 2)->nullable();
            $table->string('custom_image')->nullable();
            $table->string('custom_side')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('orders');
    }
};
