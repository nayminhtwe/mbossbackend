<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\AppUserController;
use App\Http\Controllers\API\CategoryController;
use App\Http\Controllers\API\InvoiceController;
use App\Http\Controllers\API\FileUploadController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//    return $request->user();
//});

Route::group(['prefix' => 'v1'], function () {
    Route::post('register_with_email', [AppUserController::class, 'register_with_email']);
    Route::post('login_with_email', [AppUserController::class, 'login_with_email']);
    // Route::post('code_request', [AppUserController::class, 'code_request']);
    Route::post('register_with_phone', [AppUserController::class, 'register_with_phone']);
    Route::post('login_with_phone', [AppUserController::class, 'login_with_phone']);

    Route::group([ 'middleware' => 'auth.user-api' ], function () {

        Route::get('profile', [AppUserController::class, 'profile']);
        Route::get('categories', [CategoryController::class, 'categories']);
        Route::post('invoice', [InvoiceController::class, 'store']);
        Route::get('all_invoice_list', [InvoiceController::class, 'index']);
        Route::get('my_invoice_list', [InvoiceController::class, 'my_invoice_list']);
        Route::post('photo', [AppUserController::class, 'photo']);
        Route::get('invoice/{invoice_id}', [InvoiceController::class, 'invoice']);
        Route::get('invoice_by_category', [InvoiceController::class, 'invoice_by_category']);
        Route::post('file_upload', [FileUploadController::class, 'store']);
        Route::post('invoice_upload', [InvoiceController::class, 'invoice_upload']);
        Route::post('invoice_purchase', [InvoiceController::class, 'invoice_purchase']);
        Route::get('invoice_purchased', [InvoiceController::class, 'purchased']);
        Route::post('profile_image', [AppUserController::class, 'profile_image']);
        Route::get('transaction_log', [AppUserController::class, 'transaction_log']);
        Route::post('seller_invoice_approval', [InvoiceController::class, 'seller_invoice_approval']);
        Route::post('my_approval_invoice_list', [InvoiceController::class, 'my_approval_invoice_list']);
    });
});