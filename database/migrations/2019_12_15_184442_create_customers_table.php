<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCustomersTable extends Migration
{



    public function up()
    {
        Schema::create('customers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('name');
            $table->bigInteger('city_id')->unsigned();
            $table->string('tel1');
            $table->string('tel2');
            $table->text('address');
            $table->text('memo')->nullable();
            $table->timestamps();


            $table->foreign('city_id')->references('id')->on('cities')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('customers');
    }
}
