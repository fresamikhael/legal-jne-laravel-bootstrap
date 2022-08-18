@extends('layouts.legal')

@section('title')
    Edit Regulasi
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
                            <li class="breadcrumb-item"><a href="{{ route('legal.database.index') }}"
                                    style="color:#fe1717">Regulasi</a>
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
                    <a href={{ route('legal.database.add-type') }} class="btn btn-primary">Tipe Regulasi</a>
                </div>
            </div>
        </div>

        <form method="POST" enctype="multipart/form-data" action="{{ route('legal.database.update', $data->id) }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Peraturan" name="name"
                        value="{{ $data->name }}" required />
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Peraturan" name="type" required>
                        <option value="{{ $data->type }}" selected>{{ $data->type }}</option>
                        <option value="" disabled>----------------------------</option>
                        @foreach ($type as $t)
                            <option value="{{ $t->name }}">{{ $t->name }}</option>
                        @endforeach
                    </x-select>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Instansi" value="{{ $data->entity }}"
                        name="entity" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Peraturan"
                        value="{{ $data->number }}" name="number" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tahun Peraturan"
                        value="{{ $data->year }}" name="year" required />
                    <div class="mb-3 row">
                        <label class="col-sm-5 col-form-label">Tentang</label>
                        <div class="col-sm-7">
                            <textarea class="form-control" name="about" id="floatingTextarea2" style="height: 100px" required>{{ $data->about }}</textarea>
                        </div>
                    </div>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Ditetapkan"
                        value="{{ $data->set_date }}" type="date" name="set_date" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Diundangkan" type="date"
                        name="promulgated_date" value="{{ $data->promulgated_date }}" required />
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Status Peraturan" name="status" required>
                        <option value="{{ $data->status }}" selected>{{ $data->status }}</option>
                        <option value="" disabled>----------------------------</option>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </x-select>
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis" name="privilege" required>
                        <option value="{{ $data->privilege }}" selected>
                            @if ($data->privilege == 'ALL')
                                Peraturan Umum
                            @else
                                Peraturan Khusus
                            @endif
                        </option>
                        <option value="" disabled>----------------------------</option>
                        <option value="ALL">Peraturan Umum</option>
                        <option value="RESTRICTED">Peraturan Khusus</option>
                    </x-select>
                    @foreach ($data->file as $file)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="File Sebelumnya" type="download"
                            path="{{ asset($file->name) }}" blank>Lihat <i class="fa fa-eye"></i></x-file>
                    @endforeach
                    @if ($data->historical_id)
                        <x-select labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="Update Dokumen(diisi apabila dokumen ini pembaharuan dari dokumen sebelumnya)"
                            name="historical_id" required>
                            @foreach ($database as $d)
                                <option value="{{ $d->id }}">{{ $d->name }} | {{ $d->type }}</option>
                            @endforeach
                        </x-select>
                    @else
                    @endif
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Upload File" name="file_database[]"
                        multiple />
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
