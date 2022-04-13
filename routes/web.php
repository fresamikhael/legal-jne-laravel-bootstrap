<?php

use App\Http\Controllers\Litigation\CustomerDisputeController;
use App\Http\Controllers\Litigation\FraudController;
use App\Http\Controllers\Litigation\OtherController;
use App\Http\Controllers\Litigation\OutstandingController;
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

Route::prefix('litigation')->name('litigation.')->group(function() {
    Route::get('/', function () {
        return View('pages.user.litigation.index');
    })->name('index');

    Route::get('customer-dispute', [CustomerDisputeController::class, 'index'])->name('customer-dispute');
    Route::get('fraud', [FraudController::class, 'index'])->name('fraud');
    Route::get('outstanding', [OutstandingController::class, 'index'])->name('outstanding');
    Route::get('other', [OtherController::class, 'index'])->name('other');
});

Route::get('/', function () {
    return view('pages.user.index');
})->name('home');
