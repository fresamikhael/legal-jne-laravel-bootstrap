@extends ('layouts.legal')

@section('title')
    Tambah Klinik Hukum
@endsection

@section('content')
    <x-base>
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif
        <form class="mt-4" method="POST" enctype="multipart/form-data"
            action="{{ route('legal.information.store') }}">
            @csrf

            <h2>Tambah Klinik Hukum</h2>
            <div class="row mt-4">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Judul Klinik" name="name" required></x-input>
                <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Tentang" name="body" required>
                </x-textarea>
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Submit" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
