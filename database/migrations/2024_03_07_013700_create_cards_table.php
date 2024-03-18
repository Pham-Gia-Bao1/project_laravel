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
        Schema::create('cards', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id'); // Thêm trường user_id
            $table->foreign('user_id')->references('id')->on('users'); // Thêm khóa ngoại
            $table->string('first_name');
            $table->string('last_name');
            $table->string('card_number', 16);
            $table->date('expiration_date');
            $table->string('cvv', 3);
            $table->string('phone_number')->default('');
            $table->boolean('set_default_card')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cards');
    }
};
