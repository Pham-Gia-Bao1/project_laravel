<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up()
    {
        // run "php artisan migrate" to create table
        Schema::create('coffe', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('size');
            $table->string('weight');
            $table->decimal('price', 8, 2);
            $table->json('images')->nullable(); // Thêm cột để lưu trữ đường dẫn ảnh
            $table->string('reviews');
            $table->string('rating');
            $table->string('quantity');
            $table->unsignedBigInteger('coffe_shop_id');
            // Thêm các trường khác nếu cần thiết
<<<<<<< HEAD
            $table->string('category'); // Thêm trường category
=======
            $table->unsignedBigInteger('category_id'); // Thêm trường category
>>>>>>> e5f8557848bde9a163d193e8a4de66a7bc039951
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('coffe');
    }
};

