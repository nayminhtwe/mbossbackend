<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLandlineAndMobileDatatypeToKycsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('kycs', function (Blueprint $table) {
            $table->string('personal_landline')->nullable()->change();
            $table->string('personal_mobile')->change();
            $table->string('authorized_person_mobile')->nullable()->change();
            $table->string('business_landline')->nullable()->change();
            $table->string('business_mobile')->change();
            $table->string('reference_one_mobile')->nullable()->change();
            $table->string('reference_two_mobile')->nullable()->change();
            $table->string('reference_three_mobile')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('kycs', function (Blueprint $table) {
            //
        });
    }
}
