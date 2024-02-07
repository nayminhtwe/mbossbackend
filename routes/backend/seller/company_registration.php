<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SellerCompanyRegistrationController;

Route::resource('company-registration', SellerCompanyRegistrationController::class)->except(['create']);

Route::get('admin/company-registration/create/{app_user_id}', [SellerCompanyRegistrationController::class, 'create'])->name('company-registration.create');
