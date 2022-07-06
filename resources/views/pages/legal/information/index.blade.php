@extends('layouts.legal')

@section('title')
    Informasi
@endsection

@section('content')
    <style>
        .card {
            box-shadow: 0 0 30px rgba(0, 0, 0, 0.5 green, blue, alpha);
            overflow: hidden;
            border-radius: 15px;
            margin: 5px;
        }

        .img1 img {
            height: 200px;
            border-top-right-radius: 15px;
            border-top-left-radius: 15px;
            width: 100%;
        }

        .img2 img {
            position: relative;
            display: block;
            margin-left: auto;
            margin-right: auto;
            z-index: 1;
            width: 140px;
            height: 140px;
            border-radius: 50%;
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
        <div class="container">
            <div class="row g-2">

                @if (Session::get('message_success'))
                    @slot('alert')
                        <x-alert message="{{ Session::get('message_success') }}" type="success" />
                    @endslot
                @endif

                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('legal-home') }}" style="color:#fe1717">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Informasi</li>
                    </ol>
                </nav>

                <div class="row">
                    <div class="col-md-4">
                        <a href="{{ route('legal.information.add') }}" class="btn btn-primary"><i class="fas fa-plus"></i>
                            Tambah
                            Data</a>
                    </div>
                </div>

                @foreach ($database as $row)
                    <div class="col-md-4">
                        <a href="{{ route('legal.information.show', $row->id) }}" style="color:black">
                            <div class="card mt-3">
                                {{-- <div class="img1"><img src="/images/backgroun.jpg" alt=""></div> --}}
                                <div class="img2"><img src="{{ asset($row->photo) }}" alt=""></div>
                                <div class="main-text">
                                    <h2>{{ $row->name }}</h2>
                                    <p>{{ $row->position }} | {{ $row->expertise }}
                                        | {{ $row->location }}</p>
                                </div>
                                <div class="socials">
                                    <i class="fas fa-envelope">
                                        <p>Email</p>
                                    </i>
                                    <i class="fas fa-phone">
                                        <p>{{ $row->phone }}</p>
                                    </i>
                                    {{-- <i class="fa fa-facebook"></i>
                                <i class="fa fa-facebook"></i> --}}
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>
    </x-base>
@endsection
