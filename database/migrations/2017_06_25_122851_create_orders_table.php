<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->increments('id');
            $table->integer('user_id');
            $table->enum('status', ['Pending', 'Processing', 'Sample Collection Processing', 'Sample Collection Done', 'Lab Processing', 'Success', 'Cancel']);
            $table->integer('delivery_charge')->nullable();
            $table->integer('discount_price')->nullable();
            $table->integer('total');
            $table->string('barcode')->nullable();
            $table->integer('report_id');
            $table->longText('shipping_address')->nullable();
            $table->string('invoice_no')->nullable();
            $table->string('other_invoice_no')->nullable();
            $table->string('ref_info')->nullable();
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
