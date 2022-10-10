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
                <x-partner-type>
                    @slot('budget')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input value="Cabang Utama Anggaran dasar perusahaan" name="unit" labelClass="col-sm-2"
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
                                <x-input label="Masa Jabatan Direksi" name="comms_term_arr" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Nama Dewan Komisaris" name="comms_name" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Masa Jabatan Komisaris" name="comms_term" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Susunan Pemegang Saham" name="comms_arr" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Isi Akta" name="body" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('ham')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input value="Cabang Utama SK Hukum dan Ham" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Jenis SK" name="sk_type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('director')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Cabang Utama Identitas Direksi" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="KTP" name="ktp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Pas Foto" name="photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" type="file" required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('commissioner')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Cabang Utama Identitas Dewan Komisaris" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="KTP" name="ktp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Pas Foto" name="photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('share')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Cabang Utama Identitas Pemegang Saham" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="KTP/Anggaran Dasar" name="ktp" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Pas Foto" name="photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('npwp')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Cabang Utama NPWP" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('nib')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Cabang Utama NIB" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KBLI" name="kbli" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('budget1')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Cabang Anggaran dasar perusahaan" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Judul Akta" name="title_deed" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nama Notaris" name="notary_name" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Nama Direksi" name="director_name" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Masa Jabatan Direksi" name="comms_term_arr" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Nama Dewan Komisaris" name="comms_name" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Masa Jabatan Komisaris" name="comms_term" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Susunan Pemegang Saham" name="comms_arr" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Isi Akta" name="body" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('ham1')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Cabang SK Hukum dan Ham" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Jenis SK" name="sk_type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('director1')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Cabang Identitas Direksi" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="KTP" name="ktp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Pas Foto" name="photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" type="file" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('commissioner1')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Cabang Identitas Dewan Komisaris" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="KTP" name="ktp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Pas Foto" name="photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('share1')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Cabang Identitas Pemegang Saham" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="KTP/Anggaran Dasar" name="ktp" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Pas Foto" name="photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('npwp1')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Cabang NPWP" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('nib1')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Cabang NIB" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input label="Nomor" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KBLI" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('budget2')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Agen Anggaran dasar perusahaan" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Judul Akta" name="title_deed" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nama Notaris" name="notary_name" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Nama Direksi" name="director_name" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Masa Jabatan Direksi" name="comms_term_arr" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Nama Dewan Komisaris" name="comms_name" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Masa Jabatan Komisaris" name="comms_term" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Susunan Pemegang Saham" name="comms_arr" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Isi Akta" name="body" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('ham2')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Agen SK Hukum dan Ham" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Jenis SK" name="sk_type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('director2')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Agen Identitas Direksi" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="KTP" name="ktp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Pas Foto" name="photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" type="file" required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('commissioner2')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Agen Identitas Dewan Komisaris" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="KTP" name="ktp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Pas Foto" name="photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('share2')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Agen Identitas Pemegang Saham" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="KTP/Anggaran Dasar" name="ktp" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Pas Foto" name="photo" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('npwp2')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Agen NPWP" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot

                    @slot('nib2')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Agen NIB" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input label="Nomor" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="date" label="Tanggal" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="KBLI" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="File Upload" name="file" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                    @endslot
                </x-partner-type>
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Upload" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
