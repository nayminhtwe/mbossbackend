<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\BuyerKycController;

Route::resource('buyer-kyc', BuyerKycController::class)->except(['create']);

Route::get('admin/buyer-kyc/create/{app_user_id}', [BuyerKycController::class, 'create'])->name('buyer-kyc.create');

Route::get('admin/buyer-kyc/app_user', [BuyerKycController::class, 'app_user_index'])->name('buyer-kyc.app_user');

Route::get('admin/buyer-kyc/request', [BuyerKycController::class, 'request'])->name('buyer-kyc.request');

Route::get('buyer-kyc-request/{app_user_id}', [BuyerKycController::class, 'request_show'])->name('buyer-kyc-request.show');

Route::get('buyer-kyc-request-approve/{app_user_id}', [BuyerKycController::class, 'approve'])->name('buyer-kyc-request.approve');
