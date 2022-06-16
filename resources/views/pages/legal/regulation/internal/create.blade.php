@extends ('layouts.legal')

@section('title')
    Add Regulasi Internal
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
            action="{{ route('legal.regulation.internal-post') }}">
            @csrf
            <div class="row mt-4">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Regulasi" name="name" required>
                </x-input>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Tipe Regulasi" name="type" required>
                    <option value="Peraturan Perusahaan">Peraturan Perusahaan</option>
                    <option value="SK Direksi">SK Direksi</option>
                    <option value="SE Direksi">SE Direksi</option>
                    <option value="Internal Memo (IM)">Internal Memo (IM)</option>
                </x-select>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Instansi" name="agency" required />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Peraturan" name="rule_number" required />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tahun Peraturan" name="rule_year" required />
                {{-- <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Tentang" name="about" required /> --}}
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Tentang</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" name="about" id="floatingTextarea2" style="height: 100px" required></textarea>
                    </div>
                </div>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Ditetapkan" type="date"
                    name="set_date" required />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Diundangkan" type="date"
                    name="promulgation_date" required />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor BN" type="text" name="bn_number"
                    required />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor TBN" name="tbn_number" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Status Peraturan" name="status" required>
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </x-select>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Hak Akses Peraturan" name="privilege" required>
                    <option value="ALL">Semua</option>
                    <option value="RESTRICTED">Terbatas</option>
                </x-select>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Upload File" name="file" required></x-file>
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Upload" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
