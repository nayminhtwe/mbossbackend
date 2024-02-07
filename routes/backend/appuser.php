<?php

use App\Http\Controllers\Backend\AppUserController;

Route::resource('appuser', AppUserController::class);

Route::get('wallet', [AppUserController::class, 'wallet'])->name('wallet');

Route::get('wallet_create/{app_user}', [AppUserController::class, 'wallet_create'])->name('wallet_create');

Route::post('wallet_store/{app_user}', [AppUserController::class, 'wallet_store'])->name('wallet_store');

Route::get('transaction_log', [AppUserController::class, 'transaction_log'])->name('transaction_log');

Route::get('resetform/{app_user}', [AppUserController::class, 'resetform'])->name('resetform');

Route::post('resetpassword', [AppUserController::class, 'resetpassword'])->name('resetpassword');