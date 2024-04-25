<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SellerPersonalInfoController;

Route::resource('personal-info', SellerPersonalInfoController::class)->except(['create']);

Route::get('admin/personal-info/create/{app_user_id}', [SellerPersonalInfoController::class, 'create'])->name('personal-info.create');

Route::get('admin/app_user', [SellerPersonalInfoController::class, 'app_user_index'])->name('personal-info.app_user');

Route::get('pending', [SellerPersonalInfoController::class, 'pending'])->name('seller.pending');

Route::get('request', [SellerPersonalInfoController::class, 'request'])->name('seller.request');

Route::get('seller-request/{app_user_id}', [SellerPersonalInfoController::class, 'request_show'])->name('seller-request.show');

Route::get('seller-request-approve/{app_user_id}', [SellerPersonalInfoController::class, 'approve'])->name('seller-request.approve');

Route::get('admin-approve/{app_user_id}', [SellerPersonalInfoController::class, 'admin_approve'])->name('seller-request.admin_approve');