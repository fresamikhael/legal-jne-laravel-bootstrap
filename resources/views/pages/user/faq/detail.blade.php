@extends('layouts.user')

@section('title')
    Detail Informasi
@endsection

@section('content')
    <style>
        .card {
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5 green, blue, alpha);
            overflow: hidden;
            border-radius: 15px;
            margin: 5px;
        }

        .img2 img {
            position: relative;
            display: block;
            margin-right: auto;
            z-index: 1;
            width: 140px;
            height: 140px;
            margin-top: 40px
        }

        .card:hover .img2 img {
            border-color: darkcyan;
            transition: .7s;
        }

        .main-text {
            padding: 30px 0;
            text-align: center;
        }

        .main-text h2 {
            text-transform: uppercase;
            font-weight: 900;
            font-size: 20px;
            margin: 0 0 20px;
        }

        .main-text p {
            font-size: 16px;
            padding: 0 35px;
        }

        .socials {
            text-align: center;
            padding-bottom: 20px;
        }

        .socials i {
            font-size: 20px;
            color: #fe1717;
            padding: 0 10px;
        }

        .socials i p {
            text-transform: none;
            font-size: 13px;
        }
    </style>
    <x-base>
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif

        <div class="row">
            <div class="col-sm-12">
                <div class="m-4">
                    <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color:#fe1717">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('faq-index') }}" style="color:#fe1717">FAQ</a></li>
                            <li class="breadcrumb-item active" aria-current="page">
                                {{ $database->title }}</li>
                        </ol>
                    </nav>
                    <h1>{{ $database->title }}</h1>
                    <p>{!! $database->description !!}</p>
                </div>
                {{-- </div> --}}
                {{-- </div> --}}
            </div>
            {{-- <div class="col-sm-4">
                <div style="background-color:#fe3f40">
                    <div class="col px-4 py-3" style="color: white">
                        <i class="fa-solid fa-align-left"></i>
                        <span>Dokumen</span>
                    </div>
                </div>
                <div class="p-3 border bg-white">
                    <div class="border rounded p-3"
                        style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                        @foreach ($database->file as $file)
                            <a href="{{ asset($file->name) }}" target="_blank">
                                <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div> --}}
        </div>
    </x-base>
@endsection
