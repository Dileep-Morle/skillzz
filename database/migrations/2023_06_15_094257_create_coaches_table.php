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
        Schema::create('coaches', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('city_id')->nullable();
            $table->foreign('city_id')
                ->references('id')
                ->on('cities')
                ->onDelete('SET NULL');
            $table->string('name');
            $table->string('age');
            $table->text('address');
            $table->string('phone');
            $table->string('class_name');
            $table->string('sport');
            $table->string('min_age');
            $table->string('max_age');
            $table->string('schedule');
            $table->string('start_time');
            $table->string('count_hour');
            $table->string('cost');
            $table->string('discount_code');
            $table->tinyInteger('status')->default(0);
            $table->timestamp('deleted_at')->nullable();
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
        Schema::dropIfExists('coaches');
    }
};
