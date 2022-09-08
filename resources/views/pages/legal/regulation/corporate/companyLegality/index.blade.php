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
                <x-corporate-type>
                    @slot('budget')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input value="Anggaran dasar perusahaan" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Judul Akta" name="title_deed" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nama Notaris" name="notary_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nama Direksi" name="director_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Masa Jabatan Direksi Susunan Pemegang Saham dan jumlah saham"
                                    name="comms_term_arr" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input label="Nama Dewan Komisaris Susunan Pemegang Saham dan Jumlah Saham" name="comms_name"
                                    labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input label="Masa Jabatan Komisaris Susunan Pemegang Saham dan jumlah saham"
                                    name="comms_term" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input label="Susunan Pemegang Saham dan jumlah saham" name="comms_arr" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Isi Akta" name="body" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('minister')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input value="SK Menteri Hukum dan Ham" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Jenis SK" name="sk_type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('director')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Identitas Direksi" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nama" name="name" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Alamat" name="address" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tempat Tanggal Lahir" name="ttl" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KTP" name="ktp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="KTP" name="ktp_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="NPWP" name="npwp_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KK" name="kk" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="KK" name="kk_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Passport" name="passport" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Passport" name="passport_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="Pas Foto" name="file_database" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('commissioner')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Identitas Dewan Komisaris" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nama" name="name" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Alamat" name="address" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tempat Tanggal Lahir" name="ttl" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KTP" name="ktp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="KTP" name="ktp_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="NPWP" name="npwp_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KK" name="kk" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="KK" name="kk_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Passport" name="passport" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Passport" name="passport_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="Pas Foto" name="file_database" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('share')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Identitas Pemegang Saham" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nama" name="name" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Alamat" name="address" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tempat Tanggal Lahir" name="ttl" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="KTP/Anggaran Dasar" name="ktp" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="KTP/Anggaran Dasar" name="ktp_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="NPWP" name="npwp_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KK" name="kk" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="KK" name="kk_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Passport" name="passport" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Passport" name="passport_photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="Pas Foto" name="file_database" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('npwp')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="NPWP" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('nib')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="NIB" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KBLI" name="kbli" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('sipp')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="SIPP" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
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
