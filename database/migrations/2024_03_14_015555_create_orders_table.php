<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Add user_id field
            $table->unsignedBigInteger('product_id'); // Add product_id field
            $table->decimal('total_amount', 10, 2); // Add total_amount field as decimal (10 digits in total, 2 after decimal point)
            $table->string('status'); // Add status field
            $table->dateTime('order_date'); // Add order_date field as dateTime
            $table->timestamps();
            // Add foreign key constraints
            // $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            // $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }


    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
