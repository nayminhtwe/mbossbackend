<?php

use App\Http\Controllers\Backend\DashboardController;
use App\Http\Controllers\Backend\KycController;

Route::resource('kyc', KycController::class);

Route::get('kycs/app_user', [KycController::class, 'app_user_index'])->name('kyc.app_user.index');

Route::get('kycs/create_step_one/{app_user_id}', [KycController::class, 'createStepOne'])->name('kyc.create_step_one');

Route::post('kycs/create_step_one', [KycController::class, 'postCreateStepOne'])->name('kyc.create_step_one_post');

Route::get('kycs/create_step_two', [KycController::class, 'createStepTwo'])->name('kyc.create_step_two');

Route::post('kycs/create_step_two', [KycController::class, 'postCreateStepTwo'])->name('kyc.create_step_two_post');

Route::get('kycs/create_step_three', [KycController::class, 'createStepThree'])->name('kyc.create_step_three');

Route::post('kycs/create_step_three', [KycController::class, 'postCreateStepThree'])->name('kyc.create_step_three_post');