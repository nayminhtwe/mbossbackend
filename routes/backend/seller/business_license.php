<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SellerBusinessLicenseController;

Route::resource('business-license', SellerBusinessLicenseController::class)->except(['create']);

Route::get('admin/business-license/create/{app_user_id}', [SellerBusinessLicenseController::class, 'create'])->name('business-license.create');
