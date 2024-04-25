<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SellerContractFileController;

Route::resource('contract', SellerContractFileController::class)->except(['create']);

Route::get('admin/contract/create/{app_user_id}', [SellerContractFileController::class, 'create'])->name('contract.create');