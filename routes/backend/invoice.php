<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\InvoiceController;

Route::resource('invoice', InvoiceController::class);

Route::post('invoice/approve', [InvoiceController::class, 'invoice_approve'])->name('invoice_approve');

Route::get('finished', [InvoiceController::class, 'finished'])->name('invoice.finished');

Route::get('get_invoice_approve/{invoice_id}', [InvoiceController::class, 'get_invoice_approve'])->name('get_invoice_approve');

Route::get('purchased', [InvoiceController::class, 'purchased'])->name('invoice.purchased');

Route::get('purchased_status', [InvoiceController::class, 'purchased_status'])->name('invoice.purchased_status');

Route::get('purchased_finish/{invoice_id}', [InvoiceController::class, 'purchased_finish'])->name('purchased_finish');

Route::get('purchased_pending/{invoice_id}', [InvoiceController::class, 'purchased_pending'])->name('purchased_pending');

Route::get('purchased_default/{invoice_id}', [InvoiceController::class, 'purchased_default'])->name('purchased_default');

Route::get('purchased_finished_list', [InvoiceController::class, 'purchased_finished_list'])->name('invoice.purchased_finished_list');

Route::get('purchased_delayed_list', [InvoiceController::class, 'purchased_delayed_list'])->name('invoice.purchased_delayed_list');

Route::get('purchased_default_list', [InvoiceController::class, 'purchased_default_list'])->name('invoice.purchased_default_list');

Route::get('seller_approved_invoice_list', [InvoiceController::class, 'seller_approved_invoice_list'])->name('invoice.seller_approved_invoice_list');

Route::get('deleted_invoice_list', [InvoiceController::class, 'deleted_invoice_list'])->name('invoice.deleted_invoice_list');

Route::get('end_sale/{invoice_id}', [InvoiceController::class, 'end_sale'])->name('end_sale');

Route::get('sale_ended_invoice_list', [InvoiceController::class, 'sale_ended_invoice_list'])->name('invoice.sale_ended_invoice_list');

Route::get('get_purchased_finish_after_delay/{invoice_id}', [InvoiceController::class, 'get_purchased_finish_after_delay'])->name('get_purchased_finish_after_delay');

Route::post('purchased_finish_after_delay', [InvoiceController::class, 'purchased_finish_after_delay'])->name('purchased_finish_after_delay');
