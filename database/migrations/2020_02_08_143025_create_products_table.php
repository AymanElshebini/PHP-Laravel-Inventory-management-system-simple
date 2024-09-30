<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateProductsTable extends Migration
{

    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->bigInteger('category_id')->unsigned();
            $table->string('name');
            $table->bigInteger('unit_id')->unsigned();
            $table->bigInteger('zone_id')->unsigned();
            $table->integer('zone_qty')->unsigned();
            $table->string('size');
            $table->string('color');
            $table->double('sellprice');
            $table->double('purchaseprice');
            $table->integer('orderlimit');
            $table->text('fullDesc');
            $table->text('imgpath');
            $table->timestamps();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('cascade');
            $table->foreign('zone_id')->references('id')->on('zones')->onDelete('cascade');
          //  $table->foreign('unit_id')->references('id')->on('units')->onDelete('cascade');


        });
    }


    public function down()
    {
        Schema::dropIfExists('products');
    }
}
