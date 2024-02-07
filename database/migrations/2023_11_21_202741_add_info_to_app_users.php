<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddInfoToAppUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_users', function (Blueprint $table) {
            $table->string('lastName')->nullable();
            $table->string('nrc');
            $table->longText('currentAddress');
            $table->longText('permanentAddress');
            $table->string('date_of_birth');
            $table->string('age');
            $table->string('bankName');
            $table->string('bankAcc');
            $table->string('bankNameOptional')->nullable();
            $table->string('bankAccOptional')->nullable();
            $table->tinyInteger('buyer_status')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_users', function (Blueprint $table) {
            //
        });
    }
}
