@extends('layouts.legal')

@section('title')
    Ubah User
@endsection

@section('content')
    <x-base>
        <div class="row">
            <div class="col-sm-12">
                <div class="col px-3 py-3" style="background-color: rgb(239, 236, 236); border-radius: 10px;">
                    <nav style="--bs-breadcrumb-divider: '>'; margin-top: -5px; margin-bottom: -18px" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('legal-home') }}" style="color:#fe1717">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('legal.database.index') }}"
                                    style="color:#fe1717">User</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @if (Session::get('message_fails'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_fails') }}" type="danger" />
            @endslot
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('legal.user.update', $data->id) }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Lengkap" name="name"
                        value="{{ $data->name }}" required />
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis User" name="role" required>
                        <option value="{{ $data->role }}" selected>{{ $data->role }}</option>
                        <option value="" disabled>----------------------------</option>
                        <option value="USER">User Non-Legal</option>
                        <option value="LEGAL">Legal</option>
                        <option value="CS">CS</option>
                        <option value="LITI1">Legal Litigasi 1</option>
                        <option value="LITI2">Legal Litigasi 2</option>
                        <option value="CD">Contract Business</option>
                    </x-select>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Induk Kewarganegaraan(NIK)"
                        name="nik" value="{{ $data->nik }}" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Email" value="{{ $data->email }}"
                        name="email" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Password" name="password" required />
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
