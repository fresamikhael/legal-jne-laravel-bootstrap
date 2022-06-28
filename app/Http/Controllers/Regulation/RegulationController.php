<?php

namespace App\Http\Controllers\Regulation;

use App\Models\User;
use App\Models\Regulation;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\DatabaseRequest;
use App\Models\DatabaseRequestFile;
use App\Http\Controllers\Controller;
use App\Models\RegulationType;

class RegulationController extends Controller
{
    public function index()
    {
        $database = Regulation::orderBy('name', 'ASC')
            ->filter(request(['privilege', 'name', 'type']))
            ->where('privilege', 'ALL')
            ->paginate(10);

        return view('pages.user.regulation.index',compact('database'));
    }

    public function indexLegal()
    {
        $database = Regulation::orderBy('name', 'ASC')
            ->filter(request(['privilege', 'name', 'type']))
            ->paginate(10);

        return view('pages.legal.regulation.index',compact('database'));
    }

    public function add()
    {
        return view('pages.legal.regulation.add');
    }

    public function show($id)
    {
        $database = Regulation::where('id', $id)
            ->first();

        return view('pages.user.regulation.detail', compact('database'));
    }

    public function showLegal($id)
    {
        $database = Regulation::where('id', $id)->firstOrFail();

        return view('pages.legal.regulation.detail', [
            'database' => $database
        ]);
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

    public function storeType(Request $request)
    {
        $data = $request->all();

        RegulationType::create($data);

        return redirect()->route('legal.regulation.add-type')->with('message_success', 'Tipe Regulasi berhasil di tambahkan!.');;
    }

    public function deleteType($id)
    {
        RegulationType::where('id', $id)
            ->first()
            ->delete();

        return redirect()->route('legal.regulation.add-type')->with('message_success', 'Tipe Regulasi berhasil di dihapus!.');
    }

    public function delete($id)
    {
        Regulation::where('id', $id)
            ->first()
            ->delete();

        return redirect()->route('legal.regulation.index')->with('message_success', 'File berhasil di dihapus!.');;
    }
}
