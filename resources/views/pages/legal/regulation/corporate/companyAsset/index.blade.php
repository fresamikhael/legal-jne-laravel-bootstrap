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
                <x-asset-type>
                    @slot('sertipikathgb')
                    @endslot

                    @slot('sertipikathm')
                    @endslot

                    @slot('pbb')
                    @endslot

                    @slot('imb')
                    @endslot

                    @slot('slf')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input value="SLF" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Luas Bangunan" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input type="date" label="Masa Berlaku" name="validity_period" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                            </div>
                        </div>
                    @endslot

                    @slot('akta')
                    @endslot

                    @slot('ppjb')
                    @endslot

                    @slot('aph')
                    @endslot

                    @slot('vehicle')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input value="Kendaraan" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor Polisi" name="nopol" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Nomor BPKB" name="nobpkb" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Nomor Mesin" name="nomes" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Nomor Rangka" name="norangka" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Jenis Kendaraan" name="vehicle_type" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Nomor STNK" name="nostnk" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="date" label="Jangka Waktu STNK" name="time_period" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                            </div>
                        </div>
                    @endslot

                    @slot('hkihm')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Hak Kekayaan Intelektual Hak Merek" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor Sertifikat" name="number" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input type="date" label="Jangka Waktu" name="time_period" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input type="file" label="Gambar Logo/Merek" name="file[logo]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                            </div>
                        </div>
                    @endslot

                    @slot('hkihc')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Hak Kekayaan Intelektual Hak Cipta" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor Sertifikat" name="number" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input type="date" label="Jangka Waktu" name="time_period" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input type="file" label="Isi Ciptaan" name="file[ciptaan]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                            </div>
                        </div>
                    @endslot

                    @slot('hkidi')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Hak Kekayaan Intelektual Desain Industri" name="unit"
                                    labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor Sertifikat" name="number" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input type="date" label="Jangka Waktu" name="time_period" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input type="file" label="Jenis Desain" name="file[jenis_design]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                            </div>
                        </div>
                    @endslot
                </x-asset-type>
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Upload" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
