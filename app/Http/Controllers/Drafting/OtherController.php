<?php

namespace App\Http\Controllers\Drafting;

use App\Models\Other;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OtherController extends Controller
{
    public function index()
    {
        $table = Other::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Other::query()->where('id', auth()->user()->id);

        return view('pages.user.drafting.other.index', compact('data', 'table'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('file_director_disposition')) {
            $file = $request->file('file_director_disposition');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_director_disposition'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_internal_memo')) {
            $file = $request->file('file_internal_memo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_internal_memo'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_lease_application_form')) {
            $file = $request->file('file_lease_application_form');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_lease_application_form'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_right_owner_id_card')) {
            $file = $request->file('file_right_owner_id_card');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_right_owner_id_card'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_npwp_individual')) {
            $file = $request->file('file_npwp_individual');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_npwp_individual'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_family_card')) {
            $file = $request->file('file_family_card');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_family_card'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_marriage_certificate')) {
            $file = $request->file('file_marriage_certificate');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_marriage_certificate'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_death_certificate')) {
            $file = $request->file('file_death_certificate');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_death_certificate'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_heir_certificate')) {
            $file = $request->file('file_heir_certificate');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_heir_certificate'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_director_id_card')) {
            $file = $request->file('file_director_id_card');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_director_id_card'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_deed_of_incorporation')) {
            $file = $request->file('file_deed_of_incorporation');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_deed_of_incorporation'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_sk_menkumham')) {
            $file = $request->file('file_sk_menkumham');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_sk_menkumham'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_siup')) {
            $file = $request->file('file_siup');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_siup'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_tdp')) {
            $file = $request->file('file_tdp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_tdp'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_npwp_legal_entity')) {
            $file = $request->file('file_npwp_legal_entity');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_npwp_legal_entity'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_skd')) {
            $file = $request->file('file_skd');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_skd'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_skdu')) {
            $file = $request->file('file_skdu');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_skdu'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_certificate')) {
            $file = $request->file('file_certificate');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_certificate'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_imb')) {
            $file = $request->file('file_imb');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_imb'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_sppt')) {
            $file = $request->file('file_sppt');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_sppt'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_dp_receipt')) {
            $file = $request->file('file_dp_receipt');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_dp_receipt'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_payment_imb')) {
            $file = $request->file('file_payment_imb');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_payment_imb'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_procuration')) {
            $file = $request->file('file_procuration');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_procuration'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_previous_agreement')) {
            $file = $request->file('file_previous_agreement');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_previous_agreement'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_director_procuration')) {
            $file = $request->file('file_director_procuration');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_director_procuration'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_lease_application')) {
            $file = $request->file('file_lease_application');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_lease_application'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_lease_eligibility')) {
            $file = $request->file('file_lease_eligibility');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_lease_eligibility'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        $data['user_id'] = auth()->user()->id;

        Other::create($data);

        return redirect()->route('drafting.lease')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
    }

    public function legalCreate()
    {
        $table = Other::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Other::query()->where('id', auth()->user()->id);

        return view('pages.legal.drafting.other.index', compact('data', 'table'));
    }
}
