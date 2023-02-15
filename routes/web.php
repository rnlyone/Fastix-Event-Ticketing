<?php

use App\Http\Controllers\CustomerController;
use App\Http\Controllers\EOController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\TicketController;
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
    Route::get('/register', [UserController::class, 'fregister'])->name('fregister');
    Route::post('/register', [UserController::class, 'register'])->name('register');
    Route::get('/logineo', [UserController::class, 'flogineo'])->name('flogineo');
});

Route::group(['middleware'=>['auth']], function(){
    Route::middleware(['role:cust'])->group(function () {
        Route::get('/cust', [CustomerController::class, 'custIndex'])->name('cust');
        Route::get('/cust/profile', [CustomerController::class, 'custProfile'])->name('cust.profile');
        Route::post('/cust/profile/update', [CustomerController::class, 'newupdate'])->name('cust.updateprofile');
        Route::post('/cust/profile/updateimg', [CustomerController::class, 'newupdateimg'])->name('cust.updatepp');
        Route::get('/cust/ticket', [CustomerController::class, 'custTicket'])->name('cust.ticket');
        // Route::get('/cust/event/{uuid}', [CustomerController::class, 'custEvent'])->name('cust.event');
        Route::get('/cust/transaction', [CustomerController::class, 'custTransaction'])->name('cust.transaction');
        Route::get('/cust/checkout/{uuid}', [OrderController::class, 'fcheckout'])->name('cust.checkout');
        Route::get('/cust/invoice/{uuid}', [OrderController::class, 'finvoice'])->name('cust.invoice');
        Route::get('/cust/ticket/{order}/{detail}', [CustomerController::class, 'custDetailTicket'])->name('cust.detailticket');


        Route::post('/cust/ordernow', [OrderController::class, 'ordernow'])->name('cust.ordernow');


        Route::resource('cust', CustomerController::class)->except('index');
        Route::resource('order', OrderController::class);
        Route::post('order/response', [OrderController::class, 'response'])->name('order.response');

    });

    Route::middleware(['role:EO'])->group(function () {
        Route::get('/dashboard', [EOController::class, 'EOIndex'])->name('EO');

        Route::resource('/event', EventController::class)->except('update', 'store');


        Route::get('/event/details/{uuid}', [EventController::class, 'EOEvent'])->name('event.detail');
        Route::post('/event/details/{uuid}/update', [EventController::class, 'newupdate'])->name('event.update');
        Route::post('/event/store', [EventController::class, 'store'])->name('event.store');
        Route::get('/event/attend/{uuid}', [EventController::class, 'EOattend'])->name('event.attend');
        Route::post('/event/scan', [EventController::class, 'EOscan'])->name('event.scan');

        Route::resource('/ticket', TicketController::class)->except('update', 'store');
        Route::post('/ticket/{uuidtix}', [TicketController::class, 'newupdate'])->name('ticket.update');
        Route::post('/ticket/store/{uuid}', [TicketController::class, 'store'])->name('ticket.store');

    });

    Route::get('/logout', [UserController::class, 'logout'])->name('logout');
});


Route::get('/menumain', function () {return view('pwa.layouts.menu-main');});
Route::get('/menushare', function () {return view('pwa.layouts.menu-share');});
Route::get('/menucolors', function () {return view('pwa.layouts.menu-colors');});
Route::get('/menufooter', function () {return view('pwa.layouts.menu-footer');})->name('menufooter');



Route::get('/scan', [CustomerController::class, 'custScan'])->name('cust.scan');
Route::post('/scan', [CustomerController::class, 'scan'])->name('scan');

Route::get('/eventdetail/{uuid}', [CustomerController::class, 'custEvent'])->name('cust.event');
