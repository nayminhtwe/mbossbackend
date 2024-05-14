<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangePurchaseAmountAndReceivableAmountDatatypeToInvoices extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('invoices', function (Blueprint $table) {
            $table->decimal('price', 12, 2)->change();
            $table->decimal('purchase_amount', 12, 2)->change();
            $table->decimal('receivable_amount', 12, 2)->change();
            $table->decimal('discounted_amount', 12, 2)->change();
            $table->decimal('seller_receivable_amount', 12, 2)->change();
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
