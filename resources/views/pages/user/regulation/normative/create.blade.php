@extends ('layouts.user')

@section('title')
    Add Regulasi Normatif
@endsection

@section('content')
    <x-base>
        <form class="mt-4" method="POST" enctype="multipart/form-data"
            action="{{ route('regulation.normative-post') }}">
            @csrf
            <h2>Regulasi Normatif</h2>
            <div class="row mt-4">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Regulasi" name="name"></x-input>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Tipe Regulasi" name="type">
                    @foreach ($type as $item)
                        <option value="{{ $item->name }}">{{ $item->name }}</option>
                    @endforeach
                </x-select>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Upload File" name="file"></x-file>
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Upload" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
