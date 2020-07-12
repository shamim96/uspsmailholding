<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAddressAPISTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('address_a_p_i_s', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('api')->nullable();
            $table->smallInteger('uses')->default(0);
            $table->tinyInteger('status')->default(2);
            $table->date('endDate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('address_a_p_i_s');
    }
}
