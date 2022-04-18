@extends ('layouts.user')

@section('title')
    Add Regulasi Internal
@endsection

@section('content')
    <x-base>
        <h2>Regulasi Internal</h2>
        <div class="row mt-4">
            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Regulasi"></x-input>
            <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Tipe Regulasi"></x-select>
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Upload File"></x-file>
        </div>

        <div class="d-flex justify-content-end me-4">
            <x-button type="submit" name="Upload" buttonClass="btn-primary" />
        </div>
    </x-base>
@endsection
