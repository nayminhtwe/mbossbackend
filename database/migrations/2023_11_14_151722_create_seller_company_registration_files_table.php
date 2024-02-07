<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerCompanyRegistrationFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_company_registration_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_user_id')->index();
            $table->foreign('app_user_id')->references('id')->on('app_users')->onDelete('cascade');
            $table->string('company_registration_soft_copy')->nullable();
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
        Schema::dropIfExists('seller_company_registration_files');
    }
}
