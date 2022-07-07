<?php

namespace App\Http\Controllers;

use App\Models\HomeTop;
use App\Models\HomeFoot;
use App\Models\HomeBelow;
use App\Models\HomeMiddle;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LegalHomeController extends Controller
{
    public function index()
    {
        $top = HomeTop::latest()->first();
        $middle = HomeMiddle::latest()->first();
        $below = HomeBelow::latest()->first();
        $foot = HomeFoot::latest()->first();

        return view('pages.legal.index', compact('top', 'middle', 'below', 'foot'));
    }

    public function topEdit()
    {
        return view('pages.legal.home.top');
    }

    public function topStore(Request $request)
    {
        $data = $request->all();

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['photo'] = 'home/' . $filename;
            $file->move('home', $filename);
        }

        HomeTop::create($data);

        return redirect()->route('legal-home')->with('message_success', 'Informasi Berhasil Ditambahkan.');
    }

    public function middleEdit()
    {
        return view('pages.legal.home.middle');
    }

    public function middleStore(Request $request)
    {
        $data = $request->all();

        if ($request->file('p1')) {
            $file = $request->file('p1');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['p1'] = 'home/' . $filename;
            $file->move('home', $filename);
        }
        if ($request->file('p2')) {
            $file = $request->file('p2');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['p2'] = 'home/' . $filename;
            $file->move('home', $filename);
        }
        if ($request->file('p3')) {
            $file = $request->file('p3');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['p3'] = 'home/' . $filename;
            $file->move('home', $filename);
        }
        if ($request->file('p4')) {
            $file = $request->file('p4');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['p4'] = 'home/' . $filename;
            $file->move('home', $filename);
        }
        if ($request->file('p5')) {
            $file = $request->file('p5');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['p5'] = 'home/' . $filename;
            $file->move('home', $filename);
        }
        if ($request->file('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['photo'] = 'home/' . $filename;
            $file->move('home', $filename);
        }

        HomeMiddle::create($data);

        return redirect()->route('legal-home')->with('message_success', 'Informasi Berhasil Ditambahkan.');
    }
    public function belowEdit()
    {
        return view('pages.legal.home.below');
    }

    public function belowStore(Request $request)
    {
        $data = $request->all();

        if ($request->file('photo')) {
            $file = $request->file('photo');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['photo'] = 'home/' . $filename;
            $file->move('home', $filename);
        }

        HomeBelow::create($data);

        return redirect()->route('legal-home')->with('message_success', 'Informasi Berhasil Ditambahkan.');
    }
    public function footEdit()
    {
        return view('pages.legal.home.foot');
    }

    public function footStore(Request $request)
    {
        $data = $request->all();

        if ($request->file('p1')) {
            $file = $request->file('p1');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['p1'] = 'home/' . $filename;
            $file->move('home', $filename);
        }
        if ($request->file('p2')) {
            $file = $request->file('p2');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['p2'] = 'home/' . $filename;
            $file->move('home', $filename);
        }
        if ($request->file('p3')) {
            $file = $request->file('p3');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['p3'] = 'home/' . $filename;
            $file->move('home', $filename);
        }
        if ($request->file('p4')) {
            $file = $request->file('p4');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['p4'] = 'home/' . $filename;
            $file->move('home', $filename);
        }
        if ($request->file('p5')) {
            $file = $request->file('p5');
            $extension = $file->getClientOriginalExtension();
            $filename = Str::random(40) . '.' . $extension;
            $data['p5'] = 'home/' . $filename;
            $file->move('home', $filename);
        }

        HomeFoot::create($data);

        return redirect()->route('legal-home')->with('message_success', 'Informasi Berhasil Ditambahkan.');
    }
}
