<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateShipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('shipments', function (Blueprint $table) {
            $table->id();
            $table->string('shipment_number');
            $table->unsignedBigInteger('origin_id');
            $table->unsignedBigInteger('destination_id');
            $table->date('loading_date');
            $table->string('status');
            $table->unsignedBigInteger('truck_id')->nullable();
            $table->unsignedBigInteger('driver_id')->nullable();
            $table->timestamps();

            $table->foreign('driver_id')->references('id')->on('drivers');
            $table->foreign('truck_id')->references('id')->on('trucks');
            $table->foreign('origin_id')->references('id')->on('districts');
            $table->foreign('destination_id')->references('id')->on('districts');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('shipments');
    }
}
