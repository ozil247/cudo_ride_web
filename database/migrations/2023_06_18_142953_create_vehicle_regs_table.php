<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vehicle_regs', function (Blueprint $table) {
            $table->id();
            $table->string('user_id');
            $table->string('manufacturer');
            $table->string('model');
            $table->string('year');
            $table->string('plate_number');
            $table->string('colour');
            $table->string('ownership')->nullable();
            $table->string('interior')->nullable();
            $table->string('exterior')->nullable();
            $table->string('video')->nullable();
            $table->string('license')->nullable();
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
        Schema::dropIfExists('vehicle_regs');
    }
};
