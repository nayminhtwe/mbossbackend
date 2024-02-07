<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSellerPricingFieldsToInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->string('payer')->nullable();
            $table->string('invoice_issued_date')->nullable();
            $table->string('invoice_selling_date')->nullable();
            $table->string('remaining_day')->nullable();
            $table->string('daily_discount_rate')->nullable();
            $table->string('seller_discount_rate')->nullable();
            $table->bigInteger('discounted_amount')->nullable();
            $table->string('service_fees')->nullable();
            $table->bigInteger('seller_receivable_amount')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('invoices', function (Blueprint $table) {
            //
        });
    }
}
