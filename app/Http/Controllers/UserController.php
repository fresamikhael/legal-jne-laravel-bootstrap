<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function index()
    {
        $data = User::get();

        return view('pages.legal.user.index', compact('data'));
    }

    public function add()
    {
        return view('pages.legal.user.add');
    }

    public function store(Request $request)
    {
        $data = Validator::make($request->all(),
            [
            'nik' => ['required', 'string', 'max:255'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255','regex:/(.*)@(jne)\.co.id/i', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            ]
        );

        if($data->fails()){
            return to_route('legal.user.add')->with('message_fails',  $data->errors());
        } else {
            User::create([
                'nik' => $request->nik,
                'name' => $request->name,
                'email' => $request->email,
                'role' => $request->role,
                'password' => Hash::make($request->password),
            ]);

            return to_route('legal.user.index')->with('message_success', 'User berhasil ditambahkan.');
        }
    }

    public function edit($id)
    {
        $data = User::where('id', $id)->firstOrFail();

        return view('pages.legal.user.edit', [
            'data' => $data,
        ]);
    }

    public function update(Request $request, User $regulation,$id)
    {
        $data = $request->all();

        $regulation = User::where('id',$id)->firstOrFail();

        $regulation->update($data);

        return redirect()->route('legal.user.index')->with('message_success','Berhasil memperbaharui data');;
    }

    public function delete($id)
    {
        User::where('id', $id)
            ->first()
            ->delete();

        return redirect()->route('legal.user.index')->with('message_success', 'User berhasil di dihapus!.');;
    }
}
