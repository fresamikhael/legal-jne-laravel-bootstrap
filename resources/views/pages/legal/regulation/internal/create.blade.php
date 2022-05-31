@extends ('layouts.legal')

@section('title')
    Add Regulasi Internal
@endsection

@section('content')
    <x-base>
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif
        <form class="mt-4" method="POST" enctype="multipart/form-data"
            action="{{ route('legal.regulation.internal-post') }}">
            @csrf

            <h2>Regulasi Internal</h2>
            <div class="row mt-4">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Regulasi" name="name" required></x-input>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Tipe Regulasi" name="type" required>
                    <option value="Peraturan Perusahaan">Peraturan Perusahaan</option>
                    <option value="SK Direksi">SK Direksi</option>
                    <option value="SE Direksi">SE Direksi</option>
                    <option value="Internal Memo (IM)">Internal Memo (IM)</option>
                </x-select>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Upload File" name="file" required></x-file>
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Upload" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
