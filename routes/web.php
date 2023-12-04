<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('confirm');
});

Route::controller(MailController::class)->group(function() {
    Route::post('/cek-pembayaran', 'ConfirmPayment');
});

Route::get('/success', function() {
    return view('success');
});


