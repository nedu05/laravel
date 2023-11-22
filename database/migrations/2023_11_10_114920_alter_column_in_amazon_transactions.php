<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AlterColumnInAmazonTransactions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('amazon_transactions', function (Blueprint $table) {
            $table->unsignedBigInteger('product_id')->after('user_id');
            $table->foreign('product_id')->on('amazon_products')->references('id')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('amazon_transactions', function (Blueprint $table) {
            //
        });
    }
}
