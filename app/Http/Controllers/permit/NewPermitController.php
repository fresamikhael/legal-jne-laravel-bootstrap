<?php

namespace App\Http\Controllers\permit;

use App\Http\Controllers\Controller;
use App\Mail\MailJNE;
use App\Models\Permit;
// use App\Models\Permit\Permit as PermitPermit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class NewPermitController extends Controller
{
    public function index()
    {

        if (request()->ajax()) {
            $data = Permit::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                        <a href="" class="btn btn-primary justify-content-center">Detail</a>
                    ';
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.user.permit.perizinan-baru.perizinan-baru');
    }

    public function store(Request $request)
    {

        // $validatedData = $request->validate([
        //     'user_id' => 'required',
        //     'permit_type' => 'required',
        //     'location' => 'required',
        //     'specification' => 'required',
        //     'application_reason' => 'required',
        //     'file_disposition' => 'required',
        //     'file_document1' => 'required',
        //     'file_document2' => 'required',
        //     'file_document3' => 'required',
        // ]);
        $data = $request->all();
        var_dump($data);
        // $id_permit = $data['id'];

        $name1 = time() . '-' . $request->file('file_disposition')->getClientOriginalName();
        $name2 = time() . '-' . $request->file('file_document1')->getClientOriginalName();
        $name3 = time() . '-' . $request->file('file_document2')->getClientOriginalName();
        $name4 = time() . '-' . $request->file('file_document3')->getClientOriginalName();

        // dd(gmdate("Y-m-d\TH:i:s\Z", time()));

        // $file = public_path('storage/public/permit' . $name1);

        // if (!file_exists($file)) {
        //     return dd($name1);
        // }

        $data['file_disposition'] = $request->file('file_disposition')->storeAs('public/permit', $name1, 'public');
        $data['file_document1'] = $request->file('file_document1')->storeAs('public/permit', $name2, 'public');
        $data['file_document2'] = $request->file('file_document2')->storeAs('public/permit', $name3, 'public');
        $data['file_document3'] = $request->file('file_document3')->storeAs('public/permit', $name4, 'public');

        // $save = new Permit();

        // $save->name = $name1;
        // $save->name = $name2;
        // $save->name = $name3;
        // $save->name = $name4;

        // $save->path = $path1;
        // $save->path = $path2;
        // $save->path = $path3;
        // $save->path = $path4;


        // dd("Email is sent successfully.");

        // UploadFile::create($validatedData2);
        Permit::create($data);
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'body' => 'This is for testing email using smtp.'
        ];

        Mail::to('gunturburn@gmail.com')->send(new MailJNE($mailData));

        return redirect()->route('home');
    }

    public function index_legal()
    {

        if (request()->ajax()) {
            $data = Permit::all();
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return '
                        <a href="" class="btn btn-primary justify-content-center">Detail</a>
                    ';
                })

                ->rawColumns(['action'])
                ->make(true);
        }

        return view('pages.user.permit.perizinan-baru.perizinan-baru');
    }

    public function check_legal()
    {

        return view('pages.legal.permit.perizinan-baru.check');
    }
}
