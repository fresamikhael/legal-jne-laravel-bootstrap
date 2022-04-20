@extends ('layouts.user')

@section('title')
    Regulasi
@endsection

@section('content')
    <div class="container" style="margin-top: 140px">
        <div class="d-flex">
            <div class="col-lg-3 me-5">
                <x-card style="margin-top: 300px" href2="{{ route('regulation.internal') }}"
                    href="{{ route('regulation.internal-create') }}">Regulasi Internal</x-card>
            </div>
            <div class="col-lg-3 me-5">
                <x-card style="margin-top: 300px" href2="{{ route('regulation.normative') }}"
                    href="{{ route('regulation.normative-create') }}">Regulasi Normatif</x-card>
            </div>
        </div>
    </div>
@endsection