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
        Schema::create('favorites', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Thêm trường user_id
            $table->unsignedBigInteger('product_id'); // Thêm trường user_id
            // Thêm các trường khác nếu cần thiết
            $table->timestamps();
            // // Tạo mối quan hệ giữa 2 bảng
            // $table->foreign('user_id')->references('id')->on('users');
            // $table->foreign('product_id')->references('id')->on('coffe');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('favorites');
    }
};
