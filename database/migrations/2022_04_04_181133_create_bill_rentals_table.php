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
        Schema::create('bill_rentals', function (Blueprint $table) {
            $table->id();
            $table->string('bill_code');
            $table->date('bill_date');
            $table->date('bill_period_start');
            $table->date('bill_period_end');
            $table->foreignId('location_id')->constrained(); // Foreign key
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
        Schema::dropIfExists('bill_rentals');
    }
};
