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
            $table->string('no_referensi', 199)->unique();
            $table->string('name', 255);
            $table->string('email', 255);
            $table->string('address', 355);
            $table->string('city', 199);
            $table->string('province', 199);
            $table->string('postcode', 99);
            $table->string('phone', 20);
            $table->double('total_price');
            $table->enum('status', ['pending', 'success', 'failed'])->default('pending');
            $table->text('snap_token');
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
