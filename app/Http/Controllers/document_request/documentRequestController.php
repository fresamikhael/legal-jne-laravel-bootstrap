<?php

namespace App\Http\Controllers\document_request;

use App\Http\Controllers\Controller;
use App\Models\DocumentRequest;
use App\Models\User;
use Illuminate\Http\Request;

class documentRequestController extends Controller
{
    public function home()
    {
        return View('pages.user.document_request.index');
    }

    public function index()
    {

        $data = DocumentRequest::where('user_id', auth()->user()->id)
            ->get();

        return view('pages.user.document_request.document_request', [
            'data' => $data,
        ]);
    }

    public function store(Request $request)
    {


        $data = $request->all();

        DocumentRequest::create($data);


        return redirect()->route('document_request.form');
    }

    public function detail($id)
    {
        $data = DocumentRequest::where('id', $id)
            ->firstOrfail();
        $user = User::query()->where('id', $data->user_id)->firstOrfail();
        $user_id = $data->user_id;
        // dd($user_id);
        return View('pages.user.document_request.detail', [
            'data' => $data,
            'user' => $user
        ]);
    }

    public function index_legal()
    {

        $data = DocumentRequest::where('user_id', auth()->user()->id)
            ->get();

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
        $user = User::query()->where('id', $data->user_id)->firstOrfail();
        $user_id = $data->user_id;
        // dd($user_id);
        return View('pages.legal.document_request.check', [
            'data' => $data,
            'user' => $user
        ]);
    }

    public function detail_legal($id)
    {
        $data = DocumentRequest::where('id', $id)
            ->firstOrfail();
        $user = User::query()->where('id', $data->user_id)->firstOrfail();
        $user_id = $data->user_id;
        // dd($user_id);
        return View('pages.legal.document_request.detail', [
            'data' => $data,
            'user' => $user
        ]);
    }
}
