@extends('layouts.legal')

@section('title')
    Permit
@endsection

@section('content')

    <div style="margin-top: 5rem;">
        <x-menu>
            @php
                $menu = [
                    [
                        'label' => 'IMB',
                        'route' => 'newPermit.imb',
                        'style' => 'background: #03a4ed !important; color: #fff !important;',
                    ],
                    [
                        'label' => 'SLF',
                        'route' => 'newPermit.slf',
                        'style' => 'background: #fe3f40 !important; color: #fff !important;',
                    ],
                    [
                        'label' => 'Reklame',
                        'route' => 'newPermit.reklame',
                        'style' => 'background: #03a4ed !important; color: #fff !important;',
                    ],
                    [
                        'label' => 'OSS',
                        'route' => 'newPermit.oss',
                        'style' => 'background: #fe3f40 !important; color: #fff !important;',
                    ],
                ];
            @endphp
            @slot('title')
                See What Our Company <em>Offers</em> &amp; What We
                <span>Provide</span>
            @endslot

            @slot('menu')
                @foreach ($menu as $row)
                    <div class="col-lg-3 col-sm-6">
                        <a href="{{ route($row['route']) }}">
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
    </div>
@endsection
