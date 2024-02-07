<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvoiceUploadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invoice_uploads', function (Blueprint $table) {
            $table->id();
            $table->BigInteger('invoice_id');
            $table->string('merchant_name');
            $table->string('date');
            $table->string('terms');
            $table->string('original_invoice');
            $table->string('purchase_order')->nullable();
            $table->string('contract')->nullable();
            $table->string('other')->nullable();
            $table->string('invoice_excel')->nullable();
            $table->string('payment_record')->nullable();
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
        Schema::dropIfExists('invoice_uploads');
    }
}
