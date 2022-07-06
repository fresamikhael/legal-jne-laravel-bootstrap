@extends ('layouts.legal')

@section('title')
    Tambah Informasi
@endsection

@section('content')
    <x-base>
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif
        <form class="mt-4" method="POST" enctype="multipart/form-data" action="{{ route('legal.information.store') }}">
            @csrf

            <h2>Tambah Data</h2>
            <div class="row mt-4">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Lengkap" name="name" required></x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jabatan" name="position" required></x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Spesialis" name="expertise" required></x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Departemen/Cabang" name="location" required>
                </x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="No. Telepon" name="phone" required>
                </x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" type="file" label="Foto" name="photo" required>
                </x-input>
                <div class="col-sm-12">
                    <label>Isi Deskripsi Mengenai Legal</label>
                    <textarea name="description" id="editor"></textarea>
                </div>
            </div>

            <div class="d-flex justify-content-end me-4 mt-3">
                <x-button type="submit" name="Submit" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
