@extends ('layouts.user')

@section('title')
    Hubungi Kami
@endsection

@section('content')
    <div class="container" style="margin-top: 140px">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color:#fe1717">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Hubungi Kami</li>
            </ol>
        </nav>

        <div class="d-flex">
            <div class="col-sm-12">
                <div class="col-sm-6">
                    <iframe src="{{ $data->maps ?? '' }}" width="1115" height="450" style="border:0;" class="mt-3"
                        allowfullscreen="" loading="lazy"></iframe>
                </div>
                <div class="row-sm-6 mt-3">
                    <ul class="row-3">
                        {!! $data->body ?? '' !!}
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
