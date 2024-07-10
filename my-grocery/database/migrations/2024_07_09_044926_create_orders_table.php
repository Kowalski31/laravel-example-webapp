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
            $table->timestamps();
            
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade');

            $table->enum('payment_type', ['CASH', 'TRANSFER']);
            $table->enum('status', ['PENDING', 'APPROVED', 'REJECTED']);
            $table->string('address')->nullable();
            $table->string('phone')->nullable();
            $table->integer('total_price');
            $table->timestamp('delivery_date')->nullable();
            $table->string('receiver_name');
            $table->string('ship_money');

            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('bank_accounts')->onUpdate('cascade');
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
