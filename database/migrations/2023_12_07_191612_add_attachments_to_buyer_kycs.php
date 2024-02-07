<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddAttachmentsToBuyerKycs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buyer_kycs', function (Blueprint $table) {
            $table->string('nrc_soft_copy')->nullable();
            $table->string('bank_book_soft_copy')->nullable();
            $table->string('household_registration_soft_copy')->nullable();
            $table->string('authorize_person_nrc_soft_copy')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('buyer_kycs', function (Blueprint $table) {
            //
        });
    }
}
