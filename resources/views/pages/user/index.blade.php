@extends('layouts.user')

@section('title')
    Home
@endsection

@section('content')

    <x-carousel>
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
        @slot('banner')
            @foreach ($banner as $row)
                <div class="carousel-item {{ $loop->iteration === 1 ? "active" : "" }}">
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
                    'src' => '/drafting',  
                    'style' => 'background: #03a4ed !important; color: #fff !important;',  
                ],
                [
                    'label' => 'Litigation',  
                    'src' => '/litigation',  
                    'style' => 'background: #fe3f40 !important; color: #fff !important;',  
                ],
                [
                    'label' => 'Permit', 
                    'src' => '/permit', 
                    'style' => 'background: #2a2a2a !important; color: #fff !important;',  
                ],
            ];
        @endphp
        @slot('menu')
            @foreach ($menu as $row)
                <div class="col-lg-3 col-sm-6">
                    <a href="{{ $row['src'] }}">
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
