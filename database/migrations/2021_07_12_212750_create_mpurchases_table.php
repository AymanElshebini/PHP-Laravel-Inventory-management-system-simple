<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMpurchasesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mpurchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('code');
            $table->string('date');
            $table->bigInteger('sup_id')->unsigned();
            $table->double('inv_total',8,2);
            $table->double('inv_disc',8,2);
            $table->double('total',8,2);
            $table->text('memo');
            $table->timestamps();
            $table->foreign('sup_id')->references('id')->on('suppliers')->onDelete('cascade');

        });
    }


    public function down()
    {
        Schema::dropIfExists('mpurchases');
    }
}
