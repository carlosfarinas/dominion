<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsPersonnelTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products_personnel', function (Blueprint $table) {
            $table->increments('product_personnel_id');
            $table->unsignedBigInteger('personnel_id')->unsigned();
            $table->unsignedBigInteger('product_id')->unsigned();
            $table->foreign('personnel_id')
                ->references('personnel_id')
                ->on('personnel')->onDelete('cascade');
            $table->foreign('product_id')
                ->references('product_id')
                ->on('products')->onDelete('cascade');
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
        Schema::dropIfExists('products_personnel');
    }
}
