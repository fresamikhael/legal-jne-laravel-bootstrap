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
                <x-asset-type>
                    @slot('sertipikathgb')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor Sertipikat" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal Sertipikat" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Luas Tanah" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <label for="">Obyek Tanah</label>
                                <x-input label="Provinsi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Kab/Kota" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Kecamatan" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Desa/Kel" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Jalan" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Jangka Waktu" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nomor Surat Ukur" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('sertipikathm')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor Sertipikat" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal Sertipikat" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Luas Tanah" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <label for="">Obyek Tanah</label>
                                <x-input label="Provinsi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Kab/Kota" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Kecamatan" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Desa/Kel" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Jalan" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nomor Surat Ukur" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('pbb')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="NOP" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="NJOP" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nilai PBB" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('imb')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Lokasi" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Luas Bangunan" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Retribusi" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('slf')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Lokasi" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Luas Bangunan" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Masa Berlaku" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('akta')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nilai Transaksi" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="PPAT" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Lokasi" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nama Penjual" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('ppjb')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nilai Transaksi" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Notaris" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Lokasi" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nama Penjual" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('aph')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nilai Transaksi" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Notaris" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Lokasi" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nama Penjual" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('vehicle')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor Polisi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nomor BPKB" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Nomor Mesin" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Nomor Rangka" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Jenis Kendaraan" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Nomor STNK" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Jangka Waktu STNK" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('hkihm')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor Sertipikat" name="location" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Jangka Waktu" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Gambar Logo/Merek" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('hkihc')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor Sertipikat" name="location" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Jangka Waktu" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Isi Ciptaan" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('hkidi')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor Sertipikat" name="location" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Jangka Waktu" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Jenis Desain" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
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
