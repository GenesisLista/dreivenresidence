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
        Schema::create('bill_alr_buildings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('bill_rental_id')->constrained(); // Foreign key
            $table->foreignId('tenant_id')->constrained(); // Foreign key
            $table->foreignId('apartment_id')->constrained(); // Foreign key
            $table->foreignId('bill_payment_status_id')->constrained()->comment('1-Paid 2-No Paid'); // Foreign key
            $table->foreignId('bill_type_id')->constrained()->comment('1-Rental 2-Meralco 3-Maynilad'); // Foreign key
            $table->integer('billed_amount');
            $table->integer('billed_paid_amount')->nullable();
            $table->integer('billed_balance_amount')->nullable();
            $table->date('billed_date_paid')->nullable();
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
        Schema::dropIfExists('bill_alr_buildings');
    }
};
