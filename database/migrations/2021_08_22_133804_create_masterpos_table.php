<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMasterposTable extends Migration
{

    public function up()
    {
        Schema::create('masterpos', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('date');
            $table->bigInteger('cust_id')->unsigned();
            $table->bigInteger('orderstatsid')->unsigned();
            $table->double('inv_total',8,2);
            $table->double('shiping_cost',8,2);
            $table->double('inv_disc',8,2);
            $table->double('total',8,2);
            $table->text('memo');
            $table->timestamps();
            $table->foreign('cust_id')->references('id')->on('customers')->onDelete('cascade');
          //  $table->foreign('orderstatsid')->references('id')->on('orderstats')->onDelete('cascade');
        });
    }


    public function down()
    {
        Schema::dropIfExists('masterpos');
    }
}
