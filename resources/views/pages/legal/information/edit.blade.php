@extends ('layouts.legal')

@section('title')
    Ubah Informasi
@endsection

@section('content')
    <x-base>
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif
        <form class="mt-4" method="POST" enctype="multipart/form-data"
            action="{{ route('legal.information.update', $data->id) }}">
            @csrf

            <div class="row mt-4">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Lengkap" name="name"
                    value="{{ $data->name }}"></x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Email" name="email"
                    value="{{ $data->email }}"></x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jabatan" name="position"
                    value="{{ $data->position }}"></x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Spesialis" name="expertise"
                    value="{{ $data->expertise }}"></x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Departemen/Cabang" name="location"
                    value="{{ $data->location }}">
                </x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="No. Telepon" name="phone"
                    value="{{ $data->phone }}">
                </x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" type="file" label="Foto" name="photo">
                </x-input>
                <div class="col-sm-12">
                    <label>Isi Deskripsi Mengenai Legal</label>
                    <textarea name="description" id="editor">{!! $data->description !!}</textarea>
                </div>
            </div>

            <div class="d-flex justify-content-end me-4 mt-3">
                <x-button type="submit" name="Submit" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
