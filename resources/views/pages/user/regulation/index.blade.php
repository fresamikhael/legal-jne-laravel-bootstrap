@extends ('layouts.user')

@section('title')
    Regulasi
@endsection

@section('content')
    <div class="container" style="margin-top: 140px">
        <div class="d-flex">
            <div class="col-lg-3 me-5">
                <x-card-one-button style="margin-top: 300px" href2="{{ route('regulation.internal') }}">Regulasi Internal
                </x-card-one-button>
            </div>
            <div class="col-lg-3 me-5">
                <x-card-one-button style="margin-top: 300px" href2="{{ route('regulation.normative') }}">Regulasi Normatif
                </x-card-one-button>
            </div>
        </div>
    </div>
@endsection
