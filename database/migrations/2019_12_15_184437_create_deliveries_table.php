<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDeliveriesTable extends Migration
{

    public function up()
    {
        Schema::create('deliveries', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name');
            $table->string('tel1');
            $table->string('tel2');
            $table->text('memo');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('deliveries');
    }
}
