<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateVehicle extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicles', function (Blueprint $table) {
            $table->id();
            $table->string('reg_no')->unique();
            $table->enum('condition', ['new', 'used', 'rebuilt']);
            $table->string('make');
            $table->string('model');
            $table->string('body_type');
            $table->string('chassis_no');
            $table->string('year');
            $table->enum('local_manufactured', ['false', 'true']);
            $table->string('unladen_weight');
            $table->string('gross_weight');
            $table->integer('axels');
            $table->integer('seating_capacity');
            $table->integer('standing_capacity');
            $table->string('engine_no');
            $table->string('engine_capacity');
            $table->string('color');
            $table->string('fuel');
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
        Schema::dropIfExists('vehicle');
    }
}
