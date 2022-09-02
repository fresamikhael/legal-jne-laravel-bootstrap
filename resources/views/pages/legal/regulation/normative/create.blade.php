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
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Dokumen" name="name" required>
                </x-input>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Dokumen" name="type" required>
                    @foreach ($type as $t)
                        <option value="{{ $t->name }}">{{ $t->name }}</option>
                    @endforeach
                </x-select>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Dikeluarkan/Mitra" name="agency" required />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Dokumen" name="number" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Dokumen" type="date" name="date"
                    required />
                {{-- <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Tentang" name="about" required /> --}}
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Tentang</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="about" id="floatingTextarea2" style="height: 100px" required></textarea>
                    </div>
                </div>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Unit" name="unit" required>
                    <option value="Drafting">Drafting</option>
                    <option value="Litigation">Litigation</option>
                    <option value="Permit">Permit</option>
                    <option value="Corporate">Corporate</option>
                </x-select>
                <input type="hidden" name="privilege" value="RESTRICTED">
                <div class="col-sm-12">
                    <label for="">Note terkait dokumen</label>
                </div>
                <div class="col-sm-12 mb-3">
                    <textarea name="note" id="editor"></textarea>
                </div>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal" type="date" name="set_date"
                    value="{{ Carbon\Carbon::today()->toDateString() }}" required />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7"
                    label="Update Dokumen(diisi apabila dokumen ini pembaharuan dari dokumen sebelumnya)"
                    name="historical_id">
                    @foreach ($database as $d)
                        <option value="{{ $d->id }}">{{ $d->name }} | {{ $d->type }}</option>
                    @endforeach
                </x-select>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Status Dokumen" name="status" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </x-select>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Upload File" name="file_database[]" multiple />
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Upload" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
