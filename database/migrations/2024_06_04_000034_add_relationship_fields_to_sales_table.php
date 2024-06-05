<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddRelationshipFieldsToSalesTable extends Migration
{
    public function up()
    {
        Schema::table('sales', function (Blueprint $table) {
            $table->unsignedBigInteger('purchase_id')->nullable();
            $table->foreign('purchase_id', 'purchase_fk_9844146')->references('id')->on('purchases');
            $table->unsignedBigInteger('sold_by_id')->nullable();
            $table->foreign('sold_by_id', 'sold_by_fk_9844150')->references('id')->on('users');
        });
    }
}
