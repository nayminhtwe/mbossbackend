<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SellerCompanyExtractController;

Route::resource('company-extract', SellerCompanyExtractController::class)->except(['create']);

Route::get('admin/company-extract/create/{app_user_id}', [SellerCompanyExtractController::class, 'create'])->name('company-extract.create');
