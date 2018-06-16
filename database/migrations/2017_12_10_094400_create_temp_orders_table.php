<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempOrdersTable extends Migration {
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create( 'temp_orders', function ( Blueprint $table ) {
			$table->increments( 'id' );
			$table->string( 'session_id' );
			$table->enum( 'status', [ 'active', 'cancel' ] )->nullable();
			$table->string( 'user_info' )->nullable();
			$table->string( 'order_details' )->nullable();
			$table->timestamps();

		} );
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::dropIfExists( 'temp_orders' );
	}
}
