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
        Schema::create('apartment_tenant', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('apartment_id')->unsigned()->nullable(); // Foreign key
            $table->bigInteger('tenant_id')->unsigned()->nullable(); // Foreign key
            $table->timestamps();

            // Foreign key
            $table->foreign('apartment_id')->references('id')->on('apartments')->onUpdate('cascade')->onDelete('restrict');
            $table->foreign('tenant_id')->references('id')->on('tenants')->onUpdate('cascade')->onDelete('restrict');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('apartment_tenant');
    }
};
