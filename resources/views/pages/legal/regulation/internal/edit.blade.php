@extends ('layouts.legal')

@section('title')
    Edit Database Umum
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
                                    style="color:#fe1717">Umum</a>
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
                    <a href={{ route('legal.regulation.add-type') }} class="btn btn-primary">Tipe Regulasi</a>
                </div>
            </div>
        </div>
        <form class="mt-4" method="POST" enctype="multipart/form-data"
            action="{{ route('legal.regulation.public-update', $data->id) }}">
            @csrf
            <div class="row mt-4">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Regulasi" name="name"
                    value="{{ $data->name }}">
                </x-input>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Tipe Regulasi" name="type">
                    <option value="{{ $data->type }}" selected>{{ $data->type }}</option>
                    <option value="" disabled>----------------------------</option>
                    @foreach ($type as $t)
                        <option value="{{ $t->name }}">{{ $t->name }}</option>
                    @endforeach
                </x-select>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Direktorat/Divisi/Departement"
                    value="{{ $data->agency }}" name="agency" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Peraturan" value="{{ $data->number }}"
                    name="number" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Peraturan" name="date"
                    value="{{ $data->date }}" type="date" />
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Tentang</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="about" id="floatingTextarea2" style="height: 100px">{{ $data->about }}</textarea>
                    </div>
                </div>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Unit" name="unit">
                    <option value="{{ $data->unit }}" selected>{{ $data->unit }}</option>
                    <option value="" disabled>----------------------------</option>
                    <option value="Drafting">Drafting</option>
                    <option value="Litigation">Litigation</option>
                    <option value="Permit">Permit</option>
                    <option value="Corporate">Corporate</option>
                </x-select>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Ditetapkan"
                    value="{{ $data->set_date }}" type="date" name="set_date" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Status Peraturan" name="status">
                    <option value="{{ $data->status }}" selected>{{ $data->status }}</option>
                    <option value="" disabled>----------------------------</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </x-select>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="File Sebelumnya" type="download"
                    path="{{ asset($data->file) }}" blank>Lihat <i class="fa fa-eye"></i></x-file>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Upload File" name="file"></x-file>
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Upload" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
