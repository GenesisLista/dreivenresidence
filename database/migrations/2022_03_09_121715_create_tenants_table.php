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
        Schema::create('tenants', function (Blueprint $table) {
            $table->id();

            // These are encoded on the Tenant
            $table->string('name')->nullable();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();

            // These can be update on the Rental
            $table->bigInteger('status_id')->unsigned()->nullable()->default(1); // Foreign key
            
            // These are encoded on the Rental
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->integer('monthly_rental')->nullable();
            
            $table->timestamps();

            // Foreign key
            $table->foreign('status_id')->references('id')->on('tenant_statuses')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tenants');
    }
};
