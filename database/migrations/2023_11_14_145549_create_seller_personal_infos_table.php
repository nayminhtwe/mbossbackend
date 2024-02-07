<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerPersonalInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_personal_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_user_id')->index();
            $table->foreign('app_user_id')->references('id')->on('app_users')->onDelete('cascade');
            $table->string('full_name');
            $table->string('father_name');
            $table->string('nrc_or_passport');
            $table->string('marital_status');
            $table->string('birth_date');
            $table->string('birth_place_country');
            $table->string('birth_place_city');
            $table->string('position');
            $table->string('nationality');
            $table->bigInteger('personal_landline')->nullable();
            $table->bigInteger('personal_mobile');
            $table->string('authorized_person_full_name')->nullable();
            $table->string('authorized_person_father_name')->nullable();
            $table->bigInteger('authorized_person_mobile')->nullable();
            $table->string('authorized_person_email')->nullable();
            $table->longText('personal_address_line_one');
            $table->longText('personal_address_line_two')->nullable();
            $table->string('country');
            $table->string('township');
            $table->string('state_or_division');
            $table->string('zip_code')->nullable();
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
        Schema::dropIfExists('seller_personal_infos');
    }
}
