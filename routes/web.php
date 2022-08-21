<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FaqController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MailController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\LegalHomeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\InformationController;
use App\Http\Controllers\Drafting\LeaseController;
use App\Http\Controllers\Misc\ContactUsController;
use App\Http\Controllers\Misc\StatisticController;
use App\Http\Controllers\Drafting\VendorController;
use App\Http\Controllers\Litigation\FraudController;
use App\Http\Controllers\Litigation\OtherController;
use App\Http\Controllers\permit\NewPermitController;
use App\Http\Controllers\Database\DatabaseController;
use App\Http\Controllers\Drafting\CustomerController;
use App\Http\Controllers\permit\ProlongationController;
use App\Http\Controllers\Regulation\InternalController;
use App\Http\Controllers\Regulation\NormativeController;
use App\Http\Controllers\Regulation\RegulationController;
use App\Http\Controllers\Litigation\OutstandingController;
use App\Http\Controllers\LegalCorporate\LandSellController;
use App\Http\Controllers\Litigation\CustomerDisputeController;
use App\Http\Controllers\LegalCorporate\PowerAttorneyController;
use App\Http\Controllers\document_request\documentRequestController;
use App\Http\Controllers\Drafting\OtherController as DraftingOtherController;
use App\Http\Controllers\Cs\CustomerDisputeController as CsCustomerDisputeController;
use App\Http\Controllers\Legal\Drafting\CustomerController as DraftingCustomerController;
use App\Http\Controllers\LegalLitigation1\CustomerDisputeController as LegalLitigation1CustomerDisputeController;
use App\Http\Controllers\LegalLitigation2\CustomerDisputeController as LegalLitigation2CustomerDisputeController;
use App\Http\Controllers\LegalLitigationManager\OutstandingController as LegalLitigationManagerOutstandingController;
use App\Http\Controllers\LegalLitigationManager\CustomerDisputeController as LegalLitigationManagerCustomerDisputeController;

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

Route::prefix('drafting')->name('drafting.')->middleware(['isUser'])->group(function () {
    Route::get('/index', function () {
        return View('pages.user.drafting.index');
    })->name('index');

    Route::get('customer', [CustomerController::class, 'index'])->name('customer');
    Route::post('customer/post', [CustomerController::class, 'store'])->name('customer-post');

    Route::get('customer/check/{id}', [CustomerController::class, 'userCheck'])->name('customer-check');
    Route::post('customer/check/{id}', [CustomerController::class, 'userCheckPost'])->name('customer-check-post');
    Route::get('customer/update/{id}', [CustomerController::class, 'userUpdate'])->name('customer-update');
    Route::post('customer/update/{id}', [CustomerController::class, 'userUpdatePost'])->name('customer-update-post');
    Route::get('customer/process/{id}', [CustomerController::class, 'userProcess'])->name('customer-process');
    Route::post('customer/process/{id}', [CustomerController::class, 'userProcessPost'])->name('customer-process-post');

    Route::get('customer/final/{id}', [CustomerController::class, 'userFinal'])->name('customer-final');

    Route::get('vendor', [VendorController::class, 'index'])->name('vendor');
    Route::post('vendor/post', [VendorController::class, 'store'])->name('vendor-post');
    Route::get('vendor/check/{id}', [VendorController::class, 'userCheck'])->name('vendor-check');
    Route::post('vendor/check/{id}', [VendorController::class, 'userCheckPost'])->name('vendor-check-post');
    Route::get('vendor/update/{id}', [VendorController::class, 'userUpdate'])->name('vendor-update');
    Route::post('vendor/update/{id}', [VendorController::class, 'userUpdatePost'])->name('vendor-update-post');
    Route::get('vendor/process/{id}', [VendorController::class, 'userProcess'])->name('vendor-process');
    Route::post('vendor/process/{id}', [VendorController::class, 'userProcessPost'])->name('vendor-process-post');

    Route::get('lease', [LeaseController::class, 'index'])->name('lease');
    Route::post('lease/post', [LeaseController::class, 'store'])->name('lease-post');
    Route::get('lease/update/{id}', [LeaseController::class, 'userUpdate'])->name('lease-update');
    Route::post('lease/update/{id}', [LeaseController::class, 'userUpdatePost'])->name('lease-update-post');
    Route::get('lease/final/{id}', [LeaseController::class, 'userFinal'])->name('lease-final');

    Route::get('other', [DraftingOtherController::class, 'index'])->name('other');
    Route::post('other/post', [DraftingOtherController::class, 'store'])->name('other-post');
});

Route::prefix('legal/drafting')->name('legal.drafting.')->group(function () {
    Route::get('/index', function () {
        return View('pages.legal.drafting.index');
    })->name('index');

    Route::get('customer', [CustomerController::class, 'legalCreate'])->name('legal-customer');
    Route::post('customer/post', [CustomerController::class, 'legalStore'])->name('legal-customer-post');

    Route::get('customer/check/{id}', [CustomerController::class, 'legalCheck'])->name('legal-customer-check');
    Route::post('customer/check/{id}', [CustomerController::class, 'legalCheckPost'])->name('legal-customer-check-post');
    Route::get('customer/update/{id}', [CustomerController::class, 'legalUpdate'])->name('legal-customer-update');
    Route::post('customer/update/{id}', [CustomerController::class, 'legalUpdatePost'])->name('legal-customer-update-post');
    Route::get('customer/process/{id}', [CustomerController::class, 'legalProcess'])->name('legal-customer-process');
    Route::post('customer/process/{id}', [CustomerController::class, 'legalProcessPost'])->name('legal-customer-process-post');
    Route::get('customer/final/{id}', [CustomerController::class, 'legalFinal'])->name('legal-customer-final');

    Route::get('customer/history', [CustomerController::class, 'historyTable'])->name('legal-customer-table');

    Route::get('vendor', [VendorController::class, 'legalCreate'])->name('legal-vendor');
    Route::get('vendor/check/{id}', [VendorController::class, 'legalCheck'])->name('legal-vendor-check');
    Route::post('vendor/check/{id}', [VendorController::class, 'legalCheckPost'])->name('legal-vendor-check-post');
    Route::get('vendor/update/{id}', [VendorController::class, 'legalUpdate'])->name('legal-vendor-update');
    Route::post('vendor/update/{id}', [VendorController::class, 'legalUpdatePost'])->name('legal-vendor-update-post');
    Route::get('vendor/process/{id}', [VendorController::class, 'legalProcess'])->name('legal-vendor-process');
    Route::post('vendor/process/{id}', [VendorController::class, 'legalProcessPost'])->name('legal-vendor-process-post');
    Route::get('vendor/final/{id}', [VendorController::class, 'legalFinal'])->name('legal-vendor-final');

    Route::get('lease', [LeaseController::class, 'legalCreate'])->name('legal-lease');
    Route::post('lease/post', [LeaseController::class, 'store'])->name('legal-lease-post');
    Route::get('lease/check/{id}', [LeaseController::class, 'legalCheck'])->name('legal-lease-check');
    Route::post('lease/check/{id}', [LeaseController::class, 'legalCheckPost'])->name('legal-lease-check-post');
    Route::get('lease/update/{id}', [LeaseController::class, 'legalUpdate'])->name('legal-lease-update');
    Route::post('lease/update/{id}', [LeaseController::class, 'legalUpdatePost'])->name('legal-lease-update-post');
    Route::get('lease/process/{id}', [LeaseController::class, 'legalProcess'])->name('legal-lease-process');
    Route::post('lease/process/{id}', [LeaseController::class, 'legalProcessPost'])->name('legal-lease-process-post');

    Route::get('other', [DraftingOtherController::class, 'legalCreate'])->name('legal-other');
});

Route::prefix('litigation')->name('litigation.')->middleware(['isUser'])->group(function () {
    Route::get('/index', function () {
        return View('pages.user.litigation.index');
    })->name('index');

    Route::prefix('customer-dispute')->name('customer-dispute.')->controller(CustomerDisputeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
    });

    Route::prefix('fraud')->name('fraud.')->controller(FraudController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
    });

    Route::prefix('outstanding')->name('outstanding.')->controller(OutstandingController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}', 'showPost')->name('show-post');
        Route::get('update/{id}', 'update')->name('update');
        Route::post('update/{id}', 'updatePost')->name('update-post');
    });

    Route::prefix('other')->name('other.')->controller(OtherController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::post('/', 'store')->name('store');
        Route::get('/{id}', 'show')->name('show');
    });
});

Route::prefix('legal/litigation')->middleware(['isLegal'])->name('legal.litigation.')->group(function () {
    Route::get('/', function () {
        return View('pages.legal.litigation.index');
    })->name('index');

    Route::prefix('customer-dispute')->name('customer-dispute.')->controller(CustomerDisputeController::class)->group(function () {
        Route::get('/', 'indexLegal')->name('index');
        Route::post('/', 'storeLegal')->name('store');
        Route::get('/{id}', 'showLegal')->name('show');
        Route::post('/finish/{id}', 'finishLegal')->name('finish');
    });

    Route::prefix('outstanding')->name('outstanding.')->controller(OutstandingController::class)->group(function () {
        Route::get('/', 'indexLegal')->name('index');
        Route::post('/', 'storeLegal')->name('store');
        Route::get('/{id}', 'showLegal')->name('show');
        Route::post('/{id}', 'showLegalPost')->name('showPost');
        Route::get('progress/{id}', 'progressLegal')->name('progress');
        Route::post('progress/{id}', 'progressLegalPost')->name('progress-post');
        Route::get('update/{id}', 'updateLegal')->name('update');
        Route::post('update/{id}', 'updateLegalPost')->name('update-post');
        Route::get('/finish/{id}', 'finishLegal')->name('finish');
        Route::post('/finish/{id}', 'finishLegalPost')->name('finish-post');
    });
});

Route::prefix('cs')->name('cs.')->middleware(['isCs'])->group(function () {
    Route::get('/', function () {
        return View('pages.cs.index');
    })->name('index');

    Route::prefix('customer-dispute')->name('customer-dispute.')->controller(CsCustomerDisputeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}', 'store')->name('store');
        Route::post('/finish/{id}', 'finish')->name('finish');
        Route::post('/close/{id}', 'close')->name('close');
    });
});

Route::prefix('legal-litigation-1')->middleware(['isLiti1'])->name('legal-litigation-1.')->group(function () {
    Route::get('/', function () {
        return View('pages.legal-litigation-1.index');
    })->name('index');

    Route::prefix('customer-dispute')->name('customer-dispute.')->controller(LegalLitigation1CustomerDisputeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}', 'store')->name('store');
    });
});

Route::prefix('legal-litigation-2')->middleware(['isLiti2'])->name('legal-litigation-2.')->group(function () {
    Route::get('/', function () {
        return View('pages.legal-litigation-2.index');
    })->name('index');

    Route::prefix('customer-dispute')->name('customer-dispute.')->controller(LegalLitigation2CustomerDisputeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}', 'store')->name('store');
    });
});

Route::prefix('legal-litigation-manager')->middleware(['isLitiManager'])->name('legal-litigation-manager.')->group(function () {
    Route::get('/', function () {
        return View('pages.legal-litigation-manager.index');
    })->name('index');

    Route::prefix('customer-dispute')->name('customer-dispute.')->controller(LegalLitigationManagerCustomerDisputeController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}', 'store')->name('store');
    });

    Route::prefix('outstanding')->name('outstanding.')->controller(LegalLitigationManagerOutstandingController::class)->group(function () {
        Route::get('/', 'index')->name('index');
        Route::get('/{id}', 'show')->name('show');
        Route::post('/{id}', 'store')->name('store');
    });
});

Route::prefix('information')->name('information.')->middleware('guest')->group(function () {
    Route::get('/', [InformationController::class, 'index'])->name('index');
    Route::get('detail/{id}', [InformationController::class, 'show'])->name('show');

});

Route::prefix('legal/information')->name('legal.information.')->group(function () {
    Route::get('/', [InformationController::class, 'indexLegal'])->name('index');
    Route::get('detail/{id}', [InformationController::class, 'showLegal'])->name('show');
    Route::get('detail/delete/{id}', [InformationController::class, 'delete'])->name('delete');

    Route::get('add', [InformationController::class, 'add'])->name('add');
    Route::post('add', [InformationController::class, 'store'])->name('store');
    Route::get('edit/{id}', [InformationController::class, 'edit'])->name('edit');
    Route::post('edit/{id}', [InformationController::class, 'update'])->name('update');
});

Route::prefix('permit')->name('permit.')->middleware(['isUser'])->controller(NewPermitController::class)->group(function () {
    // Route::get('/', function () {
    //     return View('pages.user.permit.index');
    // })->name('index');

    Route::get('/dashboard', 'home')->name('index');

    Route::get('perizinan-baru',  'index')->name('newpermit');
    Route::post('perizinan-baru/post',  'store')->name('newpermit-post');
    Route::get('perizinan-baru/detail/{id}',  'detail')->name('detail');
    Route::get('perizinan-baru/edit/{id}',  'edit')->name('edit');
    Route::post('perizinan-baru/update/{id}',  'update')->name('update');
    Route::get('perizinan-baru/konfirmasi_skpd/{id}',  'confirm_skpd')->name('confirm_skpd');
    Route::post('perizinan-baru/konfirmasi_skpd/post/{id}',  'confirm_skpd_update')->name('confirm_skpd_update');


    // Route::post('perizinan-baru/post', [NewPermitController::class, 'store'])->name('perizinan-baru-post');
    Route::get('perpanjangan',  'index')->name('prolongation');
});

Route::prefix('legal/permit')->name('legal.permit.')->controller(NewPermitController::class)->group(function () {
    Route::get('/', function () {
        return View('pages.legal.permit.index');
    })->name('index');

    Route::get('perizinan-baru',  'index_legal')->name('newpermit');
    Route::post('perizinan-baru/post',  'store_legal')->name('newpermit-post');

    Route::get('perizinan-baru/check/{id}', 'check_legal')->name('check');
    Route::post('perizinan-baru/check/post/{id}',  'store_check_legal')->name('check-post');

    Route::get('perizinan-baru/detail/{id}',  'detail_legal')->name('detail');
    Route::get('perizinan-baru/edit/skpd/{id}',  'upload_skpd_legal')->name('upload_skpd');
    Route::post('perizinan-baru/update/{id}',  'update_legal')->name('update');
    Route::get('perizinan-baru/upload/invoice-skpd/{id}',  'upload_skpd_invoice_legal')->name('upload_skpd_invoice');
    Route::post('perizinan-baru/update_invoice/{id}',  'update_invoice_legal')->name('update_invoice');
    Route::get('perizinan-baru/konfirmasi_skpd/{id}',  'confirm_skpd_legal')->name('confirm_skpd');
    Route::post('perizinan-baru/konfirmasi_skpd/post/{id}',  'confirm_skpd_update_legal')->name('confirm_skpd_update');
    // Route::post('perizinan-baru/post', [NewPermitController::class, 'store'])->name('perizinan-baru-post');

});

Route::prefix('permit/perpanjangan-perizinan')->name('perpanjangan.')->controller(ProlongationController::class)->group(
    function () {
        Route::get('/', 'index')->name('prolongation');
        Route::get('/detail/{id}', 'detail')->name('detail');
        Route::get('check/{id}', 'check_perpanjangan')->name('prolongation-check');
        // Route::get('check/unxtended/{id}', 'check_unxtended')->name('unxtended');
        Route::post('check/update/{id}',  'store_check_perpanjangan')->name('perpanjangan-check-update');
        Route::get('konfirmasi_skpd/{id}',  'confirm_skpd')->name('confirm_skpd');
        Route::post('konfirmasi_skpd/post/{id}',  'confirm_skpd_update')->name('confirm_skpd_update');
    }
);

Route::prefix('legal/permit/perpanjangan-perizinan')->name('legal.perpanjangan.')->controller(ProlongationController::class)->group(
    function () {
        Route::get('/', 'index_legal')->name('prolongation');
        Route::get('/detail/{id}', 'detail_legal')->name('detail');
        Route::get('check/upload_tanda_terima/{id}', 'upload_tanda_terima_legal')->name('upload-tanda-terima');
        Route::post('check/upload_tanda_terima/update/{id}',  'store_upload_tanda_terima_legal')->name('upload-tanda-terima-update');
        Route::get('upload/skpd/{id}',  'upload_skpd_legal')->name('upload_skpd');
        Route::post('update/{id}',  'update_skpd_legal')->name('update');
        Route::get('upload/invoice-skpd/{id}',  'upload_skpd_invoice_legal')->name('upload_skpd_invoice');
        Route::post('update_invoice/{id}',  'update_invoice_legal')->name('update_invoice');
    }
);

Route::prefix('request_document')->name('document_request.')->middleware(['isUser'])->controller(documentRequestController::class)->group(function () {
    // Route::get('/', function () {
    //     return View('pages.user.document_request.index');
    // })->name('index');

    Route::get('/dashboard', 'home')->name('home');
    Route::get('/', 'index')->name('form');
    Route::post('/post',  'store')->name('post');
    Route::get('/detail/{id}', 'detail')->name('detail');
});

Route::prefix('legal/request_document')->name('legal.document_request.')->controller(documentRequestController::class)->group(function () {
    // Route::get('/', function () {
    //     return View('pages.user.document_request.index');
    // })->name('index');

    // Route::get('/', 'home_legal')->name('home');
    Route::get('/', 'index_legal')->name('form');
    Route::post('/post',  'store_legal')->name('post');
    Route::get('/check/{id}', 'check_legal')->name('check');
    Route::post('/check/post/{id}', 'check_legal_store')->name('checkpost');
    Route::get('/detail/{id}', 'detail_legal')->name('detail');
    Route::get('/update/hard_copy/{id}', 'update_legal_hard')->name('updatehard');
    Route::get('/update/soft_copy/{id}', 'update_legal_soft')->name('updatesoft');
    Route::post('/update/hard_copy/post/{id}', 'update_legal_hard_store')->name('updateposthard');
    Route::post('/update/soft_copy/post/{id}', 'update_legal_soft_store')->name('updatepostsoft');
    Route::get('/update/out/{id}', 'update_legal_out')->name('updatedoc_out');
    Route::get('/update/in/{id}', 'update_legal_in')->name('updatedoc_in');
    Route::post('/update/out/post/{id}', 'update_legal_out_store')->name('updatedoc_out_post');
    Route::post('/update/in/post/{id}', 'update_legal_in_store')->name('updatedoc_in_post');
});

Route::prefix('regulation')->name('database.')->middleware('guest')->controller(DatabaseController::class)->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('/index?_token=3jETrc685fSwjb69QnJU5WzOFZ0Wvn7vLxoOxgAR&privilege=ALL&type=&number=&year=&title=', 'indexLegal')->name('index-all');
    Route::get('/index?_token=3jETrc685fSwjb69QnJU5WzOFZ0Wvn7vLxoOxgAR&privilege=RESTRICTED&type=&number=&year=&title=', 'indexLegal')->name('index-internal');
    Route::get('tambah', 'add')->name('add');
    Route::get('detail/{id}', 'show')->name('show');
    Route::post('/request/public', 'requestPublicPost')->name('public-request-post');
});

Route::prefix('legal/regulation')->name('legal.database.')->controller(DatabaseController::class)->group(function () {
    Route::get('/index', 'indexLegal')->name('index');
    Route::get('/index?_token=3jETrc685fSwjb69QnJU5WzOFZ0Wvn7vLxoOxgAR&privilege=ALL&type=&number=&year=&title=', 'indexLegal')->name('index-all');
    Route::get('/index?_token=3jETrc685fSwjb69QnJU5WzOFZ0Wvn7vLxoOxgAR&privilege=RESTRICTED&type=&number=&year=&title=', 'indexLegal')->name('index-internal');
    Route::get('/request/index', 'indexRequestLegal')->name('request-index');
    Route::get('tambah', 'add')->name('add');
    Route::post('tambah', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update/{id}', 'update')->name('update');
    Route::get('detail/{id}', 'legalShow')->name('show');
    Route::get('delete/{id}', 'delete')->name('delete');

    Route::get('add-type', 'addType')->name('add-type');
    Route::post('add-type/post', 'storeType')->name('store-type');
    Route::get('delete-type/{id}', 'deleteType')->name('delete-type');
});

Route::prefix('legal/user')->name('legal.user.')->controller(UserController::class)->group(function () {
    Route::get('/index', 'index')->name('index');
    Route::get('tambah', 'add')->name('add');
    Route::post('tambah', 'store')->name('store');
    Route::get('edit/{id}', 'edit')->name('edit');
    Route::post('update/{id}', 'update')->name('update');
    Route::get('detail/{id}', 'legalShow')->name('show');
    Route::get('delete/{id}', 'delete')->name('delete');

    Route::get('add-type', 'addType')->name('add-type');
    Route::post('add-type/post', 'storeType')->name('store-type');
    Route::get('delete-type/{id}', 'deleteType')->name('delete-type');
});

Route::get('/', [HomeController::class, 'index'])->middleware('guest')->name('home');

Route::get('/legal', [LegalHomeController::class, 'index'])->middleware('isLegal')->name('legal-home');
Route::get('/legal/top', [LegalHomeController::class, 'topEdit'])->middleware('isLegal')->name('top-home');
Route::post('/legal/top', [LegalHomeController::class, 'topStore'])->middleware('isLegal')->name('top-home-store');
Route::get('/legal/middle', [LegalHomeController::class, 'middleEdit'])->middleware('isLegal')->name('middle-home');
Route::post('/legal/middle', [LegalHomeController::class, 'middleStore'])->middleware('isLegal')->name('middle-home-store');
Route::get('/legal/below', [LegalHomeController::class, 'belowEdit'])->middleware('isLegal')->name('below-home');
Route::post('/legal/below', [LegalHomeController::class, 'belowStore'])->middleware('isLegal')->name('below-home-store');
Route::get('/legal/foot', [LegalHomeController::class, 'footEdit'])->middleware('isLegal')->name('foot-home');
Route::post('/legal/foot', [LegalHomeController::class, 'footStore'])->middleware('isLegal')->name('foot-home-store');

Route::get('/login', function () {
    return view('auth.login');
})->name('login');

Route::get('/register', function () {
    return view('auth.register');
})->name('register');

Route::post('/login', [LoginController::class, 'login'])->name('login-attempt');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('download')->name('download.')->controller(DownloadController::class)->group(function () {
    Route::get('/permit/{path}', 'downloadPermit')->name('permit');
    Route::get('/litigation/{path}', 'downloadLitigation')->name('litigation');
    Route::get('/drafting/{path}', 'downloadDrafting')->name('drafting');
    Route::get('/regulation/{path}', 'downloadRegulation')->name('regulation');
    Route::get('/documentrequest/{path}', 'downloadDocumentRequest')->name('DR');
    Route::get('/landsell/{path}', 'downloadLandSell')->name('landsell');
    Route::get('/powerattorney/{path}', 'downloadPowerAttorney')->name('powerattorney');
});

Route::prefix('legalcorporate')->name('legalcorporate.')->middleware(['isUser'])->group(function () {
    Route::get('/index', function () {
        return View('pages.user.legal-corporate.index');
    })->name('index');

    Route::get('landsell', [LandSellController::class, 'index'])->name('landsell');
    Route::get('powerattorney', [PowerAttorneyController::class, 'index'])->name('powerattorney');
    Route::post('landsell/post', [LandSellController::class, 'store'])->name('landsell-post');
    Route::post('powerattorney/post', [PowerAttorneyController::class, 'store'])->name('powerattorney-post');

    Route::get('powerattorney/check/{id}', [PowerAttorneyController::class, 'userCheck'])->name('powerattorney-check');
    Route::post('powerattorney/check/{id}', [PowerAttorneyController::class, 'userCheckPost'])->name('powerattorney-check-post');

    Route::get('landsell/check/{id}', [LandSellController::class, 'userCheck'])->name('landsell-check');
    Route::post('landsell/check/{id}', [LandSellController::class, 'userCheckPost'])->name('landsell-check-post');

    Route::get('landsell/final/{id}', [LandSellController::class, 'userFinal'])->name('landsell-final');
    Route::get('powerattorney/final/{id}', [PowerAttorneyController::class, 'legalFinal'])->name('powerattorney-final');
});

Route::prefix('legal/legalcorporate')->name('legal.legalcorporate.')->group(function () {
    Route::get('/index', function () {
        return View('pages.legal.legal-corporate.index');
    })->name('index');

    Route::get('landsell', [LandSellController::class, 'legalIndex'])->name('landsell');
    Route::get('powerattorney', [PowerAttorneyController::class, 'legalIndex'])->name('powerattorney');
    Route::post('landsell/post', [LandSellController::class, 'store'])->name('landsell-post');
    Route::post('powerattorney/post', [PowerAttorneyController::class, 'store'])->name('powerattorney-post');

    Route::get('powerattorney/check/{id}', [PowerAttorneyController::class, 'legalCheck'])->name('powerattorney-check');
    Route::post('powerattorney/check/{id}', [PowerAttorneyController::class, 'legalCheckPost'])->name('powerattorney-check-post');

    Route::get('landsell/check/{id}', [LandSellController::class, 'legalCheck'])->name('landsell-check');
    Route::post('landsell/check/{id}', [LandSellController::class, 'legalCheckPost'])->name('landsell-check-post');

    Route::get('powerattorney/update/{id}', [PowerAttorneyController::class, 'legalUpdate'])->name('powerattorney-update');
    Route::post('powerattorney/update/{id}', [PowerAttorneyController::class, 'legalUpdatePost'])->name('powerattorney-update-post');

    Route::get('landsell/final/{id}', [LandSellController::class, 'legalFinal'])->name('landsell-final');
    Route::get('powerattorney/final/{id}', [PowerAttorneyController::class, 'legalFinal'])->name('powerattorney-final');
});

Route::get('/service', function () {
    return view('pages.user.service.index');
})->name('service.index');

Route::get('/legal/service', function () {
    return view('pages.legal.service.index');
})->name('legal.service.index');

Route::get('/headlegal', function () {
    return view('pages.head-legal.index');
})->name('headlegal');

Route::prefix('headlegal/legalcorporate')->name('headlegal.legalcorporate.')->group(function () {
    Route::get('/index', function () {
        return View('pages.head-legal.legal-corporate.index');
    })->name('index');

    Route::get('powerattorney', [PowerAttorneyController::class, 'headlegalIndex'])->name('powerattorney');

    Route::get('powerattorney/check/{id}', [PowerAttorneyController::class, 'headlegalCheck'])->name('powerattorney-check');
    Route::post('powerattorney/check/{id}', [PowerAttorneyController::class, 'headlegalCheckPost'])->name('powerattorney-check-post');
});

Route::prefix('database')->name('regulation.')->middleware('guest')->group(function () {
    Route::get('/index', [RegulationController::class, 'index'])->name('index');
    Route::get('/index?_token=Gjc9TMwUYKV7Pvw7F036HtvHakVE0bIl96epNYdH&type=&unit=Drafting&number=&date=&about=', [RegulationController::class, 'index'])->name('index-drafting');
    Route::get('/index?_token=Gjc9TMwUYKV7Pvw7F036HtvHakVE0bIl96epNYdH&type=&unit=Litigation&number=&date=&about=', [RegulationController::class, 'index'])->name('index-litigation');
    Route::get('/index?_token=Gjc9TMwUYKV7Pvw7F036HtvHakVE0bIl96epNYdH&type=&unit=Permit&number=&date=&about=', [RegulationController::class, 'index'])->name('index-permit');
    Route::get('/index?_token=Gjc9TMwUYKV7Pvw7F036HtvHakVE0bIl96epNYdH&type=&unit=Corporate&number=&date=&about=', [RegulationController::class, 'index'])->name('index-corporate');
    Route::get('/request', [RegulationController::class, 'requestDocument'])->name('request');
    Route::post('/request',  [RegulationController::class, 'requestDocumentPost'])->name('request-post');
    Route::post('/request/public',  [RegulationController::class, 'requestPublicPost'])->name('public-request-post');
    Route::get('/request/detail/{id}', [RegulationController::class, 'requestDocumentDetail'])->name('request-detail');

    Route::get('/detail/{id}', [RegulationController::class, 'show'])->name('detail');

    Route::get('internal', [InternalController::class, 'index'])->name('internal');
    Route::get('normative', [NormativeController::class, 'index'])->name('normative');

    Route::get('internal-detail/{id}', [InternalController::class, 'show'])->name('internal-detail');
    Route::get('normative-detail/{id}', [NormativeController::class, 'show'])->name('normative-detail');
});

Route::prefix('legal/database')->name('legal.regulation.')->group(function () {
    Route::get('/', [RegulationController::class, 'indexLegal'])->name('index');
    Route::get('?_token=M08lAA6HOXA9qftoHxjiYvfv9Y24TvC9KzQE0680&privilege=&unit=Drafting&number=&date=&title=', [RegulationController::class, 'index'])->name('index-drafting');
    Route::get('?_token=M08lAA6HOXA9qftoHxjiYvfv9Y24TvC9KzQE0680&privilege=&unit=Litigation&number=&date=&title=', [RegulationController::class, 'index'])->name('index-litigation');
    Route::get('?_token=M08lAA6HOXA9qftoHxjiYvfv9Y24TvC9KzQE0680&privilege=&unit=Permit&number=&date=&title=', [RegulationController::class, 'index'])->name('index-permit');
    Route::get('?_token=M08lAA6HOXA9qftoHxjiYvfv9Y24TvC9KzQE0680&privilege=&unit=Corporate&number=&date=&title=', [RegulationController::class, 'index'])->name('index-corporate');
    Route::get('/request/index', [RegulationController::class, 'indexRequestLegal'])->name('request-index');
    Route::get('/add', [RegulationController::class, 'add'])->name('add');

    Route::get('/detail/{id}', [RegulationController::class, 'showLegal'])->name('detail');

    Route::get('/request', [RegulationController::class,'legalRequestDocument'])->name('request');
    Route::get('/request/check/{id}', [RegulationController::class, 'legalCheckRequest'])->name('request-check');
    Route::post('/request/check/post/{id}', [RegulationController::class,'legalCheckRequestPost'])->name('request-check-post');
    Route::get('/request/detail/{id}', [RegulationController::class, 'legalDetailRequest'])->name('request-detail');
    Route::post('/request/detail/post/{id}', [RegulationController::class,'legalDetailkRequestPost'])->name('request-detail-post');
    Route::get('/request/update/{id}', [RegulationController::class, 'legalUpdateRequest'])->name('request-update');
    Route::post('/request/update/post/{id}', [RegulationController::class,'legalUpdateRequestPost'])->name('request-update-post');
    Route::post('/request/finish/{id}', [RegulationController::class,'legalFinishRequest'])->name('request-finish');

    Route::get('internal', [InternalController::class, 'indexLegal'])->name('internal');
    Route::get('normative', [NormativeController::class, 'indexLegal'])->name('normative');

    Route::get('internal-create', [InternalController::class, 'create'])->name('internal-create');
    Route::get('normative-create', [NormativeController::class, 'create'])->name('normative-create');

    Route::post('internal-create/post', [InternalController::class, 'store'])->name('internal-post');
    Route::post('normative-create/post', [NormativeController::class, 'store'])->name('normative-post');

    Route::get('public-edit/{id}', [InternalController::class, 'edit'])->name('public-edit');
    Route::post('public-update/post/{id}', [InternalController::class, 'update'])->name('public-update');

    Route::get('special-edit/{id}', [NormativeController::class, 'edit'])->name('special-edit');
    Route::post('special-update/post/{id}', [NormativeController::class, 'update'])->name('special-update');

    Route::get('internal-detail/{id}', [InternalController::class, 'showLegal'])->name('internal-detail');
    Route::get('normative-detail/{id}', [NormativeController::class, 'showLegal'])->name('normative-detail');

    Route::get('add-type', [RegulationController::class, 'addType'])->name('add-type');
    Route::post('add-type/post', [RegulationController::class, 'storeType'])->name('store-type');
    Route::get('edit-type/{id}', [RegulationController::class, 'editType'])->name('edit-type');
    Route::post('edit-type/post/{id}', [RegulationController::class, 'updateType'])->name('update-type');
    Route::get('delete-type/{id}', [RegulationController::class, 'deleteType'])->name('delete-type');
    Route::get('delete/{id}', [RegulationController::class, 'delete'])->name('delete');
});

Route::get('legal/statistic', [StatisticController::class, 'index'])->name('statistic');
Route::get('legal/statistic/database', [StatisticController::class, 'databaseIndex'])->name('statistic-database');
Route::get('legal/statistic/drafting', [StatisticController::class, 'draftingIndex'])->name('statistic-drafting');
Route::get('legal/statistic/litigation', [StatisticController::class, 'litigationIndex'])->name('statistic-litigation');
Route::get('legal/statistic/permit', [StatisticController::class, 'permitIndex'])->name('statistic-permit');
Route::get('legal/statistic/corporate', [StatisticController::class, 'corporateIndex'])->name('statistic-corporate');
Route::get('legal/statistic/request', [StatisticController::class, 'requestIndex'])->name('statistic-request');

Route::get('/contact-us', function () {
    return view('pages.user.contact_us');
})->name('contact-us');


Route::get('/faq', [FaqController::class, 'index'])->middleware('guest')->name('faq-index');
Route::get('/faq/{id}', [FaqController::class, 'show'])->middleware('guest')->name('faq-show');
Route::get('legal/faq/{id}', [FaqController::class, 'showLegal'])->name('legal.faq-show');

Route::get('legal/faq', [FaqController::class, 'indexLegal'])->name('legal.faq-index');
Route::get('legal/faq/create', [FaqController::class, 'createLegal'])->name('legal.faq-create');
Route::post('legal/faq/store', [FaqController::class, 'storeLegal'])->name('legal.faq-store');
Route::get('legal/faq/{id}', [FaqController::class, 'showLegal'])->name('legal.faq-show');

Route::get('/contact-us', [ContactUsController::class, 'user'])->middleware('guest')->name('contact-us');
Route::get('legal/contact-us', [ContactUsController::class, 'index'])->name('legal.contact-us');

Route::get('legal/contact-us/edit', [ContactUsController::class, 'edit'])->name('legal.contact-us-edit');

Route::post('legal/contact-us/store', [ContactUsController::class, 'store'])->name('legal.contact-us-store');

Auth::routes();

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
