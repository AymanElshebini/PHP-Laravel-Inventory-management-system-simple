<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateExpensesTable extends Migration
{

    public function up()
    {
        Schema::create('expenses', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('date');
            $table->string('name');
            $table->double('amount');
            $table->timestamps();
        });
    }


    public function down()
    {
        Schema::dropIfExists('expenses');
    }
}
