<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToPurchasesTable extends Migration
{
    public function up()
    {
        Schema::table('purchases', function (Blueprint $table) {
            $table->unsignedBigInteger('product_purchased_id')->nullable();
            $table->foreign('product_purchased_id', 'product_purchased_fk_9843962')->references('id')->on('products');
        });
    }
}
