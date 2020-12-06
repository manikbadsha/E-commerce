<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAllproductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('allproducts', function (Blueprint $table) {
            $table->id();
            $table->string('category_id');
            $table->string('subcategory_id')->nullable();
            $table->string('name');
            $table->string('image');
            $table->longText('description')->nullable();
            $table->string('price')->nullable();
            $table->string('stock')->nullable();
            $table->string('slug')->nullable();
            $table->string('status')->default(1);
            $table->string('deals')->nullable();
            $table->string('featured')->nullable();
            $table->string('trending')->nullable();
            $table->string('new')->nullable();
            $table->string('top')->nullable();
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
        Schema::dropIfExists('allproducts');
    }
}
