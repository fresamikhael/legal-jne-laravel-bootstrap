<?php

use App\Http\Controllers\database\DatabaseController;
use App\Http\Controllers\Drafting\CustomerController;
use App\Http\Controllers\Drafting\LeaseController;
use App\Http\Controllers\Drafting\VendorController;
use App\Http\Controllers\Litigation\CustomerDisputeController;
use App\Http\Controllers\Litigation\FraudController;
use App\Http\Controllers\Litigation\OtherController;
use App\Http\Controllers\Litigation\OutstandingController;
use App\Http\Controllers\permit\NewPermitController;
use App\Http\Controllers\permit\ProlongationController;
use App\Http\Controllers\Regulation\InternalController;
use App\Http\Controllers\Regulation\NormativeController;
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

Route::prefix('drafting')->name('drafting.')->group(function () {
    Route::get('/index', function () {
        return View('pages.user.drafting.index');
    })->name('index');

    Route::get('customer', [CustomerController::class, 'index'])->name('customer');
    Route::post('customer/post', [CustomerController::class, 'store'])->name('customer-post');

    Route::get('vendor', [VendorController::class, 'index'])->name('vendor');
    Route::post('vendor/post', [VendorController::class, 'store'])->name('vendor-post');

    Route::get('lease', [LeaseController::class, 'index'])->name('lease');
});

Route::prefix('litigation')->name('litigation.')->group(function () {
    Route::get('/', function () {
        return View('pages.user.litigation.index');
    })->name('index');

    Route::get('customer-dispute', [CustomerDisputeController::class, 'index'])->name('customer-dispute');
    Route::get('fraud', [FraudController::class, 'index'])->name('fraud');
    Route::get('outstanding', [OutstandingController::class, 'index'])->name('outstanding');
    Route::get('other', [OtherController::class, 'index'])->name('other');
});

Route::prefix('information')->name('information.')->group(function () {
    Route::get('/', function () {
        return View('pages.user.information.index');
    })->name('index');
});

Route::prefix('permit')->name('permit.')->group(function () {
    Route::get('/', function () {
        return View('pages.user.permit.index');
    })->name('index');

    Route::get('perizinan-baru', [NewPermitController::class, 'index'])->name('newpermit');
    Route::post('perizinan-baru/post', [NewPermitController::class, 'store'])->name('newpermit-post');
    // Route::post('perizinan-baru/post', [NewPermitController::class, 'store'])->name('perizinan-baru-post');
    Route::get('perpanjangan', [ProlongationController::class, 'index'])->name('prolongation');

    // Route::get('outstanding', [OutstandingController::class, 'index'])->name('outstanding');
    // Route::get('other', [OtherController::class, 'index'])->name('other');
});

Route::get('/database', [DatabaseController::class, 'index'])->name('database');

Route::get('/', function () {
    return view('pages.user.index');
})->name('home');

Route::get('/login', function () {
    return view('pages.auth.index');
})->name('login');




Route::prefix('regulation')->name('regulation.')->group(function () {
    Route::get('/', function () {
        return View('pages.user.regulation.index');
    })->name('index');

    Route::get('internal', [InternalController::class, 'index'])->name('internal');
    Route::get('normative', [NormativeController::class, 'index'])->name('normative');

    Route::get('internal-create', [InternalController::class, 'create'])->name('internal-create');
    Route::get('normative-create', [NormativeController::class, 'create'])->name('normative-create');
});

Route::get('/statistic', function () {
    return view('pages.user.statistic');
})->name('statistic');




Route::get('/contact-us', function () {
    return view('pages.user.contact_us');
})->name('contact-us');
