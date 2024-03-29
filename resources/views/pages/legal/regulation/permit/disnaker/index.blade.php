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
                        <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                        <x-input value="Disnaker" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                        <x-select labelClass="col-sm-2" fieldClass="col-sm-10" label="Unit" name="unit">
                            <option value="WLTK">WLTK</option>
                            <option value="BPJS Ketenagakerjaan">BPJS Ketenagakerjaan</option>
                            <option value="Peraturan Perusahaan">Peraturan Perusahaan</option>
                            <option value="LKS Bipartit">LKS Bipartit</option>
                            <option value="P2K3">P2K3</option>
                            <option value="SMK3">SMK3</option>
                        </x-select>
                        <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        <x-input type="date" label="Tanggal Penerbitan" name="date" labelClass="col-sm-2"
                            fieldClass="col-sm-10" />
                        <x-input type="date" label="Masa Berlaku" name="validity_period" labelClass="col-sm-2"
                            fieldClass="col-sm-10" />
                        <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                            fieldClass="col-sm-10" multiple />
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
