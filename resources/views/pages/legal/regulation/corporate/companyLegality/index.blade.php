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
        <div class="row">
            <div class="d-flex justify-content-end">
                <div class="mt-3">
                    <a href={{ route('legal.regulation.add-type') }} class="btn btn-primary"><i class="fas fa-edit"></i>
                        Tipe Dokumen</a>
                </div>
            </div>
        </div>
        <form class="mt-4" method="POST" enctype="multipart/form-data"
            action="{{ route('legal.regulation.normative-post') }}">
            @csrf
            <div class="row mt-4">
                <x-corporate-type>
                    @slot('budget')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Judul Akta" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nama Notaris" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Nama Direksi" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Masa Jabatan Direksi Susunan Pemegang Saham dan Jumlah Saham"
                                    name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input label="Nama Dewan Komisaris Susunan Pemegang Saham dan Jumlah Saham"
                                    name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input label="Masa Jabatan Komisaris Susunan Pemegang Saham dan jumlah saham"
                                    name="application_reason" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input label="Susunan Pemegang Saham dan jumlah saham" name="surface_area"
                                    labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input label="Masa Jabatan Komisaris Susunan Pemegang Saham dan jumlah saham"
                                    name="application_reason" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <div class="col-sm-12">
                                    <label for="">Isi Akta</label>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <textarea name="note" id="editor"></textarea>
                                </div>
                            </div>
                        </div>
                    @endslot

                    @slot('minister')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="location" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Jenis SK" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('director')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama" name="owner_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Alamat" name="address" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input label="Tempat Tanggal Lahir" name="ads_title" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KTP" name="ads_size" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="NPWP" name="ads_height" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="KK" name="ads_period" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Passport" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Pas Foto" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('commissioner')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama" name="branch_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Alamat" name="branch_location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tempat Tanggal Lahir" name="branch_rt" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KTP" name="branch_village" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="NPWP" name="branch_district" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="KK" name="branch_regency" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Passport" name="branch_province" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Pas Foto" name="branch_postal_code" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('share')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama" name="branch_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Alamat" name="branch_location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tempat Tanggal Lahir" name="branch_rt" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KTP/Anggaran Dasae" name="branch_village" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="NPWP" name="branch_district" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="KK" name="branch_regency" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Passport" name="branch_province" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Pas Foto" name="branch_postal_code" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('npwp')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('nib')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="KBLI" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('sipp')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot
                </x-corporate-type>
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Upload" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
