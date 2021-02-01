<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->Increments('order_id');
            $table->string('order_address');
            $table->decimal('order_total', 8, 2);
            $table->text('order_description');
            $table->unsignedInteger('order_user');
            $table->foreign('order_user')
                  ->references('id')
                  ->on('users')
                  ->onDelete('cascade');
            $table->unsignedInteger('order_status');
            $table->foreign('order_status')
                  ->references('status_id')
                  ->on('orders_status')
                  ->onDelete('cascade');
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
