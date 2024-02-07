<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerPendingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_pendings', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_user_id')->index();
            $table->foreign('app_user_id')->references('id')->on('app_users')->onDelete('cascade');
            $table->tinyInteger('personal_info')->default('0');
            $table->tinyInteger('business_info')->default('0');
            $table->tinyInteger('nrc_file')->default('0');
            $table->tinyInteger('compnay_registration_file')->default('0');
            $table->tinyInteger('company_extract_file')->default('0');
            $table->tinyInteger('company_billing_statement_file')->default('0');
            $table->tinyInteger('business_license_file')->default('0');
            $table->tinyInteger('bod_resolution_file')->default('0');
            $table->tinyInteger('import_export_license_file')->default('0');
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
        Schema::dropIfExists('seller_pendings');
    }
}
