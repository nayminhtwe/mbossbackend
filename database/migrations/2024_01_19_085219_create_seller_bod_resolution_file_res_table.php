<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerBodResolutionFileResTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_bod_resolution_file_res', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('file');
            $table->unsignedBigInteger('app_user_id')->index();
            $table->foreign('app_user_id')->references('id')->on('app_users')->onDelete('cascade');
            $table->tinyInteger('kyc_status');
            $table->unsignedBigInteger('seller_buyer_request_id')->index();
            $table->foreign('seller_buyer_request_id')->references('id')->on('seller_buyer_requests')->onDelete('cascade');
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
        Schema::dropIfExists('seller_bod_resolution_file_res');
    }
}
