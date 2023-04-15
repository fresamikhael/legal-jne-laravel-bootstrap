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
                <div class="mb-3 row">
                    <label for="ads_type" class="col-sm-2 col-form-label">Tipe Dokumen</label>
                    <div class="col-sm-10">
                        <select required name="ads_type" id="ads_type" class="form-select">
                            <option class="d-none">-- Pilih --</option>
                            <option value="SKPD">SKPD</option>
                            <option value="TLBBR">TLBBR</option>
                            <option value="IPR">IPR</option>
                            <option value="IMBBR">IMBBR</option>
                        </select>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <label for="">Lokasi</label>
                        <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                        <x-input value="SKPD" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                        <x-input value="Izin Reklame" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                        <x-address-custom label="" classLabel="col-sm-2" name="" classField="col-sm-10" />
                        <x-input label="Nomor Perizinan" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        <div class="mb-3 row">
                            <label class="col-sm-2 col-form-label">Tentang</label>
                            <div class="col-sm-10">
                                <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" ></textarea>
                            </div>
                        </div>
                        <x-input type="date" label="Tanggal Penerbitan" name="date" labelClass="col-sm-2"
                            fieldClass="col-sm-10" />
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
                        <x-input label="Ukuran" name="size" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        <x-input label="Nilai Pajak" name="tax_value" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        <x-input type="file" label="Foto Reklame" name="file[foto_reklame]" labelClass="col-sm-2"
                            fieldClass="col-sm-10" />
                        <x-input label="Teks Reklame" name="ads_text" labelClass="col-sm-2" fieldClass="col-sm-10" />
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
