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
                <x-partner-type>
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
                                <x-input label="Masa Jabatan Direksi" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Nama Dewan Komisaris" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Masa Jabatan Komisaris" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Susunan Pemegang Saham" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Masa Jabatan Komisaris" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <div class="col-sm-12">
                                    <label for="">Isi Akta</label>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <textarea name="note" id="editor"></textarea>
                                </div>
                            </div>
                        </div>
                    @endslot

                    @slot('ham')
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
                                <x-input label="KTP" name="ads_size" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input label="NPWP" name="ads_height" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Pas Foto" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" type="file" required />
                            </div>
                        </div>
                    @endslot

                    @slot('commissioner')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="KTP" name="branch_village" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="NPWP" name="branch_district" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Pas Foto" name="branch_postal_code" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('share')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="KTP/Anggaran Dasar" name="branch_village" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="NPWP" name="branch_district" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Pas Foto" name="branch_postal_code" labelClass="col-sm-2"
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

                    @slot('budget1')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Judul Akta" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nama Notaris" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Nama Direksi" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Masa Jabatan Direksi" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Nama Dewan Komisaris" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Masa Jabatan Komisaris" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Susunan Pemegang Saham" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Masa Jabatan Komisaris" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <div class="col-sm-12">
                                    <label for="">Isi Akta</label>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <textarea name="note" id="editor"></textarea>
                                </div>
                            </div>
                        </div>
                    @endslot

                    @slot('ham1')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Jenis SK" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('director1')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="KTP" name="ads_size" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="NPWP" name="ads_height" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Pas Foto" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" type="file" required />
                            </div>
                        </div>
                    @endslot

                    @slot('commissioner1')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="KTP" name="branch_village" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="NPWP" name="branch_district" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Pas Foto" name="branch_postal_code" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('share1')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="KTP/Anggaran Dasar" name="branch_village" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="NPWP" name="branch_district" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Pas Foto" name="branch_postal_code" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('npwp1')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('nib1')
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

                    @slot('budget2')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Judul Akta" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Nama Notaris" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Nama Direksi" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Masa Jabatan Direksi" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Nama Dewan Komisaris" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Masa Jabatan Komisaris" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Susunan Pemegang Saham" name="surface_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Masa Jabatan Komisaris" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <div class="col-sm-12">
                                    <label for="">Isi Akta</label>
                                </div>
                                <div class="col-sm-12 mb-3">
                                    <textarea name="note" id="editor"></textarea>
                                </div>
                            </div>
                        </div>
                    @endslot

                    @slot('ham2')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Jenis SK" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('director2')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="KTP" name="ads_size" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="NPWP" name="ads_height" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Pas Foto" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" type="file" required />
                            </div>
                        </div>
                    @endslot

                    @slot('commissioner2')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="KTP" name="branch_village" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="NPWP" name="branch_district" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Pas Foto" name="branch_postal_code" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('share2')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="KTP/Anggaran Dasar" name="branch_village" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="NPWP" name="branch_district" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input type="file" label="Pas Foto" name="branch_postal_code" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                            </div>
                        </div>
                    @endslot

                    @slot('npwp2')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nomor" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Tanggal" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                            </div>
                        </div>
                    @endslot

                    @slot('nib2')
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
                </x-partner-type>
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Upload" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
