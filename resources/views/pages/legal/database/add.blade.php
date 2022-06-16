@extends('layouts.legal')

@section('title')
    Tambah Regulasi Baru
@endsection

@section('content')
    <x-base>
        <div class="row">
            <div class="col-sm-12">
                <div class="col px-3 py-3" style="background-color: rgb(239, 236, 236); border-radius: 10px;">
                    <nav style="--bs-breadcrumb-divider: '>'; margin-top: -5px; margin-bottom: -18px"
                        aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('legal-home') }}" style="color:#fe1717">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('legal.database.index') }}"
                                    style="color:#fe1717">Regulasi</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Tambah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('database.store') }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Peraturan" name="name" required />
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Peraturan" name="type" required>
                        <option value="UU">UU</option>
                        <option value="PERPU">PERPU</option>
                        <option value="PP">PP</option>
                        <option value="PERPRES">PERPRES</option>
                    </x-select>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Instansi" name="entity" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Peraturan" name="number" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tahun Peraturan" name="year" required />
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Tentang" name="about" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Ditetapkan" type="date"
                        name="set_date" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Diundangkan" type="date"
                        name="promulgated_date" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor BN" type="text" name="bn_number"
                        required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor TBN" name="tbn_number" />
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Status Peraturan" name="status" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </x-select>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Upload File" name="file_database[]"
                        multiple />
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
