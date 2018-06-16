<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHealthcaresTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('healthcares', function (Blueprint $table) {
            $table->increments('id');
            $table->string('mobile');
            $table->string('firstname');
            $table->string('lastname'); 
            $table->enum('registerAs', ['Doctor', 'Hospital', 'Diagnostic Laboratory', 
                'Clinic', 'Medical Health Check-up Centre']);
            $table->string('qualification');
            $table->string('specialization');
            $table->string('email');
            $table->string('phone')->nullable();
            $table->string('homeAddress');
            $table->string('chamberAddress');
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
        Schema::dropIfExists('healthcares');
    }
}
