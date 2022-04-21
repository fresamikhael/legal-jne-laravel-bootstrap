<?php

use App\Http\Controllers\Database\DatabaseController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\Drafting\CustomerController;
use App\Http\Controllers\Drafting\LeaseController;
use App\Http\Controllers\Drafting\VendorController;
use App\Http\Controllers\Legal\Drafting\CustomerController as DraftingCustomerController;
use App\Http\Controllers\Litigation\CustomerDisputeController;
use App\Http\Controllers\Litigation\FraudController;
use App\Http\Controllers\Litigation\OtherController;
use App\Http\Controllers\Litigation\OutstandingController;
use App\Http\Controllers\MailController;
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
    Route::post('lease/post', [LeaseController::class, 'store'])->name('lease-post');
});

Route::prefix('legal/drafting')->name('legal.drafting.')->group(function () {
    Route::get('/index', function () {
        return View('pages.legal.drafting.index');
    })->name('index');

    Route::get('customer', [CustomerController::class, 'index'])->name('customer');
    Route::post('customer/post', [CustomerController::class, 'store'])->name('customer-post');
    Route::get('customer/check/{id}', [DraftingCustomerController::class, 'check'])->name('legal-customer-check');
    Route::get('customer/history', [DraftingCustomerController::class, 'historyTable'])->name('legal-customer-table');

    Route::get('vendor', [VendorController::class, 'index'])->name('vendor');
    Route::post('vendor/post', [VendorController::class, 'store'])->name('vendor-post');

    Route::get('lease', [LeaseController::class, 'index'])->name('lease');
    Route::post('lease/post', [LeaseController::class, 'store'])->name('lease-post');
});

Route::prefix('litigation')->name('litigation.')->group(function () {
    Route::get('/', function () {
        return View('pages.user.litigation.index');
    })->name('index');

    Route::prefix('customer-dispute')->name('customer-dispute.')->controller(CustomerDisputeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });

    Route::prefix('fraud')->name('fraud.')->controller(FraudController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });

    Route::prefix('outstanding')->name('outstanding.')->controller(OutstandingController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });

    Route::prefix('other')->name('other.')->controller(OtherController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });
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

Route::prefix('database')->name('database.')->controller(DatabaseController::class)->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('tambah', 'add')->name('add');
    Route::post('tambah', 'store')->name('store');
    Route::get('detail/{id}', 'show')->name('show');
});

Route::get('/', function () {
    return view('pages.user.index');
})->name('home');

Route::get('/legal', function () {
    return view('pages.legal.index');
})->name('legal-home');

Route::get('/login', function () {
    return view('pages.auth.index');
})->name('login');

Route::get('/downloadPermit/{path}', [DownloadController::class, 'downloadPermit'])->name('download');
Route::get('/downloadLitigation/{path}', [DownloadController::class, 'downloadLitigation'])->name('download-litigation');
Route::get('/downloadDrafting/{path}', [DownloadController::class, 'downloadDrafting'])->name('download-Drafting');
Route::get('/downloadRegulation/{path}', [DownloadController::class, 'downloadRegulation'])->name('download-Regulation');

Route::prefix('regulation')->name('regulation.')->group(function () {
    Route::get('/index', function () {
        return View('pages.user.regulation.index');
    })->name('index');

    Route::get('internal', [InternalController::class, 'index'])->name('internal');
    Route::get('normative', [NormativeController::class, 'index'])->name('normative');

    Route::get('internal-create', [InternalController::class, 'create'])->name('internal-create');
    Route::get('normative-create', [NormativeController::class, 'create'])->name('normative-create');

    Route::post('internal-create/post', [InternalController::class, 'store'])->name('internal-post');
    Route::post('normative-create/post', [NormativeController::class, 'store'])->name('normative-post');

    Route::get('internal-edit/{id}', [InternalController::class, 'edit'])->name('internal-edit');
    Route::post('internal-update/post', [InternalController::class, 'update'])->name('internal-update');

    Route::get('internal-detail/{id}', [InternalController::class, 'show'])->name('internal-detail');
    Route::get('normative-detail/{id}', [NormativeController::class, 'show'])->name('normative-detail');
});

Route::get('/statistic', function () {
    return view('pages.legal.statistic');
})->name('statistic');




Route::get('/contact-us', function () {
    return view('pages.user.contact_us');
})->name('contact-us');
