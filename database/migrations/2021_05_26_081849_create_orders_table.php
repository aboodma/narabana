<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *  Order Status will be assigend to intgere number
     *  0 pending
     *  1 id paid
     *  2 approved
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('user_id'); // Customer
            $table->bigInteger('provider_id');
            $table->bigInteger('service_id');
            $table->bigInteger('total_price');
            $table->bigInteger('order_details_id');
            $table->integer('status')->unsigned()->default(0);
            $table->boolean('is_public')->default(false);
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
        Schema::dropIfExists('orders');
    }
}
