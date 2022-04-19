<?php

namespace App\Http\Controllers\Drafting;

use App\Models\Vendor;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VendorController extends Controller
{
    public function index()
    {
        return view('pages.user.drafting.vendor');
    }

    public function store(Request $request)
    {
        $data = $request->all();

        if ($request->file('file_form_vendor')) {
            $file = $request->file('file_form_vendor');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_form_vendor'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_supporting_attachment')) {
            $file = $request->file('file_supporting_attachment');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_supporting_attachment'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_deed_of_company')) {
            $file = $request->file('file_deed_of_company');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_deed_of_company'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_nib')) {
            $file = $request->file('file_nib');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_nib'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_npwp')) {
            $file = $request->file('file_npwp');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_npwp'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_business_permit')) {
            $file = $request->file('file_business_permit');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_business_permit'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_oss_location')) {
            $file = $request->file('file_oss_location');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_oss_location'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_director_id_card')) {
            $file = $request->file('file_director_id_card');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_director_id_card'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_sk')) {
            $file = $request->file('file_sk');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_sk'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_other')) {
            $file = $request->file('file_other');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_other'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_vendor_offer')) {
            $file = $request->file('file_vendor_offer');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_vendor_offer'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_mom')) {
            $file = $request->file('file_mom');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_mom'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_dispotition')) {
            $file = $request->file('file_dispotition');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_dispotition'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_agreement_draft')) {
            $file = $request->file('file_agreement_draft');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_agreement_draft'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_customer_entity')) {
            $file = $request->file('file_customer_entity');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_customer_entity'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_sk_menkumham')) {
            $file = $request->file('file_sk_menkumham');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_sk_menkumham'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_nib2')) {
            $file = $request->file('file_nib2');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_nib2'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_npwp2')) {
            $file = $request->file('file_npwp2');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_npwp2'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_business_permit2')) {
            $file = $request->file('file_business_permit2');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_business_permit2'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_director_id_card2')) {
            $file = $request->file('file_director_id_card2');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_director_id_card2'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }
        if ($request->file('file_other2')) {
            $file = $request->file('file_other2');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_other2'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        $data['user_id'] = 'USR003';

        Vendor::create($data);

        return redirect()->route('drafting.vendor')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
    }
}
