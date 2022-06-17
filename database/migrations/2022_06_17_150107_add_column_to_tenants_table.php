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
        Schema::table('tenants', function (Blueprint $table) {
            $table->string('address')->nullable()->after('mobile');
            $table->string('school_company')->nullable()->after('address');
            $table->string('person_to_notify')->nullable()->after('school_company');
            $table->string('person_contact_number')->nullable()->after('person_to_notify');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('tenants', function (Blueprint $table) {
            $table->dropColumn('address');
            $table->dropColumn('school_company');
            $table->dropColumn('person_to_notify');
            $table->dropColumn('person_contact_number');
        });
    }
};
