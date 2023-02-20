@extends('layouts.legal')

@section('title')
    Home
@endsection

@section('content')
    @php
        $banner = [
            [
                'src' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Ferika-production.nos.jkt-1.neo.id%2Fheaders%2F72%2F01%2F172%2F20190305-PackageMedia-Banner-JNE.jpg&f=1&nofb=1',
            ],
            [
                'src' => 'https://external-content.duckduckgo.com/iu/?u=http%3A%2F%2Fwww.jne.co.id%2Fcontents%2Fbanner-product-detail-38.jpg&f=1&nofb=1',
            ],
            [
                'src' => 'https://external-content.duckduckgo.com/iu/?u=https%3A%2F%2Fwww.jne.co.id%2Fcontents%2Fcsr-banner-6.jpg&f=1&nofb=1',
            ],
        ];
    @endphp

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container" style="margin-top: -100px">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                                <h6>{{ $top->t1 ?? '' }}</h6>
                                <h2>

                                    <em>{{ $top->t2 ?? '' }}</em>
                                </h2>
                                <p>
                                    {{ $top->t3 ?? '' }}
                                </p>
                                <a href="#services" class="btn btn-danger">Pengajuan <i class="fas fa-arrow-right"></i></a>
                                {{-- <a href="{{ route('top-home') }}" class="btn btn-danger">Ubah Halaman Ini <i
                                        class="fas fa-edit"></i></a> --}}
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{ asset($top->photo ?? '') }}" alt="team meeting" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="services" class="our-portfolio section">
        <div class="container" style="margin-top: -200px">
            <div class="row">
                <div class="col-lg-6 offset-lg-3">
                    <div class="section-heading wow bounceIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <h2>
                            See What Our Company <em>Offers</em> &amp; What We
                            <span>Provide</span>
                        </h2>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6 mb-3">
                    {{-- <a href="{{ route('foot-home') }}" class="btn btn-danger">Ubah Halaman Ini <i
                            class="fas fa-edit"></i></a> --}}
                </div>
            </div>
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="hidden-content">
                                <h4>Drafting</h4>
                                <p>{{ $foot->t1 ?? '' }}</p>
                            </div>
                            <div class="showed-content">
                                <img src="{{ url('/images/hero.png') }}" alt="" />
                                <p>Drafting</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div data-wow-duration="1s" data-wow-delay="0.4s">
                            <div class="hidden-content">
                                <h4>Litigation</h4>
                                <p>{{ $foot->t2 ?? '' }}</p>
                            </div>
                            <div class="showed-content">
                                <img src="{{ url('/images/hero.png') }}" alt="" />
                                <p>Litigation</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ route('headdept.permit.index') }}">
                        <div data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="hidden-content">
                                <h4>Permit</h4>
                                <p>{{ $foot->t3 ?? '' }}</p>
                            </div>
                            <div class="showed-content">
                                <img src="{{ url('/images/hero.png') }}" alt="" />
                                <p>Permit</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div data-wow-duration="1s" data-wow-delay="0.6s">
                            <div class="hidden-content">
                                <h4>Legal Corporate</h4>
                                <p>{{ $foot->t4 ?? '' }}</p>
                            </div>
                            <div class="showed-content">
                                <img src="{{ url('/images/hero.png') }}" alt="" />
                                <p>Legal Corporate</p>
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div data-wow-duration="1s" data-wow-delay="0.6s">
                            <div class="hidden-content">
                                <h4>Permohonan Dokumen</h4>
                                <p>{{ $foot->t5 ?? '' }}</p>
                            </div>
                            <div class="showed-content">
                                <img src="{{ url('/images/hero.png') }}" alt="" />
                                <p>Permohonan Dokumen</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <img src="{{ asset($middle->photo ?? '') }}" style="margin-top: -50px" alt="person graphic" />
                    </div>
                    {{-- <a href="{{ route('middle-home') }}" class="btn btn-danger">Ubah Halaman Ini <i
                            class="fas fa-edit"></i></a> --}}
                </div>
                <div class="col-lg-8 align-self-center">
                    <div class="services">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="icon">
                                        <img src="{{ asset($middle->p1 ?? '') }}" alt="reporting" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Drafting</h4>
                                        <p>
                                            {{ $middle->t1 ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                                    <div class="icon">
                                        <img src="{{ asset($middle->p2 ?? '') }}" alt="" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Litigation</h4>
                                        <p>
                                            {{ $middle->t2 ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                                    <div class="icon">
                                        <img src="{{ asset($middle->p3 ?? '') }}" alt="" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Permit</h4>
                                        <p>
                                            {{ $middle->t3 ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                                    <div class="icon">
                                        <img src="{{ asset($middle->p4 ?? '') }}" alt="" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Legal Corporate</h4>
                                        <p>
                                            {{ $middle->t4 ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                                    <div class="icon">
                                        <img src="{{ asset($middle->p5 ?? '') }}" alt="" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Permohonan Berkas</h4>
                                        <p>
                                            {{ $middle->t5 ?? '' }}
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="service" class="our-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="left-image">
                        <img src="{{ asset($below->photo ?? '') }}" style="margin-left: 100px; margin-top: -50px"
                            class="w-50" alt="" />
                    </div>
                    {{-- <a href="{{ route('below-home') }}" class="btn btn-danger">Ubah Halaman Ini <i
                            class="fas fa-edit"></i></a> --}}
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="section-heading">
                        <h2>
                            {{ $below->t1 ?? '' }}
                        </h2>
                        <p>
                            {{ $below->t2 ?? '' }}
                        </p>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="first-bar progress-skill-bar">
                                <h4>Total Pengajuan</h4>
                                <span>84 Pengajuan</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="first-bar progress-skill-bar">
                                <h4>Pengajuan Drafting</h4>
                                <span>84 Pengajuan</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="first-bar progress-skill-bar">
                                <h4>Pengajuan Litigasi</h4>
                                <span>84 Pengajuan</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="first-bar progress-skill-bar">
                                <h4>Pengajuan Permit</h4>
                                <span>84 Pengajuan</span>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="first-bar progress-skill-bar">
                                <h4>Pengajuan Lease</h4>
                                <span>84 Pengajuan</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
