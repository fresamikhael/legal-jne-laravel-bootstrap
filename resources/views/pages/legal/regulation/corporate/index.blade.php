@extends('layouts.legal')

@section('title')
    Create Corporate
@endsection

@section('content')
    <x-menu>
        @php
            $menu = [
                [
                    'label' => 'Legalitas Perusahaan',
                    'route' => 'company-legal-create',
                    'style' => 'background: #03a4ed !important; color: #fff !important;',
                ],
                [
                    'label' => 'Aset Perusahaan',
                    'route' => 'company-asset-create',
                    'style' => 'background: #fe3f40 !important; color: #fff !important;',
                ],
                [
                    'label' => 'Data Mitra',
                    'route' => 'partner-data-create',
                    'style' => 'background: #03a4ed !important; color: #fff !important;',
                ],
                [
                    'label' => 'SK Dewan Komisaris',
                    'route' => 'sk-comms-create',
                    'style' => 'background: #2a2a2a !important; color: #fff !important;',
                ],
                [
                    'label' => 'SK Dewan Komisaris dan Direksi',
                    'route' => 'sk-comms-director-create',
                    'style' => 'background: #03a4ed !important; color: #fff !important;',
                ],
                [
                    'label' => 'SK Direksi',
                    'route' => 'sk-director-create',
                    'style' => 'background: #fe3f40 !important; color: #fff !important;',
                ],
                [
                    'label' => 'SE Direksi',
                    'route' => 'se-director-create',
                    'style' => 'background: #03a4ed !important; color: #fff !important;',
                ],
                [
                    'label' => 'Internal Memo Direksi',
                    'route' => 'internal-memo-director-create',
                    'style' => 'background: #2a2a2a !important; color: #fff !important;',
                ],
                [
                    'label' => 'Sertifikat Saham',
                    'route' => 'share-certificate-create',
                    'style' => 'background: #fe3f40 !important; color: #fff !important;',
                ],
                [
                    'label' => 'Surat Kuasa',
                    'route' => 'power-of-attorney-create',
                    'style' => 'background: #03a4ed !important; color: #fff !important;',
                ],
                [
                    'label' => 'Asosiasi',
                    'route' => 'association-create',
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
