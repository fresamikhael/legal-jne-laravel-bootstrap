<?php

namespace App\Http\Controllers\Regulation;

use App\Models\User;
use App\Models\Regulation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\RegulationType;
use App\Models\RegulationUnit;
use App\Models\DatabaseRequest;
use App\Models\DatabaseRequestFile;
use App\Http\Controllers\Controller;
use App\Models\DatabasePublicRequest;
use Illuminate\Support\Facades\Redirect;

class RegulationController extends Controller
{
    public function index()
    {
        $database = Regulation::orderBy('name', 'ASC')
            ->filter(request(['privilege', 'unit', 'name', 'number', 'type', 'date', 'about']))
            // ->where('privilege', 'ALL')
            ->paginate(10);
        $all = Regulation::orderBy('name', 'ASC')
            ->filter(request(['privilege', 'unit', 'name', 'number', 'type', 'date', 'about']))
            ->where('privilege', 'ALL')
            ->paginate(10);
        $type = RegulationType::query()->where('type', 'Khusus')->get();
        $total = Regulation::query()->where('type', 'Peraturan Presiden')->get()->count();
        $allData = Regulation::all()->countBy('type');

        return view('pages.user.regulation.index',compact('database', 'type', 'all', 'total', 'allData'));
    }

    public function indexLegal()
    {
        $allData = Regulation::all()->countBy('type');
        $database = Regulation::orderBy('name', 'ASC')
            ->filter(request(['privilege', 'unit', 'name', 'number','type', 'date', 'about']))
            ->paginate(10);
        $type = RegulationType::query()->where('type', 'Khusus')->get();
        $total = Regulation::query()->where('type', 'Peraturan Presiden')->get()->count();

        return view('pages.legal.regulation.index',compact('database', 'type', 'total','allData'));
    }

    public function indexRequestLegal()
    {
        $data = DatabasePublicRequest::with('database')->get();

        return view('pages.legal.regulation.request',compact('data'));
    }

    public function add()
    {
        return view('pages.legal.regulation.add');
    }

    public function show($id)
    {
        $database = Regulation::where('id', $id)
            ->with('data')->first();

        return view('pages.user.regulation.detail', compact('database'));
    }

    public function showLegal($id)
    {
        $database = Regulation::where('id', $id)
            ->with('data')->first();

        return view('pages.legal.regulation.detail', compact('database'));
    }

    public function requestDocument()
    {
        $check_document = DatabaseRequest::select('*')->count();

        if ($check_document === 0) {
            $no_kasus = 'DR' . '0001';
        } else {
            $item = $check_document + 1;
            if ($item < 10) {
                $no_kasus = 'CS' . '000' . $item;
            } elseif ($item >= 10 && $item <= 99) {
                $no_kasus = 'CS' . '00' . $item;
            } elseif ($item >= 100 && $item <= 999) {
                $no_kasus = 'CS' . '0' . $item;
            } elseif ($item >= 1000 && $item <= 9999) {
                $no_kasus = 'CS' . $item;
            }
        }

        $data = DatabaseRequest::where('user_id', auth()->user()->id)
            ->get();

        return view('pages.user.regulation.request', compact(['data', 'no_kasus']));
    }

    public function requestDocumentPost(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'request_document_reason' => 'required'
        ]);

        $document = DatabaseRequest::create([
            'request_document_reason' => $request->request_document_reason,
            'user_id' => $request->user_id,
        ]);
        $document_name = $request->document_name;
        $dt = $request->document_type;

        $i = 0;

        foreach ($document_name as $dn) {
            $dr = DatabaseRequestFile::create([
                'document_id' => $document->id,
                'document_name' => $dn,
                'document_type' => $dt[$i],
            ]);
            $dr->save();
            $i++;
        }

        return redirect()->route('regulation.request')->with('message_success', 'Dokumen berhasil Diajukan!.');
    }

    public function requestDocumentDetail($id)
    {
        $data = DatabaseRequest::where('id', $id)
            ->firstOrfail();
        $file = DatabaseRequestFile::where('document_id', $data->id)->with('database')->get();
        $user = User::query()->where('id', $data->user_id)->firstOrfail();
        // $user_id = $data->user_id;
        return View('pages.user.regulation.detailRequest', [
            'data' => $data,
            'user' => $user,
            'file' => $file,
        ]);
    }

    public function legalRequestDocument()
    {
        $data = DatabaseRequest::orderBy('id', 'DESC')
            ->get();

        return view('pages.legal.regulation.request.index', compact('data'));
    }

    public function legalCheckRequest($id)
    {
        $data = DatabaseRequest::where('id', $id)
            ->firstOrfail();
        $file = DatabaseRequestFile::where('document_id', $data->id)->get();
        $user = User::query()->where('id', $data->user_id)->firstOrfail();

        return view('pages.legal.regulation.request.check', [
            'data' => $data,
            'user' => $user,
            'file' => $file,
        ]);
    }

    public function legalCheckRequestPost(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'return':
                // $data = $request->all();
                $data = $request->validate([
                    // 'id' => 'required',
                    // 'legal_id' => 'required',
                    'note' => 'required',
                    // 'status' => 'required'
                ]);

                // $regulation = Regulation::where('id', $id)->firstOrFail();
                // 'status' => 'RETURN'
                $data['status'] = 'RETURN';
                $item = DatabaseRequest::where('id', $id)->firstOrFail();

                $item->update($data);

                return redirect()->route('legal.regulation.request');
            break;

            case 'approve':
                $data['status'] = 'IN PROGRESS';

                $item = DatabaseRequest::where('id', $id)->firstOrFail();

                $item->update($data);

                return redirect()->route('legal.regulation.request');
            break;
        }
    }

    public function legalFinishRequest(Request $request, $id)
    {
        $data['status'] = 'FINISH';

        $item = DatabaseRequest::where('id', $id)->firstOrFail();

        $item->update($data);

        return redirect()->route('legal.regulation.request');
    }

    public function legalDetailRequest($id)
    {
        $data = DatabaseRequest::where('id', $id)
            ->firstOrfail();
        $file = DatabaseRequestFile::where('document_id', $data->id)->get();
        $user = User::query()->where('id', $data->user_id)->firstOrfail();

        return view('pages.legal.regulation.request.detail', [
            'data' => $data,
            'user' => $user,
            'file' => $file,
        ]);
    }

    public function legalUpdateRequest($id)
    {

        $file = DatabaseRequestFile::where('id', $id)->firstOrfail();
        $data = DatabaseRequest::where('id', $file->document_id)->firstOrfail();

        $user = User::query()->where('id', $data->user_id)->firstOrfail();
        $database = Regulation::orderBy('name', 'ASC')
            ->filter(request(['rule_type', 'name', 'type']))
            ->where('privilege', 'RESTRICTED')
            ->paginate(10);

        return view('pages.legal.regulation.request.update', [
            'data' => $data,
            'user' => $user,
            'file' => $file,
            'database' => $database
        ]);
    }
    public function legalUpdateRequestPost(Request $request, $id)
    {

        $data = $request->all();

        if ($request->file('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file'] = 'document_request/' . $filename;
            $file->move('document_request', $filename);
        }
        $item = DatabaseRequestFile::where('id', $id)->firstOrFail();

        $data['note'] = 'Access Granted';

        $item->update($data);

        // FileDocumentRequest::create($data);

        $data = DatabaseRequest::get();

        return redirect()->route('legal.regulation.request');
    }

    public function addType()
    {
        $table = RegulationType::orderBy('id', 'DESC')->get();

        return view('pages.legal.regulation.type.add', compact('table'));
    }

    public function editType($id)
    {
        $table = RegulationType::orderBy('id', 'DESC')->get();
        $data = RegulationType::where('id', $id)->first();

        return view('pages.legal.regulation.type.edit', compact('table', 'data'));
    }

    public function updateType(Request $request, $id)
    {
        $data = $request->all();

        $regulation = RegulationType::where('id', $id)->firstOrFail();

        $regulation->update($data);

        return redirect()->route('legal.regulation.add-type')->with('message_success', 'Tipe Regulasi berhasil di edit!.');;
    }

    public function storeType(Request $request)
    {
        $data = $request->all();

        RegulationType::create($data);

        return redirect()->route('legal.regulation.normative-create')->with('message_success', 'Tipe Regulasi berhasil di tambahkan!.');;
    }

    public function requestPublicPost(Request $request)
    {
        $data = $request->all();
        // dd($data);

        DatabasePublicRequest::create($data);

        return redirect()->back()->with('status', 'Data berhasil disubmit!');
    }

    public function deleteType($id)
    {
        RegulationType::where('id', $id)
            ->first()
            ->delete();

        return redirect()->route('legal.regulation.add-type')->with('message_success', 'Tipe Regulasi berhasil di dihapus!.');
    }

    public function addUnit()
    {
        $types = RegulationType::all();
        $units = RegulationUnit::all();
        $table = RegulationUnit::orderBy('id', 'DESC')->get();

        return view('pages.legal.regulation.unit.add', compact('table', 'types', 'units'));
    }

    public function storeUnit(Request $request)
    {
        $data = $request->all();

        RegulationUnit::create($data);

        return redirect()->route('legal.regulation.normative-create')->with('message_success', 'Tipe Regulasi berhasil di tambahkan!.');;
    }

    public function delete($id)
    {
        Regulation::where('id', $id)
            ->first()
            ->delete();

        return redirect()->route('legal.regulation.index')->with('message_success', 'File berhasil di dihapus!.');;
    }

    public function createCorporate()
    {
        return view('pages.legal.regulation.corporate.index');
    }

    public function createCompanyLegal()
    {
        return view('pages.legal.regulation.corporate.companyLegality.index');
    }

    public function createCompanyAsset()
    {
        return view('pages.legal.regulation.corporate.companyAsset.index');
    }

    public function createPartnerData()
    {
        return view('pages.legal.regulation.corporate.partnerData.index');
    }

    public function createSkBoardComms()
    {
        return view('pages.legal.regulation.corporate.skBoardComms.index');
    }

    public function createSkBoardCommsDirector()
    {
        return view('pages.legal.regulation.corporate.skBoardCommsDirector.index');
    }

    public function createSkDirector()
    {
        return view('pages.legal.regulation.corporate.skDirector.index');
    }

    public function createSeDirector()
    {
        return view('pages.legal.regulation.corporate.seDirector.index');
    }

    public function createInternalMemoDirector()
    {
        return view('pages.legal.regulation.corporate.internalMemoDirector.index');
    }

    public function createShareCertificate()
    {
        return view('pages.legal.regulation.corporate.shareCertificate.index');
    }

    public function createPowerOfAttorney()
    {
        return view('pages.legal.regulation.corporate.powerOfAttorney.index');
    }

    public function createAssociation()
    {
        return view('pages.legal.regulation.corporate.association.index');
    }

    public function createPermit()
    {
        return view('pages.legal.regulation.permit.index');
    }

    public function createAdsPermit()
    {
        return view('pages.legal.regulation.permit.advertisingPermit.index');
    }

    public function createEnvPermit()
    {
        return view('pages.legal.regulation.permit.environmentalPermit.index');
    }

    public function createK3Permit()
    {
        return view('pages.legal.regulation.permit.k3permit.index');
    }

    public function createDisnakerPermit()
    {
        return view('pages.legal.regulation.permit.disnaker.index');
    }

    public function createDrafting()
    {
        return view('pages.legal.regulation.drafting.index');
    }

    public function createLease()
    {
        return view('pages.legal.regulation.drafting.lease.index');
    }

    public function createSupplier()
    {
        return view('pages.legal.regulation.drafting.supplierVendor.index');
    }

    public function createCustomer()
    {
        return view('pages.legal.regulation.drafting.customer.index');
    }

    public function createOther()
    {
        return view('pages.legal.regulation.drafting.others.index');
    }

    public function createAgency()
    {
        return view('pages.legal.regulation.drafting.agency.index');
    }

    public function createLitigation()
    {
        return view('pages.legal.regulation.litigation.index');
    }
}
