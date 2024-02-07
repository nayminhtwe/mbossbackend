<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeUploadCountToSellerBuyerRequestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('seller_buyer_requests', function (Blueprint $table) {
            $table->dropColumn('upload_count');
            $table->dropColumn('finish_status');
            $table->bigInteger('seller_upload_count');
            $table->bigInteger('buyer_upload_count');
            $table->tinyInteger('seller_finish_status')->default(0);
            $table->tinyInteger('buyer_finish_status')->default(0);
            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('seller_buyer_requests', function (Blueprint $table) {
            //
        });
    }
}
