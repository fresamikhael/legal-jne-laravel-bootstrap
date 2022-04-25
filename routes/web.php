<?php

use App\Http\Controllers\Cs\CustomerDisputeController as CsCustomerDisputeController;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MailController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\Drafting\LeaseController;
use App\Http\Controllers\Drafting\VendorController;
use App\Http\Controllers\Litigation\FraudController;
use App\Http\Controllers\Litigation\OtherController;
use App\Http\Controllers\permit\NewPermitController;
use App\Http\Controllers\Database\DatabaseController;
use App\Http\Controllers\Drafting\CustomerController;
use App\Http\Controllers\permit\ProlongationController;
use App\Http\Controllers\Regulation\InternalController;
use App\Http\Controllers\Regulation\NormativeController;
use App\Http\Controllers\Litigation\OutstandingController;
use App\Http\Controllers\Litigation\CustomerDisputeController;
use App\Http\Controllers\Legal\Drafting\CustomerController as DraftingCustomerController;
use App\Http\Controllers\LegalLitigation1\CustomerDisputeController as LegalLitigation1CustomerDisputeController;
use App\Http\Controllers\LegalLitigation2\CustomerDisputeController as LegalLitigation2CustomerDisputeController;

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

    Route::get('customer/check/{id}', [CustomerController::class, 'userCheck'])->name('customer-check');
    Route::post('customer/check/{id}', [CustomerController::class, 'userCheckPost'])->name('customer-check-post');

    Route::get('vendor', [VendorController::class, 'index'])->name('vendor');
    Route::post('vendor/post', [VendorController::class, 'store'])->name('vendor-post');

    Route::get('lease', [LeaseController::class, 'index'])->name('lease');
    Route::post('lease/post', [LeaseController::class, 'store'])->name('lease-post');
});

Route::prefix('legal/drafting')->name('legal.drafting.')->group(function () {
    Route::get('/index', function () {
        return View('pages.legal.drafting.index');
    })->name('index');

    Route::get('customer', [CustomerController::class, 'legalCreate'])->name('legal-customer');
    Route::post('customer/post', [CustomerController::class, 'legalStore'])->name('legal-customer-post');

    Route::get('customer/check/{id}', [CustomerController::class, 'legalCheck'])->name('legal-customer-check');
    Route::post('customer/check/{id}', [CustomerController::class, 'legalCheckPost'])->name('legal-customer-check-post');
    Route::get('customer/history', [CustomerController::class, 'historyTable'])->name('legal-customer-table');

    Route::get('vendor', [VendorController::class, 'legalCreate'])->name('legal-vendor');
    Route::post('vendor/post', [VendorController::class, 'store'])->name('legal-vendor-post');
    Route::get('vendor/check/{id}', [VendorController::class, 'legalCheck'])->name('legal-vendor-check');

    Route::get('lease', [LeaseController::class, 'legalCreate'])->name('legal-lease');
    Route::post('lease/post', [LeaseController::class, 'store'])->name('legal-lease-post');
    Route::get('lease/check/{id}', [LeaseController::class, 'legalCheck'])->name('legal-lease-check');
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

Route::prefix('cs')->name('cs.')->group(function () {
    Route::get('/', function () {
        return View('pages.cs.index');
    })->name('index');

    Route::prefix('customer-dispute')->name('customer-dispute.')->controller(CsCustomerDisputeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}', 'store')->name('store');
    });
});

Route::prefix('legal-litigation-1')->name('legal-litigation-1.')->group(function () {
    Route::get('/', function () {
        return View('pages.legal-litigation-1.index');
    })->name('index');

    Route::prefix('customer-dispute')->name('customer-dispute.')->controller(LegalLitigation1CustomerDisputeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}', 'store')->name('store');
    });
});

Route::prefix('legal-litigation-2')->name('legal-litigation-2.')->group(function () {
    Route::get('/', function () {
        return View('pages.legal-litigation-2.index');
    })->name('index');

    Route::prefix('customer-dispute')->name('customer-dispute.')->controller(LegalLitigation2CustomerDisputeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}', 'store')->name('store');
    });
});

Route::prefix('information')->name('information.')->group(function () {
    Route::get('/', function () {
        return View('pages.user.information.index');
    })->name('index');
});

Route::prefix('permit')->name('permit.')->controller(NewPermitController::class)->group(function () {
    // Route::get('/', function () {
    //     return View('pages.user.permit.index');
    // })->name('index');

    Route::get('/dashboard', 'home');

    Route::get('perizinan-baru',  'index')->name('newpermit');
    Route::post('perizinan-baru/post',  'store')->name('newpermit-post');
    Route::get('perizinan-baru/detail/{id}',  'detail')->name('detail');
    Route::get('perizinan-baru/edit/{id}',  'edit')->name('edit');
    Route::post('perizinan-baru/update/{id}',  'update')->name('update');


    // Route::post('perizinan-baru/post', [NewPermitController::class, 'store'])->name('perizinan-baru-post');
    Route::get('perpanjangan',  'index')->name('prolongation');
});

Route::prefix('legal/permit')->name('legal.permit.')->group(function () {
    Route::get('/', function () {
        return View('pages.legal.permit.index');
    })->name('index');

    Route::get('perizinan-baru', [NewPermitController::class, 'index_legal'])->name('newpermit');
    Route::post('perizinan-baru/post', [NewPermitController::class, 'store_legal'])->name('newpermit-post');

    Route::get('perizinan-baru/check/{id}', [NewPermitController::class, 'check_legal'])->name('check');
    Route::post('perizinan-baru/check/post/{id}', [NewPermitController::class, 'store_check_legal'])->name('check-post');
    // Route::post('perizinan-baru/post', [NewPermitController::class, 'store'])->name('perizinan-baru-post');

    Route::get('perpanjangan', [ProlongationController::class, 'index_legal'])->name('prolongation');
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
    return view('auth.login');
})->name('login');

Route::post('/login', [LoginController::class, 'login'])->name('login-attempt');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('download')->name('download.')->controller(DownloadController::class)->group(function () {
    Route::get('/permit/{path}', 'downloadPermit')->name('permit');
    Route::get('/litigation/{path}', 'downloadLitigation')->name('litigation');
    Route::get('/drafting/{path}', 'downloadDrafting')->name('drafting');
    Route::get('/regulation/{path}', 'downloadRegulation')->name('regulation');
});

Route::prefix('regulation')->name('regulation.')->group(function () {
    Route::get('/index', function () {
        return View('pages.user.regulation.index');
    })->name('index');

    Route::get('internal', [InternalController::class, 'index'])->name('internal');
    Route::get('normative', [NormativeController::class, 'index'])->name('normative');

    Route::get('internal-detail/{id}', [InternalController::class, 'show'])->name('internal-detail');
    Route::get('normative-detail/{id}', [NormativeController::class, 'show'])->name('normative-detail');
});

Route::prefix('legal/regulation')->name('legal.regulation.')->group(function () {
    Route::get('/', function () {
        return View('pages.legal.regulation.index');
    })->name('index');

    Route::get('internal', [InternalController::class, 'indexLegal'])->name('internal');
    Route::get('normative', [NormativeController::class, 'indexLegal'])->name('normative');

    Route::get('internal-create', [InternalController::class, 'create'])->name('internal-create');
    Route::get('normative-create', [NormativeController::class, 'create'])->name('normative-create');

    Route::post('internal-create/post', [InternalController::class, 'store'])->name('internal-post');
    Route::post('normative-create/post', [NormativeController::class, 'store'])->name('normative-post');

    Route::get('internal-edit/{id}', [InternalController::class, 'edit'])->name('internal-edit');
    Route::post('internal-update/post/{id}', [InternalController::class, 'update'])->name('internal-update');

    Route::get('normative-edit/{id}', [NormativeController::class, 'edit'])->name('normative-edit');
    Route::post('normative-update/post/{id}', [NormativeController::class, 'update'])->name('normative-update');

    Route::get('internal-detail/{id}', [InternalController::class, 'showLegal'])->name('internal-detail');
    Route::get('normative-detail/{id}', [NormativeController::class, 'showLegal'])->name('normative-detail');
});

Route::get('/statistic', function () {
    return view('pages.legal.statistic');
})->name('statistic');




Route::get('/contact-us', function () {
    return view('pages.user.contact_us');
})->name('contact-us');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
