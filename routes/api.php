<?php

use App\Http\Controllers\OrderController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();

    Route::post('/midresponse', [OrderController::class, 'midtrans_response'])->name('order.midresponse');
    Route::post('/finresponse', [OrderController::class, 'finishedpayment'])->name('order.finish');
    Route::post('/unfinresponse/', [OrderController::class, 'unfinishedpayment'])->name('order.unfinish');
});

