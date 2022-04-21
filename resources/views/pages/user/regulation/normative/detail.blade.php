@extends ('layouts.user')

@section('title')
    Detail Normatif
@endsection

@section('content')
    <x-base>
        <h2>Detail Regulasi</h2>
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
                <label class="col-form-label" style="width: 10%;flex: 0 0 10%;max-width: 10%;">Detail</label>
                <div class="col-form-label" style="width: 5%;flex: 0 0 5%;max-width: 5%;">:</div>
                <div class="col-sm-4 col-form-label">
                    {{ $data->type }}
                </div>
            </div>
            <div class="form-group row">
                <a href="{{ route('download-Regulation', substr($data->file, 11)) }}" style="font-size:24px ">
                    <div
                        class="col-sm-3 col-form-label text-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                        Download
                        <i class="fa fa-download"></i>
                    </div>
                </a>
            </div>
        </div>

    </x-base>
@endsection
