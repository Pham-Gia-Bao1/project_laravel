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
        Schema::create('shopping_cart', function (Blueprint $table) {
            $table->id(); // Tạo trường ID tự động tăng
            $table->unsignedBigInteger('user_id'); // Thêm trường user_id
            $table->unsignedBigInteger('product_id'); // Thêm trường product_id
            $table->decimal('total', 10, 2); // Thêm trường total, kiểu dữ liệu là số thập phân với 2 chữ số sau dấu phẩy, ví dụ: 1234.56
            $table->integer('quantity'); // Thêm trường quantity, kiểu dữ liệu là số nguyên
            $table->timestamp('added_at')->useCurrent(); // Thêm trường added_at và tự động điền thời gian hiện tại
            $table->timestamps(); // Thêm trường created_at và updated_at tự động điền thời gian khi tạo và cập nhật dữ liệu
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shopping_cart');
    }
};
