<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateBuyerKycsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('buyer_kycs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_user_id')->index();
            $table->foreign('app_user_id')->references('id')->on('app_users')->onDelete('cascade');
            $table->string('dateOfBirth');
            $table->string('fatherName');
            $table->string('nationality');
            $table->string('nrc_or_passport');
            $table->string('qualifications');
            $table->string('occupation');
            $table->string('maritalStatus');
            $table->string('nameOfSpouse')->nullable();
            $table->string('spouse_nrc_or_passport')->nullable();
            $table->longText('permanentAddress');
            $table->longText('currentAddress');
            $table->longText('postalAddress');
            $table->string('phone');
            $table->string('employmentNatureOfBusiness')->nullable();
            $table->string('employmentPosition')->nullable();
            $table->string('employmentYearsOfService')->nullable();
            $table->string('employerName')->nullable();
            $table->longText('employerAddress')->nullable();
            $table->string('officeContactNo')->nullable();
            $table->string('selfEmploymentNatureOfBusiness')->nullable();
            $table->string('revenueModel')->nullable();
            $table->string('annualIncome');
            $table->string('sourceOfFund');
            $table->string('bankReference');
            $table->string('bankName');
            $table->string('bankBranch');
            $table->string('typeOfAccount');
            $table->string('contactName');
            $table->string('contact_nrc_or_passport');
            $table->string('contactRelationship');
            $table->string('contactNationality');
            $table->string('contactPhone');
            $table->string('contactEmail')->nullable();
            $table->string('authorizePersonName')->nullable();
            $table->string('authorize_person_nrc_or_passport')->nullable();

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
        Schema::dropIfExists('buyer_kycs');
    }
}
