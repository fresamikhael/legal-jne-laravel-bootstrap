<?php

use App\Mail\MailJNE;
use App\Models\District;
use App\Models\Permit;
use App\Models\Regency;
use App\Models\User;
use App\Models\Village;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
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

Route::get('/regencies/{province_id}', function ($province_id) {
    $regency = Regency::where('province_id', $province_id)
        ->orderBy('name', 'ASC')
        ->get();

    return response()->json([
        'meta' => [
            'code' => 200,
            'message' => 'Regency by Province ID',
        ],
        'data' => $regency,
    ]);
});
Route::get('/districts/{regency_id}', function ($regency_id) {
    $district = District::where('regency_id', $regency_id)
        ->orderBy('name', 'ASC')
        ->get();

    return response()->json([
        'meta' => [
            'code' => 200,
            'message' => 'District by District ID',
        ],
        'data' => $district,
    ]);
});
Route::get('/villages/{district_id}', function ($district_id) {
    $village = Village::where('district_id', $district_id)
        ->orderBy('name', 'ASC')
        ->get();

    return response()->json([
        'meta' => [
            'code' => 200,
            'message' => 'Regency by Province ID',
        ],
        'data' => $village,
    ]);
});

Route::get('/v1/checkExpired', function () {
    $dateNow = date('Y-m-d', strtotime(Carbon::now()->addMonth(3)));
    $expired = Permit::where('expired', '<=', $dateNow)
        ->whereNull('extend')
        ->get();
    foreach ($expired as $key => $value) {
        Permit::where('id', $value->id)->update(['check_expired' => "TRUE"]);
        $email = User::where('id', $value->user_id)->firstOrFail()->email;
        $mailData = [
            'title' => 'Permit Expired',
            'body' =>
                'Permit Dengan Nomor Kasus ' .
                $value->id .
                ' Akan Expired Pada ' .
                $value->expired,
            'subject' => 'Permit Expired',
            'url' => url('/permit/perizinan-baru/detail/' . $value->id),
        ];
        Mail::to('devabdan@gmail.com')->send(new MailJNE($mailData));
        // Mail::to($email)->send(new MailJNE($mailData));
    }
    return response()->json([
        'data' => $expired,
    ]);
});
