<?php

namespace App\Http\Controllers\Misc;

use App\Http\Controllers\Controller;
use App\Models\ContactUs;
use Illuminate\Http\Request;

class ContactUsController extends Controller
{
    public function user()
    {
        $data = ContactUs::latest('created_at')->first();

        return view('pages.user.contact_us', compact('data'));
    }

    public function index()
    {
        $data = ContactUs::latest('created_at')->first();

        return view('pages.legal.contact_us', compact('data'));
    }

    public function edit()
    {
        $data = ContactUs::latest('created_at')->first();

        return view('pages.legal.editContactUs', compact('data'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        ContactUs::create($data);

        return redirect()->route('legal.contact-us');
    }
}
