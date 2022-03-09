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
        Schema::create('apartments', function (Blueprint $table) {
            $table->id();
            $table->integer('location')->nullable()->comment('1-Sampaloc 2-StaMesa 3-RoxasDist 4-AlrBldg');
            $table->text('room')->nullable();
            $table->bigInteger('apartment_status_id')->unsigned()->nullable(); // Foreign key
            $table->timestamps();

            // Foreign key
            $table->foreign('apartment_status_id')->references('id')->on('apartment_statuses')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartments');
    }
};
