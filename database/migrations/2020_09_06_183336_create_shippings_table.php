<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShippingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shippings', function (Blueprint $table) {
            $table->id();
            $table->string('name')->nullable();
            $table->string('user_id')->nullable();
            $table->string('email')->nullable();
            $table->string('contact')->nullable();
            $table->string('address')->nullable();
            $table->string('devision')->nullable();
            $table->string('district')->nullable();
            $table->string('upazila')->nullable();
            $table->string('shipping_date')->nullable();
            $table->string('order_note')->nullable();
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
        Schema::dropIfExists('shippings');
    }
}
