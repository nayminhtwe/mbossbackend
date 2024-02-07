<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SellerBodResolutionController;

Route::resource('bod-resolution', SellerBodResolutionController::class)->except(['create']);

Route::get('admin/bod-resolution/create/{app_user_id}', [SellerBodResolutionController::class, 'create'])->name('bod-resolution.create');