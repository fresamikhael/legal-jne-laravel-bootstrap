@extends('layouts.legal')

@section('title')
    Tambah FAQ
@endsection

@section('content')
    <div class="container" style="margin-top: 140px">

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('legal-home') }}" style="color:#fe1717">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    FAQ</li>
                <li class="breadcrumb-item active" aria-current="page">
                    Tambah</li>
            </ol>
        </nav>

        <form action="{{ route('legal.faq-store') }}" enctype="multipart/form-data" method="POST">
            @csrf
            <div class="col-sm-12">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Judul FAQ" name="title" required />
                <label class="mb-3">Isi FAQ</label>
                <textarea name="description" id="editor"></textarea>
            </div>

            <div class="d-flex justify-content-end mt-3">
                <button class="btn btn-primary" type="submit">Tambah</button>
            </div>
        </form>
    </div>
@endsection
