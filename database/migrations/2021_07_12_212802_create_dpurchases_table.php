<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDpurchasesTable extends Migration
{

    public function up()
    {
        Schema::create('dpurchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('mpurchases_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('quantity');
            $table->double('prochePrice',8,2);
            $table->bigInteger('discount');
            $table->double('totalPrice',8,2);
            $table->timestamps();
            $table->foreign('mpurchases_id')->references('id')->on('mpurchases')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
           });
    }


    public function down()
    {
        Schema::dropIfExists('dpurchases');
    }
}
