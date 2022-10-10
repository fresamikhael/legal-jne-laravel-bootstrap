@extends ('layouts.legal')

@section('title')
    Add Database Khusus
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
                            <li class="breadcrumb-item"><a href="{{ route('legal.regulation.index') }}"
                                    style="color:#fe1717">Database</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('legal.regulation.add') }}"
                                    style="color:#fe1717">Khusus</a>
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

        <form class="mt-4" method="POST" enctype="multipart/form-data"
            action="{{ route('legal.regulation.normative-post') }}">
            @csrf
            <div class="row mt-4">
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <x-input value="Perjanjian" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                        <x-input value="Sewa Menyewa" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                        <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                        <x-input type="date" label="Tanggal Penerbitan" name="date" labelClass="col-sm-2"
                            fieldClass="col-sm-10" required />
                        <x-input type="date" label="Jangka Waktu" name="time_period" labelClass="col-sm-2"
                            fieldClass="col-sm-10" required />
                        <x-input label="Landlord" name="landlord" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                        <x-input label="Nilai Sewa" name="rental_value" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required />
                        <label for="">Lokasi</label>
                        <x-input label="Provinsi" name="province" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                        <x-input label="Kab/Kota" name="regency" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                        <x-input label="Kecamatan" name="district" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                        <x-input label="Desa/Kel" name="village" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                        <x-input label="Jalan" name="address" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                        <x-input label="Nama Notaris" name="name" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required />
                        <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                            fieldClass="col-sm-10" required />
                        <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Upload" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
