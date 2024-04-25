<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddContractAndOthersToSellerPendings extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seller_pendings', function (Blueprint $table) {
            $table->tinyInteger('contract_file')->default('0');
            $table->tinyInteger('other_file')->default('0');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seller_pendings', function (Blueprint $table) {
            //
        });
    }
}
