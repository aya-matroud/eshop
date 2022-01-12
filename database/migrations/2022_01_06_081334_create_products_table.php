<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('cate_id');
            $table->string('name')->nullable();
            $table->string('slug');
            $table->mediumText('small_description')->nullable();
            $table->longText('description')->nullable();
            $table->string('original_price')->nullable();
            $table->string('selling_price')->nullable();
            $table->string('image')->nullable();
            $table->string('qty')->nullable();
            $table->string('tax')->nullable();
            $table->tinyInteger('status')->default('0');
            $table->tinyInteger('trending')->default('0');
            $table->mediumText('meta_title')->nullable();
            $table->mediumText('meta_keywords')->nullable();
            $table->mediumText('meta_description')->nullable();
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
        Schema::dropIfExists('products');
    }
}
