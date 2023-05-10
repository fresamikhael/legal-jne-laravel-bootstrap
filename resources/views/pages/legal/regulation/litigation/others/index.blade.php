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
        <form action="{{ route('legal.regulation.normative-post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-4">
                <div class="col-sm-12">
                    <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                    <x-input value="Litigasi" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                    <x-input value="Others" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                    <x-input value="Others" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                    <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                    <div class="mb-3 row">
                        <label class="col-sm-2 col-form-label">Tentang</label>
                        <div class="col-sm-10">
                            <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2"></textarea>
                        </div>
                    </div>
                </div>
                <br />
                <br />
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Penggugat"
                            name="litigation[sender_name]" type="text" />
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Tergugat"
                            name="litigation[receiver_name]" required />
                        <hr>
                        <div class="col-sm-3">
                            <h4>Alamat Penggugat/Tergugat :</h4>
                        </div>
                        <x-address label="Penggugat/Tergugat" name="sender" />
                        <hr>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <x-textarea label="Kronologis Singkat Kejadian:" name="litigation[incident_chronology]" />
                    </div>
                </div>
                <hr>
                <div class="row mt-3">
                    <div class="col-sm-3">
                        <h5>Upload Dokumen :</h5>
                    </div>
                    <div class="col-sm-9">
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Disposisi Management"
                            name="file[disposisi_manajemen]" />
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Akta Pendirian dan Perubahan Terakhir"
                            name="file[akta_pendirian_perubahan]" />
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. SK Menkumham"
                            name="file[sk_menkumham]" />
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. KTP Direksi"
                            name="file[ktp_direksi]" />
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. NPWP" name="file[npwp]" />
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. NIB" name="file[nib]" />
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Dokumen Pendukung Lainnya"
                            name="file[][other]" multiple />
                    </div>
                </div>
            </div>
            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-primary" />
            </div>
        </form>
    </x-base>
@endsection
