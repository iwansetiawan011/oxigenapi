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
        Schema::create('order_temps', function (Blueprint $table) {
            $table->id();
            $table->string('user_unique');
            $table->foreignId('product_id');
            $table->integer('quantity');
            $table->double('sub_price');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('order_temps');
    }
};
