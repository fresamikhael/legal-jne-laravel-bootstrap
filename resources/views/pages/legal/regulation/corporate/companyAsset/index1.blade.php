@extends('layouts.legal')

@section('title')
    Create Corporate
@endsection

@section('content')
    <x-menu>
        @php
            $menu = [
                [
                    'label' => 'Sertipikat HGB',
                    'route' => 'hgb-create',
                    'style' => 'background: #03a4ed !important; color: #fff !important;',
                ],
                [
                    'label' => 'Sertipikat HM',
                    'route' => 'hm-create',
                    'style' => 'background: #fe3f40 !important; color: #fff !important;',
                ],
                [
                    'label' => 'PBB',
                    'route' => 'pbb-create',
                    'style' => 'background: #03a4ed !important; color: #fff !important;',
                ],
                [
                    'label' => 'IMF',
                    'route' => 'imf-create',
                    'style' => 'background: #2a2a2a !important; color: #fff !important;',
                ],
                [
                    'label' => 'SLF',
                    'route' => 'slf-create',
                    'style' => 'background: #fe3f40 !important; color: #fff !important;',
                ],
                [
                    'label' => 'Akta Jual Beli',
                    'route' => 'akta-create',
                    'style' => 'background: #03a4ed !important; color: #fff !important;',
                ],
                [
                    'label' => 'PPJB',
                    'route' => 'ppjb-create',
                    'style' => 'background: #2a2a2a !important; color: #fff !important;',
                ],
                [
                    'label' => 'APH',
                    'route' => 'aph-create',
                    'style' => 'background: #fe3f40 !important; color: #fff !important;',
                ],
                [
                    'label' => 'Kendaraan',
                    'route' => 'vehicle-create',
                    'style' => 'background: #03a4ed !important; color: #fff !important;',
                ],
                [
                    'label' => 'Hak Kekayaan Intelektual',
                    'route' => 'hki-create',
                    'style' => 'background: #2a2a2a !important; color: #fff !important;',
                ],
            ];
        @endphp

        @slot('title')
            <div class="mt-5">
                Pilih tipe dokumen yang ingin ditambahkan
            </div>
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
