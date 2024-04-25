<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SellerOtherFileController;

Route::resource('other', SellerOtherFileController::class)->except(['create']);

Route::get('admin/other/create/{app_user_id}', [SellerOtherFileController::class, 'create'])->name('other.create');