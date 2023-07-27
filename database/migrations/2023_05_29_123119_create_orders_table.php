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
            $table->string('orderid');
            $table->string('order_date')->nullable();
            $table->string('ordered_items');
            $table->integer('total');
            $table->string('customer_name');
            $table->string('customer_email');
            $table->string('customer_phone');
            $table->string('customer_address');
            $table->string('payment_type');
            $table->string('shipping_fee');
            $table->string('receipt_copy');
            $table->string('order_status');
            $table->string('order_delivery');
            $table->integer('processed')->default(0);
            $table->integer('shipped')->default(0);
            $table->integer('enroute')->default(0);
            $table->integer('arrived')->default(0);
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
