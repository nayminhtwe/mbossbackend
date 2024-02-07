<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SellerNrcController;

Route::resource('nrc', SellerNrcController::class)->except(['create']);

Route::get('admin/nrc/create/{app_user_id}', [SellerNrcController::class, 'create'])->name('nrc.create');

Route::get('attachment/{app_user_id}', [SellerNrcController::class, 'attachment'])->name('seller.attachment');