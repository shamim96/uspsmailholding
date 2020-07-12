<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddColumnsToOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('orders', function (Blueprint $table) {
            $table->string('txId')->nullable();
            $table->string('paymentType')->nullable();
            $table->string('paymentBrand')->nullable();
            $table->string('amount')->nullable();
            $table->string('currency')->nullable();
            $table->string('descriptor')->nullable();
            $table->string('resultCode')->nullable();
            $table->string('resultDescription')->nullable();
            $table->string('orderId')->nullable();
            $table->string('termId')->nullable();
            $table->string('cardLast4Digits')->nullable();
            $table->string('cardHolder')->nullable();
            $table->string('customerIp')->nullable();
            $table->string('customerIpCountry')->nullable();
            $table->string('ndc')->nullable();
            $table->string('confirmation1')->nullable();
            $table->string('confirmation2')->nullable();
            $table->string("txId2")->nullable();
            $table->tinyInteger('updated')->default(1);
            $table->tinyInteger('cancelled')->default(1);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('orders', function (Blueprint $table) {
            //
        });
    }
}
