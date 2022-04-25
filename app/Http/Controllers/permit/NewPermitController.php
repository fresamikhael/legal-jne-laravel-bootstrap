<?php

namespace App\Http\Controllers\permit;

use App\Http\Controllers\Controller;
use App\Mail\MailJNE;
use App\Mail\MailUPDATE;
use App\Models\Permit;
use App\Models\User;
// use App\Models\Permit\Permit as PermitPermit;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class NewPermitController extends Controller
{

    public function home()
    {
        return View('pages.user.permit.index');
    }
    public function index()
    {

        $data = Permit::where('user_id', auth()->user()->id)
            ->get();

        return view('pages.user.permit.perizinan-baru.perizinan-baru', [
            'data' => $data,

        ]);
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
        // ]);
        $data = $request->all();
        // $id_permit = $data['id'];

        if ($request->file('file_disposition')) {
            $file = $request->file('file_disposition');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_disposition'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_document1')) {
            $file = $request->file('file_document1');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_document1'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_document2')) {
            $file = $request->file('file_document2');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_document2'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_document3')) {
            $file = $request->file('file_document3');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_document3'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }

        // $save = new Permit();

        // $save->name = $name1;
        // $save->name = $name2;
        // $save->name = $name3;
        // $save->name = $name4;

        // $save->path = $path1;
        // $save->path = $path2;
        // $save->path = $path3;
        // $save->path = $path4;

        // UploadFile::create($validatedData2);
        Permit::create($data);
        $datenow = date('y-m-d', strtotime(Carbon::now()));
        $mailData = [
            'title' => 'New permit has been sumbitted',
            'body' => 'new permit has been sumbitted by ' . auth()->user()->name .  ' '
        ];

        Mail::to('ilhambachtiar48@gmail.com')->send(new MailJNE($mailData));

        return redirect()->route('home');
    }

    public function detail($id)
    {
        $permit = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.user.permit.perizinan-baru.detail', [
            'permit' => $permit
        ]);
    }

    public function edit($id)
    {
        $data = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.user.permit.perizinan-baru.edit', [
            'data' => $data
        ]);
    }
    public function update(Request $request, $id)
    {
        // $data = $request->all();
        // $id_permit = $data['id'];
        $data = $request->validate([
            // 'user_id' => 'required',
            'permit_type' => 'required',
            'location' => 'required',
            'specification' => 'required',
            'application_reason' => 'required',
            'file_disposition' => 'required',
            'file_document1' => 'required',
            'file_document2' => 'required',
            'file_document3' => 'required',

        ]);

        if ($request->file('file_disposition')) {
            $file = $request->file('file_disposition');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_disposition'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_document1')) {
            $file = $request->file('file_document1');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_document1'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_document2')) {
            $file = $request->file('file_document2');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_document2'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_document3')) {
            $file = $request->file('file_document3');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_document3'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        $item = Permit::where('id', $id)->firstOrFail();

        $item->update([$data, 'status' => 'PENDING']);
        // $datenow = date('y-m-d', strtotime(Carbon::now()));
        $mailData = [
            'title' => '' . $item->permit_type . 'permit has been sumbitted',
            'body' => 'permit has been sumbitted by ' . auth()->user()->name .  ' '
        ];

        Mail::to('ilhambachtiar48@gmail.com')->send(new MailJNE($mailData));

        return redirect()->route('home');
    }




    public function index_legal()
    {

        $data = Permit::where('user_id', auth()->user()->id)
            ->get();
        $data2 = Permit::all();
        return view('pages.legal.permit.perizinan-baru.perizinan-baru', [
            'data' => $data,
            'data2' => $data2
        ]);
    }

    public function store_legal(Request $request)
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
        // ]);
        $data = $request->all();

        if ($request->file('file_disposition')) {
            $file = $request->file('file_disposition');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_disposition'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_document1')) {
            $file = $request->file('file_document1');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_document1'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_document2')) {
            $file = $request->file('file_document2');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_document2'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }
        if ($request->file('file_document3')) {
            $file = $request->file('file_document3');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['file_document3'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }

        // $save = new Permit();

        // $save->name = $name1;
        // $save->name = $name2;
        // $save->name = $name3;
        // $save->name = $name4;

        // $save->path = $path1;
        // $save->path = $path2;
        // $save->path = $path3;
        // $save->path = $path4;

        // UploadFile::create($validatedData2);
        Permit::create($data);

        $mailData = [
            'title' => 'New permit has been sumbitted',
            'body' => 'new permit has been sumbitted by ' . auth()->user()->name .  ' '
        ];

        Mail::to('ilhambachtiar48@gmail.com')->send(new MailJNE($mailData));

        return redirect()->route('home');
    }

    public function check_legal($id)
    {
        $permit = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.legal.permit.perizinan-baru.check', [
            'permit' => $permit
        ]);
    }

    public function store_check_legal(Request $request, $id)
    {
        switch ($request->input('action')) {
            case 'return':
                // $data = $request->all();
                $data = $request->validate([
                    // 'id' => 'required',
                    'note' => 'required',
                    'status' => 'RETURN'
                ]);

                // $regulation = Regulation::where('id', $id)->firstOrFail();

                $item = Permit::where('id', $id)->firstOrFail();
                $user = User::findOrFail($item->user_id);

                $item->update($data);


                $mailData = [
                    'title' => 'New permit has been rejected',
                    'body' => 'new permit has been rejected by ' . auth()->user()->name .  ' '
                ];

                Mail::to($user->email)->send(new MailUPDATE($mailData));


                return redirect()->route('legal.permit.index');
                break;

            case 'approve':
                // $data = $request->all();
                $data = $request->validate([
                    // 'id' => 'required',
                    'note' => 'required',
                    'status' => 'IN PROGRESS'
                ]);

                $item = Permit::findOrFail($id);

                $item->update($data);
                $user = User::findOrFail($item->user_id);
                $mailData = [
                    'title' => 'New permit has been approve',
                    'body' => 'new permit has been approve by ' . auth()->user()->name .  ' '
                ];

                Mail::to($user->email)->send(new MailUPDATE($mailData));

                return redirect()->route('home');
                break;
        }
    }

    public function detail_legal($id)
    {
        $permit = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.legal.permit.perizinan-baru.detail', [
            'permit' => $permit
        ]);
    }

    public function edit_legal($id)
    {
        $data = Permit::query()->where('id', $id)->firstOrFail();
        // dd($permit);

        return view('pages.legal.permit.perizinan-baru.edit', [
            'data' => $data
        ]);
    }
    public function update_legal(Request $request, $id)
    {
        // $data = $request->all();
        // $id_permit = $data['id'];
        $data = $request->validate([
            // 'user_id' => 'required',
            // 'permit_type' => 'required',
            // 'location' => 'required',
            // 'specification' => 'required',
            // 'application_reason' => 'required',
            // 'file_disposition' => 'required',
            // 'file_document1' => 'required',
            // 'file_document2' => 'required',
            // 'file_document3' => 'required',
            'latest_skpd' => 'required'

        ]);

        if ($request->file('latest_skpd')) {
            $file = $request->file('latest_skpd');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['latest_skpd'] = 'Permit/' . $filename;
            $file->move('Permit', $filename);
        }

        $item = Permit::where('id', $id)->firstOrFail();

        $item->update($data);
        // $datenow = date('y-m-d', strtotime(Carbon::now()));
        $mailData = [
            'title' => 'update from legal',
            'body' => 'legal telah mengupload skpd'
        ];

        Mail::to('ilhambachtiar48@gmail.com')->send(new MailUPDATE($mailData));

        return redirect()->route('legal.permit.newpermit');
    }
}
