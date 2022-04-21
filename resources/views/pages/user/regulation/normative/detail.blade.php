@extends ('layouts.user')

@section('title')
    Detail Normatif
@endsection

@section('content')
    <x-base>
        <h2>Detail Regulasi</h2>
        <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Item name
                :</label>
            <div class="col-sm-4 col-form-label">
                {{ $data->name }}
            </div>
        </div>
        <div class="form-group row">
            <label for="inputNIK" class="col-sm-2 col-form-label">Detail
                :</label>
            <div class="col-sm-4 col-form-label">
                {{ $data->type }}
            </div>
        </div>

    </x-base>
@endsection
