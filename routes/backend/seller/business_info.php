<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SellerBusinessInfoController;

Route::resource('business-info', SellerBusinessInfoController::class)->except(['create']);

Route::get('admin/business-info/create/{app_user_id}', [SellerBusinessInfoController::class, 'create'])->name('business-info.create');
