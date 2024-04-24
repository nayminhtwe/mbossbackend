<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeLandlineMobileDatatypeToSellerPersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seller_personal_infos', function (Blueprint $table) {
            $table->string('personal_landline')->nullable()->change();
            $table->string('personal_mobile')->change();
            $table->string('authorized_person_mobile')->nullable()->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seller_personal_infos', function (Blueprint $table) {
            //
        });
    }
}
