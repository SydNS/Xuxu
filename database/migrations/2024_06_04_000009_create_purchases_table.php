<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePurchasesTable extends Migration
{
    public function up()
    {
        Schema::create('purchases', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('price', 15, 2);
            $table->integer('quantity')->nullable();
            $table->decimal('total_cost', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
