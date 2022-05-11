<?php

namespace App\Http\Controllers\LegalCorporate;

use App\Models\LandSell;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LandSellController extends Controller
{
    public function index()
    {
        return view('pages.user.legal-corporate.jual-beli-tanah.index');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('file_advice_planning')) {
            $file = $request->file('file_advice_planning');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_advice_planning'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_kjjp')) {
            $file = $request->file('file_kjjp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_kjjp'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_bca')) {
            $file = $request->file('file_bca');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_bca'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_disposition')) {
            $file = $request->file('file_disposition');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_disposition'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_ownership_proof')) {
            $file = $request->file('file_ownership_proof');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ownership_proof'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_imb')) {
            $file = $request->file('file_imb');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_imb'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_sppt')) {
            $file = $request->file('file_sppt');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_sppt'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_im')) {
            $file = $request->file('file_im');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_im'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_purchase')) {
            $file = $request->file('file_purchase');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_purchase'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        // {}

        if ($request->file('file_ktp')) {
            $file = $request->file('file_ktp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_ktp'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_npwp')) {
            $file = $request->file('file_npwp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_npwp'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_marriage')) {
            $file = $request->file('file_marriage');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_marriage'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_kk')) {
            $file = $request->file('file_kk');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_kk'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_bpjs')) {
            $file = $request->file('file_bpjs');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_bpjs'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_death_statement')) {
            $file = $request->file('file_death_statement');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_death_statement'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_legal_heir')) {
            $file = $request->file('file_legal_heir');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_legal_heir'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_heir_id')) {
            $file = $request->file('file_heir_id');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_heir_id'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_heir_npwp')) {
            $file = $request->file('file_heir_npwp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_heir_npwp'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        // {}

        if ($request->file('file_legal_corp')) {
            $file = $request->file('file_legal_corp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_legal_corp'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_sk')) {
            $file = $request->file('file_sk');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_sk'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_director_id')) {
            $file = $request->file('file_director_id');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_director_id'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_legal_npwp')) {
            $file = $request->file('file_legal_npwp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_legal_npwp'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_nib')) {
            $file = $request->file('file_nib');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_nib'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_business_permit')) {
            $file = $request->file('file_business_permit');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_business_permit'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_pb_umku')) {
            $file = $request->file('file_pb_umku');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_pb_umku'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_location_permit')) {
            $file = $request->file('file_location_permit');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_location_permit'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        if ($request->file('file_npwp_card')) {
            $file = $request->file('file_npwp_card');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_npwp_card'] = 'LandSell/'.$filename;
            $file->move('LandSell', $filename);
        }

        LandSell::create($data);

        return redirect()->route('legalcorporate.landsell')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu, mohon untuk dapat memeriksa pengajuan secara berkala.');
    }
}
