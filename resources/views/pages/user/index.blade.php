@extends('layouts.user')

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

    {{-- <x-carousel>
        @slot('photo')
            @foreach ($banner as $row)
                <div class="carousel-item {{ $loop->iteration === 1 ? 'active' : '' }}">
                    <img style="height: 400px;" src="{{ $row['src'] }}" class="d-block w-100" alt="Banner Photo">
                </div>
            @endforeach
        @endslot
    </x-carousel>

    <x-menu>
        @php
            $menu = [
                [
                    'label' => 'Drafting',
                    'route' => 'drafting/index',
                    'style' => 'background: #03a4ed !important; color: #fff !important;',
                ],
                [
                    'label' => 'Litigation',
                    'route' => 'litigation/index',
                    'style' => 'background: #fe3f40 !important; color: #fff !important;',
                ],
                [
                    'label' => 'Permit',
                    'route' => 'permit/dashboard',
                    'style' => 'background: #2a2a2a !important; color: #fff !important;',
                ],
                [
                    'label' => 'Legal Corporates',
                    'route' => 'legalcorporate/index',
                    'style' => 'background: #1e3278 !important; color: #fff !important;',
                ],
                [
                    'label' => 'Permohonan Dokumen',
                    'route' => 'request_document/dashboard',
                    'style' => 'background: #03a4ed !important; color: #fff !important;',
                ],
            ];
        @endphp

        @slot('title')
            See What Our Company <em>Offers</em> &amp; What We
            <span>Provide</span>
        @endslot

        @slot('menu')
            @foreach ($menu as $row)
                <div class="col-lg-3 col-sm-6 mb-4">
                    <a href="{{ $row['route'] }}">
                        <div class="item">
                            <div class="card-custom" style="{{ $row['style'] }}">
                                {{ $row['label'] }}
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        @endslot
    </x-menu> --}}

    <div class="main-banner wow fadeIn" id="top" data-wow-duration="1s" data-wow-delay="0.5s">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="row">
                        <div class="col-lg-6 align-self-center">
                            <div class="left-content header-text wow fadeInLeft" data-wow-duration="1s" data-wow-delay="1s">
                                <h6>Welcome to Legal Access JNE</h6>
                                <h2>
                                    We <em>Connecting</em> Your
                                    <span>Happiness</span>
                                </h2>
                                <p>
                                    Lorem ipsum dolor sit amet consectetur adipisicing elit.
                                    Incidunt accusamus inventore fugiat illo corporis
                                    consequatur cupiditate tenetur tempore corrupti. Facilis
                                    fugiat nulla ut quia eum asperiores, iusto natus pariatur
                                    deleniti!
                                </p>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="right-image wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.5s">
                                <img src="{{ url('/images/hero.png') }}" alt="team meeting" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div id="about" class="about-us section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4">
                    <div class="left-image wow fadeIn" data-wow-duration="1s" data-wow-delay="0.2s">
                        <img src="{{ url('/images/icon-1.png') }}" style="margin-top: -50px" alt="person graphic" />
                    </div>
                </div>
                <div class="col-lg-8 align-self-center">
                    <div class="services">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.5s">
                                    <div class="icon">
                                        <img src="{{ url('/images/service-icon-01.png') }}" alt="reporting" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Drafting</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.7s">
                                    <div class="icon">
                                        <img src="{{ url('/images/service-icon-02.png') }}" alt="" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Litigation</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="0.9s">
                                    <div class="icon">
                                        <img src="{{ url('/images/service-icon-03.png') }}" alt="" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Permit</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                                    <div class="icon">
                                        <img src="{{ url('/images/service-icon-04.png') }}" alt="" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Legal Corporate</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="item wow fadeIn" data-wow-duration="1s" data-wow-delay="1.1s">
                                    <div class="icon">
                                        <img src="{{ url('/images/service-icon-04.png') }}" alt="" />
                                    </div>
                                    <div class="right-text">
                                        <h4>Permohonan Berkas</h4>
                                        <p>
                                            Lorem ipsum dolor sit amet, ctetur aoi adipiscing eliter
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

    <div id="services" class="our-services section">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="left-image">
                        <img src="{{ url('/images/icon-2.png') }}" style="margin-left: 100px; margin-top: -50px"
                            class="w-50" alt="" />
                    </div>
                </div>
                <div class="col-lg-6 wow fadeInRight" data-wow-duration="1s" data-wow-delay="0.2s">
                    <div class="section-heading">
                        <h2>
                            Track your <em>case</em> &amp; <span>Document</span> Realtime
                        </h2>
                        <p>
                            Lorem ipsum dolor sit amet consectetur adipisicing elit. Sint,
                            aut? Adipisci accusamus, cum ipsa atque, eius, mollitia
                            architecto culpa placeat dolorum vitae repudiandae voluptas.
                            Distinctio et alias accusantium odit itaque.
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

    <div id="portfolio" class="our-portfolio section">
        <div class="container">
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
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.3s">
                            <div class="hidden-content">
                                <h4>Drafting</h4>
                                <p>Lorem ipsum dolor sit ameti ctetur aoi adipiscing eto.</p>
                            </div>
                            <div class="showed-content">
                                <img src="{{ url('/images/hero.png') }}" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.4s">
                            <div class="hidden-content">
                                <h4>Litigation</h4>
                                <p>Lorem ipsum dolor sit ameti ctetur aoi adipiscing eto.</p>
                            </div>
                            <div class="showed-content">
                                <img src="{{ url('/images/hero.png') }}" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.5s">
                            <div class="hidden-content">
                                <h4>Permit</h4>
                                <p>Lorem ipsum dolor sit ameti ctetur aoi adipiscing eto.</p>
                            </div>
                            <div class="showed-content">
                                <img src="{{ url('/images/hero.png') }}" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                            <div class="hidden-content">
                                <h4>Legal Corporate</h4>
                                <p>Lorem ipsum dolor sit ameti ctetur aoi adipiscing eto.</p>
                            </div>
                            <div class="showed-content">
                                <img src="{{ url('/images/hero.png') }}" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-sm-6">
                    <a href="#">
                        <div class="item wow bounceInUp" data-wow-duration="1s" data-wow-delay="0.6s">
                            <div class="hidden-content">
                                <h4>Permohonan Dokumen</h4>
                                <p>Lorem ipsum dolor sit ameti ctetur aoi adipiscing eto.</p>
                            </div>
                            <div class="showed-content">
                                <img src="{{ url('/images/hero.png') }}" alt="" />
                            </div>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection
