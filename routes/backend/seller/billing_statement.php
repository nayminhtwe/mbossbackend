<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SellerBillingStatementController;

Route::resource('billing-statement', SellerBillingStatementController::class)->except(['create']);

Route::get('admin/billing-statement/create/{app_user_id}', [SellerBillingStatementController::class, 'create'])->name('billing-statement.create');