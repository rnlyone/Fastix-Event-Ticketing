<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    if (Auth::check()) {
        if (auth()->user()->role == 'cust') {
            return redirect()->route('cust');
        } else if (auth()->user()->role == 'EO'){
            return redirect()->route('EO');
        }
    } else {
        return redirect()->route('flogin');
    }

});


Route::group(['middleware'=>['guest']], function(){
    Route::get('/login', [UserController::class, 'flogin'])->name('flogin');
    Route::post('/login', [UserController::class, 'login'])->name('login');
});

Route::group(['middleware'=>['auth']], function(){
    Route::middleware(['role:cust'])->group(function () {
        Route::get('/cust', [CustomerController::class, 'custIndex'])->name('cust');
        Route::get('/cust/profile', [CustomerController::class, 'custProfile'])->name('cust.profile');
        Route::get('/cust/ticket', [CustomerController::class, 'custTicket'])->name('cust.ticket');
        Route::get('/cust/scan', [CustomerController::class, 'custScan'])->name('cust.scan');
        Route::get('/cust/event/{uuid}', [CustomerController::class, 'custEvent'])->name('cust.event');
        Route::get('/cust/transaction', [CustomerController::class, 'custTransaction'])->name('cust.transaction');
        Route::get('/cust/checkout/{uuid}', [OrderController::class, 'fcheckout'])->name('cust.checkout');
        Route::get('/cust/ticket/{order}/{detail}', [CustomerController::class, 'custDetailTicket'])->name('cust.detailticket');

        Route::post('/cust/ordernow', [OrderController::class, 'ordernow'])->name('cust.ordernow');

        Route::post('/scan', [CustomerController::class, 'scan'])->name('scan');

        Route::resource('cust', CustomerController::class)->except('index');
        Route::resource('order', OrderController::class);
        Route::post('order/response', [OrderController::class, 'response'])->name('order.response');
        Route::get('order/midresponse/{id}', [OrderController::class, 'midtrans_response'])->name('order.midresponse');


    });

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});


Route::get('/menumain', function () {return view('pwa.layouts.menu-main');});
Route::get('/menushare', function () {return view('pwa.layouts.menu-share');});
Route::get('/menucolors', function () {return view('pwa.layouts.menu-colors');});
Route::get('/menufooter', function () {return view('pwa.layouts.menu-footer');})->name('menufooter');
