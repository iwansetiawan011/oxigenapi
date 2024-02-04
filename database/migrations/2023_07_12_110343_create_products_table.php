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
            $table->string('product_name', 99)->unique();
            $table->string('product_slug', 99)->unique();
            $table->foreignId('category_id');
            $table->integer('quantity');
            $table->integer('stock');
            $table->double('price');
            $table->text('description');
            $table->text('thumbnail');
            $table->char('status', 3)->default('no');
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
