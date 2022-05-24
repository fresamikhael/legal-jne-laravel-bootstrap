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

    <x-carousel>
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
                    'route' => 'legal/drafting/index',
                    'style' => 'background: #03a4ed !important; color: #fff !important;',
                ],
                [
                    'label' => 'Litigation',
                    'route' => 'legal/litigation/',
                    'style' => 'background: #fe3f40 !important; color: #fff !important;',
                ],
                [
                    'label' => 'Permit',
                    'route' => 'legal/permit',
                    'style' => 'background: #2a2a2a !important; color: #fff !important;',
                ],
                [
                    'label' => 'Legal Corporates',
                    'route' => 'legal/legalcorporate/index',
                    'style' => 'background: #1e3278 !important; color: #fff !important;',
                ],
                [
                    'label' => 'Permohonan Dokumen',
                    'route' => 'legal/request_document',
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
    </x-menu>
@endsection
