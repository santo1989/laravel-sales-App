<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuotationsTable extends Migration
{
   
    public function up()
    {
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->nullable();
            $table->string('address',255)->nullable();
            $table->string('phone');
            // $table->unsignedBigInteger('product_id')->Pluck('id')->toArray();
            // $table->foreign('product_id')->references('id')->on('products');
            // $table->integer('quantity');
            $table->timestamps();
        });
    }

 
    public function down()
    {
        Schema::dropIfExists('quotations');
    }
}
