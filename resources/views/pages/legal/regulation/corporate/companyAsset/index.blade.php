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
                                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="Kendaraan" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Tentang</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" ></textarea>
                                    </div>
                                </div>
                                <x-input label="Nomor Polisi" name="nopol" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Nomor BPKB" name="nobpkb" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Nomor Mesin" name="nomes" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Nomor Rangka" name="norangka" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Jenis Kendaraan" name="vehicle_type" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Nomor STNK" name="nostnk" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <div class="mb-3 row">
                                    <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Awal STNK</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control dates cannot_texting" id="date"
                                                name="date_awal" />
                                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Akhir STNK</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control dates cannot_texting" id="date"
                                                name="date_akhir" />
                                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                                        </div>
                                    </div>
                                </div>
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
                                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input value="Hak Kekayaan Intelektual Hak Merek" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor Sertifikat" name="number" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Tentang</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" ></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Awal</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control dates cannot_texting" id="date"
                                                name="date_awal" />
                                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Akhir</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control dates cannot_texting" id="date"
                                                name="date_akhir" />
                                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                                        </div>
                                    </div>
                                </div>
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
                                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input value="Hak Kekayaan Intelektual Hak Cipta" name="unit" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor Sertifikat" name="number" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Tentang</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" ></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Awal</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control dates cannot_texting" id="date"
                                                name="date_awal" />
                                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Akhir</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control dates cannot_texting" id="date"
                                                name="date_akhir" />
                                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                                        </div>
                                    </div>
                                </div>
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
                                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" hidden />
                                <x-input value="Hak Kekayaan Intelektual Desain Industri" name="unit"
                                    labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor Sertifikat" name="number" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Tentang</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" ></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Awal</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control dates cannot_texting" id="date"
                                                name="date_awal" />
                                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Akhir</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control dates cannot_texting" id="date"
                                                name="date_akhir" />
                                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                                        </div>
                                    </div>
                                </div>
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
