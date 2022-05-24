<?php

namespace App\Http\Controllers\document_request;

use App\Http\Controllers\Controller;
use App\Models\DocumentRequest;
use App\Models\FileDocumentRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Str;


class documentRequestController extends Controller
{
    public function home()
    {
        return View('pages.user.document_request.index');
    }

    public function index()
    {
        $check_document = DocumentRequest::select('*')->count();

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

        $data = DocumentRequest::where('user_id', auth()->user()->id)
            ->get();

        return view('pages.user.document_request.document_request', [
            'data' => $data,
            'no_kasus' => $no_kasus,
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'required',
            'request_document_reason' => 'required'
        ]);

        $document = DocumentRequest::create([
            'request_document_reason' => $request->request_document_reason,
            'user_id' => $request->user_id,

        ]);
        $document_name = $request->document_name;
        $dt = $request->document_type;

        $i = 0;

        foreach ($document_name as $dn) {
            $dr = FileDocumentRequest::create([
                'document_id' => $document->id,
                'document_name' => $dn,
                'document_type' => $dt[$i],
            ]);
            $dr->save();
            $i++;
        }




        return redirect()->route('document_request.form');
    }

    public function detail($id)
    {
        $data = DocumentRequest::where('id', $id)
            ->firstOrfail();
        $file = FileDocumentRequest::where('document_id', $data->id)->get();
        $user = User::query()->where('id', $data->user_id)->firstOrfail();
        $user_id = $data->user_id;
        // dd($user_id);
        return View('pages.user.document_request.detail', [
            'data' => $data,
            'user' => $user,
            'file' => $file,

        ]);
    }

    public function index_legal()
    {

        $data = DocumentRequest::get();

        return view('pages.legal.document_request.document_request', [
            'data' => $data,
        ]);
    }

    public function store_legal(Request $request)
    {


        $data = $request->all();

        DocumentRequest::create($data);

        return redirect()->route('legal.document_request.form');
    }

    public function check_legal($id)
    {
        $data = DocumentRequest::where('id', $id)
            ->firstOrfail();
        $file = FileDocumentRequest::where('document_id', $data->id)->get();
        // dd($file);
        $user = User::query()->where('id', $data->user_id)->firstOrfail();
        $user_id = $data->user_id;
        // dd($user_id);
        return View('pages.legal.document_request.check', [
            'data' => $data,
            'user' => $user,
            'file' => $file,
        ]);
    }

    public function check_legal_store(Request $request, $id)
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
                $item = DocumentRequest::where('id', $id)->firstOrFail();

                $item->update($data);


                return redirect()->route('legal.document_request.form');
                break;

            case 'approve':
                $data['status'] = 'IN PROGRESS';

                $item = DocumentRequest::where('id', $id)->firstOrFail();


                $item->update($data);


                return redirect()->route('legal.document_request.form');
                break;
        }
    }
    public function detail_legal($id)
    {
        $data = DocumentRequest::where('id', $id)
            ->firstOrfail();
        $file = FileDocumentRequest::where('document_id', $data->id)->get();
        $user = User::query()->where('id', $data->user_id)->firstOrfail();
        $user_id = $data->user_id;
        // dd($user_id);
        return View('pages.legal.document_request.detail', [
            'data' => $data,
            'user' => $user,
            'file' => $file,

        ]);
    }

    public function update_legal_hard($id)
    {

        $file = FileDocumentRequest::where('id', $id)->firstOrfail();
        $data = DocumentRequest::where('id', $file->document_id)->firstOrfail();
        // dd($data);
        $user = User::query()->where('id', $data->user_id)->firstOrfail();
        // $user_id = $data->user_id;
        // dd($user_id);
        return View('pages.legal.document_request.update', [
            'data' => $data,
            'user' => $user,
            'file' => $file,

        ]);
    }
    public function update_legal_hard_store(Request $request, $id)
    {

        $data = $request->all();

        // if ($request->file('file')) {
        //     $file = $request->file('file');
        //     $extension = $file->getClientOriginalExtension();
        //     $filename = Str::random(40) . '.' . $extension;
        //     $data['file'] = 'document_request/' . $filename;
        //     $file->move('document_request', $filename);
        // }
        $item = FileDocumentRequest::where('id', $id)->firstOrFail();


        $item->update($data);

        // FileDocumentRequest::create($data);

        $data = DocumentRequest::get();

        return view('pages.legal.document_request.document_request', [
            'data' => $data,
        ]);
    }
    public function update_legal_soft($id)
    {

        $file = FileDocumentRequest::where('id', $id)->firstOrfail();
        $data = DocumentRequest::where('id', $file->document_id)->firstOrfail();
        // dd($data);
        $user = User::query()->where('id', $data->user_id)->firstOrfail();
        // $user_id = $data->user_id;
        // dd($user_id);
        return View('pages.legal.document_request.update_soft', [
            'data' => $data,
            'user' => $user,
            'file' => $file,

        ]);
    }
    public function update_legal_soft_store(Request $request, $id)
    {

        $data = $request->all();

        if ($request->file('file')) {
            $file = $request->file('file');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file'] = 'document_request/' . $filename;
            $file->move('document_request', $filename);
        }
        $item = FileDocumentRequest::where('id', $id)->firstOrFail();


        $item->update($data);

        // FileDocumentRequest::create($data);

        $data = DocumentRequest::get();

        return view('pages.legal.document_request.document_request', [
            'data' => $data,
        ]);
    }
    public function update_legal_out($id)
    {

        $file = FileDocumentRequest::where('id', $id)->firstOrfail();
        // $data = DocumentRequest::where('id', $file->document_id)->firstOrfail();
        // // dd($data);
        // $user = User::query()->where('id', $data->user_id)->firstOrfail();
        // $user_id = $data->user_id;
        // dd($user_id);
        return View('pages.legal.document_request.update_out', [
            // 'data' => $data,
            // 'user' => $user,
            'file' => $file,

        ]);
    }
    public function update_legal_out_store(Request $request, $id)
    {

        $data = $request->all();

        $item = FileDocumentRequest::where('id', $id)->firstOrFail();


        $item->update($data);

        // FileDocumentRequest::create($data);

        $data = DocumentRequest::get();

        return view('pages.legal.document_request.document_request', [
            'data' => $data,
        ]);
    }
    public function update_legal_in($id)
    {

        $file = FileDocumentRequest::where('id', $id)->firstOrfail();
        // $data = DocumentRequest::where('id', $file->document_id)->firstOrfail();
        // // dd($data);
        // $user = User::query()->where('id', $data->user_id)->firstOrfail();
        // $user_id = $data->user_id;
        // dd($user_id);
        return View('pages.legal.document_request.update_in', [
            // 'data' => $data,
            // 'user' => $user,
            'file' => $file,

        ]);
    }
    public function update_legal_in_store(Request $request, $id)
    {

        $data = $request->all();

        $item = FileDocumentRequest::where('id', $id)->firstOrFail();


        $item->update($data);

        // FileDocumentRequest::create($data);

        $data = DocumentRequest::get();

        return view('pages.legal.document_request.document_request', [
            'data' => $data,
        ]);
    }
}
