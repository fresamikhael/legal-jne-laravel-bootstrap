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
        <form class="mt-4" method="POST" enctype="multipart/form-data" action="{{ route('middle-home-store') }}">
            @csrf

            <div class="row mt-4">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Text 1" name="t1" required></x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Foto 1" type="file" name="p1" required>
                </x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Text 2" name="t2" required>
                </x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Foto 2" type="file" name="p2" required>
                </x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Text 3" name="t3" required>
                </x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Foto 3" type="file" name="p3" required>
                </x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Text 4" name="t4" required>
                </x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Foto 4" type="file" name="p4" required>
                </x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Text 5" name="t5" required>
                </x-input>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Foto 5" type="file" name="p5" required>
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
