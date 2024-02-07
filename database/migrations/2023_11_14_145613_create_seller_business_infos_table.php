<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerBusinessInfosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_business_infos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_user_id')->index();
            $table->foreign('app_user_id')->references('id')->on('app_users')->onDelete('cascade');
            $table->string('business_name');
            $table->string('business_email');
            $table->string('registration_number');
            $table->string('registration_date');
            $table->string('entity_type');
            $table->string('industry');
            $table->string('number_of_employees');
            $table->string('revenue_model')->nullable();
            $table->string('clients')->nullable();
            $table->string('ownership')->nullable();
            $table->string('product_or_service');
            $table->string('net_worth_per_annum')->nullable();
            $table->bigInteger('business_landline')->nullable();
            $table->bigInteger('business_mobile');
            $table->longText('business_address_line_one');
            $table->longText('business_address_line_two')->nullable();
            $table->string('business_country');
            $table->string('business_township');
            $table->string('business_state_or_division');
            $table->string('business_zip_code')->nullable();
            $table->string('effective_date')->nullable();
            $table->string('reference_one_full_name')->nullable();
            $table->string('reference_one_father_name')->nullable();
            $table->string('reference_one_nrc')->nullable();
            $table->longText('reference_one_address')->nullable();
            $table->bigInteger('reference_one_mobile')->nullable();
            $table->string('reference_one_position')->nullable();
            $table->string('reference_one_email')->nullable();
            $table->string('reference_two_full_name')->nullable();
            $table->string('reference_two_father_name')->nullable();
            $table->string('reference_two_nrc')->nullable();
            $table->longText('reference_two_address')->nullable();
            $table->bigInteger('reference_two_mobile')->nullable();
            $table->string('reference_two_position')->nullable();
            $table->string('reference_two_email')->nullable();
            $table->string('reference_three_full_name')->nullable();
            $table->string('reference_three_father_name')->nullable();
            $table->string('reference_three_nrc')->nullable();
            $table->longText('reference_three_address')->nullable();
            $table->bigInteger('reference_three_mobile')->nullable();
            $table->string('reference_three_position')->nullable();
            $table->string('reference_three_email')->nullable();
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
        Schema::dropIfExists('seller_business_infos');
    }
}
