<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeSellerBuyerRequestCountAndSubmittedToAppUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('app_users', function (Blueprint $table) {
            $table->dropColumn('seller_buyer_request_count');
            $table->dropColumn('seller_buyer_submitted');
            $table->tinyInteger('seller_request_count')->default(0);
            $table->tinyInteger('buyer_request_count')->default(0);
            $table->tinyInteger('seller_submitted')->default(0);
            $table->tinyInteger('buyer_submitted')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('app_users', function (Blueprint $table) {
            //
        });
    }
}
