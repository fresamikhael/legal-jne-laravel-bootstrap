<?php

namespace App\Http\Controllers\Drafting;

use App\Models\Customer;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomerController extends Controller
{
    public function index()
    {
        $table = Customer::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Customer::query()->where('id', auth()->user()->id);

        return view('pages.user.drafting.customer', compact('data', 'table'));
    }

    public function legalCreate()
    {
        $data = Customer::orderBy('id', 'DESC')
            ->with('user')
            ->get();

        return view('pages.legal.drafting.customer.index', compact('data'));
    }

    public function store(Request $request)
    {

        $data = $request->all();

        // $validatedData = $request->validate([
        //     'id' => 'required',
        //     'user_id' => 'required',
        //     'first_party' => 'required',
        //     'second_party' => 'required',
        //     'third_party' => 'required',
        //     'agreement_draft' => 'required',
        //     'addendum' => 'required',
        //     'customer_type' => 'required',
        //     'assurance_goods' => 'required',
        //     'compensation' => 'required',
        //     'start_date' => 'required',
        //     'end_date' => 'required',
        //     'discount' => 'required',
        //     'other_point' => 'required',
        //     'shipping_type' => 'required',
        //     'shipping_type_description' => 'required',
        //     'file_mom' => 'required',
        //     'file_agreement_draft' => 'required',
        //     'file_claim_form' => 'required',
        //     'file_sk_menkumham' => 'required',
        //     'file_nib' => 'required',
        //     'file_npwp' => 'required',
        //     'file_business_permit	' => 'required',
        //     'file_npwp' => 'required',
        //     'file_business_permit	' => 'required',
        //     'file_other' => 'required',
        //     'status' => 'required',
        // ]);

        if ($request->file('file_mom')) {
            $file = $request->file('file_mom');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_mom'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_agreement_draft')) {
            $file = $request->file('file_agreement_draft');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_agreement_draft'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_claim_form')) {
            $file = $request->file('file_claim_form');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_claim_form'] = 'Drafting/'.$filename;
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

        if ($request->file('file_director_id_card')) {
            $file = $request->file('file_director_id_card');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_director_id_card'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_other')) {
            $file = $request->file('file_other');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_other'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_deed_of_company')) {
            $file = $request->file('file_deed_of_company');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_deed_of_company'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_oss_location')) {
            $file = $request->file('file_oss_location');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_oss_location'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_sk')) {
            $file = $request->file('file_sk');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_sk'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        $data['user_id'] = auth()->user()->id;
        // dd($data);

        Customer::create($data);

        return redirect()->route('drafting.customer')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
    }

    public function legalStore(Request $request)
    {

        $data = $request->all();

        if ($request->file('file_mom')) {
            $file = $request->file('file_mom');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_mom'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_agreement_draft')) {
            $file = $request->file('file_agreement_draft');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_agreement_draft'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_claim_form')) {
            $file = $request->file('file_claim_form');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_claim_form'] = 'Drafting/'.$filename;
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

        if ($request->file('file_director_id_card')) {
            $file = $request->file('file_director_id_card');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_director_id_card'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_other')) {
            $file = $request->file('file_other');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_other'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_deed_of_company')) {
            $file = $request->file('file_deed_of_company');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_deed_of_company'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_oss_location')) {
            $file = $request->file('file_oss_location');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_oss_location'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        if ($request->file('file_sk')) {
            $file = $request->file('file_sk');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_sk'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        $data['user_id'] = auth()->user()->id;

        Customer::create($data);

        return redirect()->route('legal.drafting.legal-customer')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
    }

    public function userUpdate($id)
    {
        $table = Customer::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Customer::where('id', $id)->firstOrFail();
        return view('pages.user.drafting.customer-update', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function userUpdatePost(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'Reject':
                $data = $request->all();

                $item = Customer::findOrFail($id);

                $item->update([
                    $data,
                    'user_note' => $request->user_note,
                    'status' => 'USER RETURNED AGREEMENT DRAFT']);

                return redirect()->route('drafting.customer')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;

            case 'Approve':
                $data = $request->all();

                $item = Customer::findOrFail($id);

                $item->update([
                    $data,
                    'user_note' => $request->user_note,
                    'status' => 'USER APPROVED AGREEMENT DRAFT'
                ]);

                return redirect()->route('drafting.customer')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;
        }
    }

    public function userProcess($id)
    {
        $table = Customer::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Customer::where('id', $id)->firstOrFail();
        return view('pages.user.drafting.customer-process', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function userProcessPost(Request $request, $id)
    {
        $data = $request->all();

        if ($request->file('file_agreement_signature_final')) {
            $file = $request->file('file_agreement_signature_final');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_agreement_signature_final'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        $item = Customer::findOrFail($id);

        $item->update([
            $data,
            'file_agreement_signature_final' => $data['file_agreement_signature_final'],
            'user_note' => $request->user_note,
            'status' => 'USER SEND SIGNATURED FINAL AGREEMENT']);

        return redirect()->route('drafting.customer')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
    }

    public function legalProcess($id)
    {
        $table = Customer::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Customer::where('id', $id)->firstOrFail();
        return view('pages.legal.drafting.customer.process', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function legalProcessPost(Request $request, $id)
    {
        $data = $request->all();

        if ($request->file('file_agreement_signature')) {
            $file = $request->file('file_agreement_signature');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_agreement_signature'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        $item = Customer::findOrFail($id);

        $item->update([
            $data,
            'file_agreement_signature' => $data['file_agreement_signature'],
            'cb_note' => $request->cb_note,
            'status' => 'CONTRACT BUSINESS SEND AGREEMENT SIGNATURE']);

        return redirect()->route('legal.drafting.legal-customer')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
    }

    public function legalUpdate($id)
    {
        $table = Customer::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Customer::where('id', $id)->firstOrFail();
        return view('pages.legal.drafting.customer.update', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function legalFinal($id)
    {
        $table = Customer::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Customer::where('id', $id)->firstOrFail();
        return view('pages.legal.drafting.customer.final', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function legalUpdatePost(Request $request, $id)
    {
        $data = $request->all();

        if ($request->file('file_agreement_draft')) {
            $file = $request->file('file_agreement_draft');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_agreement_draft'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        $item = Customer::findOrFail($id);

        $item->update([
            $data,
            'file_agreement_draft' => $data['file_agreement_draft'],
            'cb_note' => $request->cb_note,
            'status' => 'CONTRACT BUSINESS SEND AGREEMENT DRAFT']);

        return redirect()->route('legal.drafting.legal-customer')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
    }

    public function userCheck($id)
    {
        $table = Customer::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Customer::where('id', $id)->firstOrFail();
        return view('pages.user.drafting.customer-check', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function userCheckPost(Request $request, $id)
    {
        $data = $request->all();

        if ($request->file('file_internal_memo')) {
            $file = $request->file('file_internal_memo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_internal_memo'] = 'Drafting/'.$filename;
            $file->move('Drafting', $filename);
        }

        $item = Customer::findOrFail($id);

        $item->update([
            $data,
            'file_internal_memo' => $data['file_internal_memo'],
            'user_note' => $request->user_note,
            'status' => 'RETURNED BY USER']);

        return redirect()->route('drafting.customer')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
    }

    public function legalCheck($id)
    {
        $table = Customer::orderBy('id', 'DESC')
            ->with('user')
            ->get();
        $data = Customer::where('id', $id)->firstOrFail();
        return view('pages.legal.drafting.customer.check', [
            'data' => $data,
            'table' => $table
        ]);
    }

    public function legalCheckPost(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'Reject':
                $data = $request->all();

                $item = Customer::findOrFail($id);

                $item->update([
                    $data,
                    'cb_note' => $request->cb_note,
                    'status' => 'RETURNED BY CONTRACT BUSINESS']);

                return redirect()->route('legal.drafting.legal-customer')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;

            case 'Approve':
                $data = $request->all();

                $item = Customer::findOrFail($id);

                $item->update([
                    $data,
                    'cb_note' => $request->cb_note,
                    'status' => 'APPROVED BY CONTRACT BUSINESS'
                ]);

                return redirect()->route('legal.drafting.legal-customer')->with('message_success', 'Terima kasih atas pengajuan yang telah disampaikan. Mohon untuk menunggu dikarenakan akan kami cek terlebih dahulu.');
                break;
        }
    }
}
