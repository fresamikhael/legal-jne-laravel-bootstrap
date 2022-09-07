@extends('layouts.legal')

@section('title')
    Create Drafting
@endsection

@section('content')
    <x-menu>
        @php
            $menu = [
                [
                    'label' => 'Sewa Menyewa',
                    'route' => 'lease-create',
                    'style' => 'background: #03a4ed !important; color: #fff !important;',
                ],
                [
                    'label' => 'Supplier/Vendor',
                    'route' => 'supplier-create',
                    'style' => 'background: #fe3f40 !important; color: #fff !important;',
                ],
                [
                    'label' => 'Customer',
                    'route' => 'customer-create',
                    'style' => 'background: #03a4ed !important; color: #fff !important;',
                ],
                [
                    'label' => 'Others',
                    'route' => 'other-create',
                    'style' => 'background: #2a2a2a !important; color: #fff !important;',
                ],
                [
                    'label' => 'Keagenan',
                    'route' => 'agency-create',
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
