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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')
            ->references('id')
            ->on('cities')
            ->onDelete('SET NULL');
            $table->string('name');
            $table->string('age')->nullable();
            $table->string('email')->unique();
            $table->string('phone');
            $table->string('password');
            $table->text('address')->nullable();;
            $table->integer('role')->default('0');
            $table->string('class_name')->nullable();;
            $table->string('sport')->nullable();;
            $table->string('min_age')->nullable();;
            $table->string('max_age')->nullable();;
            $table->string('schedule')->nullable();;
            $table->string('start_time')->nullable();;
            $table->string('count_hour')->nullable();;
            $table->string('cost')->nullable();;
            $table->string('discount_code')->nullable();;
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
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
        Schema::dropIfExists('users');
    }
};
