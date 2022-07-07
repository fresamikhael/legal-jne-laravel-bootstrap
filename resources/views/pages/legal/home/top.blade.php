@extends ('layouts.legal')

@section('title')
    Ubah Halaman Depan
@endsection

@section('content')
    <x-base>
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif
        <form class="mt-4" method="POST" enctype="multipart/form-data" action="{{ route('top-home-store') }}">
            @csrf

            <div class="row mt-4">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Text 1(Sedang)" name="t1" required></x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Text 2(Besar)" name="t2" required></x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Subtitle(Kecil)" name="t3" required>
                </x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" type="file" label="Foto" name="photo" required>
                </x-input>
            </div>

            <div class="d-flex justify-content-end me-4 mt-3">
                <x-button type="submit" name="Submit" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
