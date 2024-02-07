<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeBankNullableToBuyerKycsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('buyer_kycs', function (Blueprint $table) {
            $table->string('bankName')->nullable()->change();
            $table->string('bankBranch')->nullable()->change();
            $table->string('typeOfAccount')->nullable()->change();
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
