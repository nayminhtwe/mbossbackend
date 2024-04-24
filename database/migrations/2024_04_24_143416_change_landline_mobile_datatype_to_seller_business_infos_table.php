<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLandlineMobileDatatypeToSellerBusinessInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seller_business_infos', function (Blueprint $table) {
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
        Schema::table('seller_business_infos', function (Blueprint $table) {
            //
        });
    }
}
