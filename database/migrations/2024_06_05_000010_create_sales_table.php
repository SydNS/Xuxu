<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTable extends Migration
{
    public function up()
    {
        Schema::create('sales', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->decimal('sale_price', 15, 2);
            $table->float('total_sale_price', 15, 2)->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }
}
