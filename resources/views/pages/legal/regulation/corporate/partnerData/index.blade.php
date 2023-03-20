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
                <div class="mb-3 row">
                    <label for="partner_type" class="col-sm-2 col-form-label">Tipe Dokumen</label>
                    <div class="col-sm-10">
                        <select required name="unit" id="unit" class="form-select"
                            aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            <option value="Cabang Utama">Cabang Utama</option>
                            <option value="Cabang">Cabang</option>
                            <option value="Agen">Agen</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                        <x-input value="Data Mitra" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                        <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        <x-address-custom label="" classLabel="col-sm-2" name="" classField="col-sm-10" />
                        <x-input type="date" label="Jangka Waktu Penjanjian Awal" name="date_awal" labelClass="col-sm-2"
                            fieldClass="col-sm-10" />
                        <x-input type="date" label="Jangka Waktu Penjanjian Akhir" name="date_akhir"
                            labelClass="col-sm-2" fieldClass="col-sm-10" />
                        <x-input label="Nama Badan Hukum" name="legal_name" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        <label for="toplevel">
                            <b>Identitas Pengurus Perseroan</b>
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
                        <x-input type="file" label="Akta" name="file[akta][]" labelClass="col-sm-2"
                            fieldClass="col-sm-10" multiple />
                        <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                            fieldClass="col-sm-10" multiple />
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Upload" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
