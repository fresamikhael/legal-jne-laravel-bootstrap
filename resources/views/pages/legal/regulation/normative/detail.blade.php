@extends ('layouts.user')

@section('title')
    Detail Normatif
@endsection

@section('content')
    <x-base>
        <h2>Detail Regulasi - {{ $data->name }}</h2>
        <div class="container mt-4">
            <div class="form-group row">
                <label class="col-form-label" style="width: 10%;flex: 0 0 10%;max-width: 10%;">Item
                    name</label>
                <div class="col-form-label" style="width: 5%;flex: 0 0 5%;max-width: 5%;">:</div>
                <div class="col-sm-4 col-form-label">
                    {{ $data->name }}
                </div>
            </div>
            <div class="form-group row">
                <label class="col-form-label" style="width: 10%;flex: 0 0 10%;max-width: 10%;">Tipe Regulasi</label>
                <div class="col-form-label" style="width: 5%;flex: 0 0 5%;max-width: 5%;">:</div>
                <div class="col-sm-4 col-form-label">
                    {{ $data->type }}
                </div>
            </div>
            <div class="form-group row mt-3">
                <div class="col-sm-3 btn btn-primary justify-content-center col-form-label">
                    <a href="{{ route('download.regulation', substr($data->file, 11)) }}"
                        style="font-size:16px; color:white">
                        Unduh
                        <i class="fa fa-download"></i>
                    </a>
                </div>
            </div>
        </div>

    </x-base>
@endsection
