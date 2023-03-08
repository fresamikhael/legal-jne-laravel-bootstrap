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
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input value="Anggaran dasar perusahaan" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Judul Akta" name="title_deed" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Nama Notaris" name="notary_name" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Modal Dasar" name="modal_dasar" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    prefix="Rp" type="number" />
                                <x-input label="Modal Disetor" name="modal_disetor" labelClass="col-sm-2" prefix="Rp"
                                    fieldClass="col-sm-10" type="number" />
                                <label for="toplevel">
                                    <b>Identitas Petinggi Perusahaan</b>
                                </label>
                                <div class="pull-right">
                                    <a href="javascript:addTopLevel()" class="btn btn-primary btn-sm"><i
                                            class="fa fa-plus"></i>&nbsp; Tambah</a>
                                </div>
                                <br />
                                <br />
                                <table class="table table-bordered table-striped" width="100%" id="tblInputTopLevel">
                                    <thead>
                                        <th width="15%">Nama</th>
                                        <th width="15%">Negara Asal</th>
                                        <th width="15%">Jabatan</th>
                                        <th width="15%">Masa Jabatan</th>
                                        <th width="15%">Jumlah Saham</th>
                                        <th width="5%">Aksi</th>
                                    </thead>
                                    <tbody id="bodyInputTopLevel">
                                    </tbody>
                                </table>
                                <x-input label="Isi Akta" name="body" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                            </div>
                        </div>
                    @endslot

                    @slot('minister')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="SK Menteri Hukum dan Ham" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Jenis SK" name="sk_type" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                            </div>
                        </div>
                    @endslot

                    @slot('director')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Identitas Direksi" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nama" name="name" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Alamat" name="address" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Tempat Tanggal Lahir" name="ttl" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="KTP" name="ktp" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="file" label="KTP" name="file[ktp]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="file" label="NPWP" name="file[npwp]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="KK" name="kk" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="file" label="KK" name="file[kk]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Passport" name="passport" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="file" label="Passport" name="file[passport]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input type="file" label="Pas Foto" name="file[foto]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                            </div>
                        </div>
                    @endslot

                    @slot('commissioner')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Identitas Dewan Komisaris" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nama" name="name" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Alamat" name="address" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Tempat Tanggal Lahir" name="ttl" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="KTP" name="ktp" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="file" label="KTP" name="file[ktp]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="file" label="NPWP" name="file[npwp]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="KK" name="kk" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="file" label="KK" name="file[kk]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Passport" name="passport" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="file" label="Passport" name="file[passport]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input type="file" label="Pas Foto" name="file[foto]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                            </div>
                        </div>
                    @endslot

                    @slot('share')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Identitas Pemegang Saham" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nama" name="name" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Alamat" name="address" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Tempat Tanggal Lahir" name="ttl" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="KTP/Anggaran Dasar" name="ktp" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input type="file" label="KTP/Anggaran Dasar" name="file[ktp]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="file" label="NPWP" name="file[npwp]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="KK" name="kk" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="file" label="KK" name="file[kk]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Passport" name="passport" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="file" label="Passport" name="file[passport]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input type="file" label="Pas Foto" name="file[foto]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                            </div>
                        </div>
                    @endslot

                    @slot('npwp')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="NPWP" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                            </div>
                        </div>
                    @endslot

                    @slot('nib')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="NIB" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="KBLI" name="kbli" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                            </div>
                        </div>
                    @endslot

                    @slot('sipp')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="SIPP" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
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