<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellerBodResolutionFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('seller_bod_resolution_files', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('app_user_id')->index();
            $table->foreign('app_user_id')->references('id')->on('app_users')->onDelete('cascade');
            $table->string('bod_resolution')->nullable();
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
        Schema::dropIfExists('seller_bod_resolution_files');
    }
}
