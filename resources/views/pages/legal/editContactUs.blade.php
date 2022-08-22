@extends ('layouts.legal')

@section('title')
    Hubungi Kami
@endsection

@section('content')
    <div class="container" style="margin-top: 140px">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('legal-home') }}" style="color:#fe1717">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Hubungi Kami</li>
                <li class="breadcrumb-item active" aria-current="page">
                    Ubah</li>
            </ol>
        </nav>

        <form action="{{ route('legal.contact-us-store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="col-sm-12">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Lokasi pada GMaps" name="maps"
                    value="{{ $data->maps ?? '' }}" required />
                <label class="mb-3">Isi Hubungi Kami</label>
                <textarea name="body" id="editor">{!! $data->body ?? '' !!}</textarea>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <button class="btn btn-primary" type="submit">Submit</button>
            </div>
        </form>
    </div>
@endsection
