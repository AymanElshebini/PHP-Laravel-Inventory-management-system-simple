<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDetailsposTable extends Migration
{

    public function up()
    {
        Schema::create('detailspos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('masterpos_id')->unsigned();
            $table->bigInteger('product_id')->unsigned();
            $table->bigInteger('quantity');
            $table->double('sellPrice',8,2);
            $table->bigInteger('discount');
            $table->double('totalPrice',8,2);
            $table->timestamps();
            $table->foreign('masterpos_id')->references('id')->on('masterpos')->onDelete('cascade');
            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
        });
    }

      public function down()
    {
        Schema::dropIfExists('detailspos');
    }
}
