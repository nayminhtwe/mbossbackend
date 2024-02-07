<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\SellerImportExportLicenseController;

Route::resource('import-export-license', SellerImportExportLicenseController::class)->except(['create']);

Route::get('admin/import-export-license/create/{app_user_id}', [SellerImportExportLicenseController::class, 'create'])->name('import-export-license.create');