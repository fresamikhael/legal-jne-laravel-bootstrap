@extends('layouts.legal')

@section('title')
    Create Litigation
@endsection

@section('content')
    <x-menu>
        @php
            $menu = [
                [
                    'label' => 'Customer Dispute',
                    'route' => 'customer-dispute-create',
                    'style' => 'background: #03a4ed !important; color: #fff !important;',
                ],
                [
                    'label' => 'Others',
                    'route' => 'others-create',
                    'style' => 'background: #fe3f40 !important; color: #fff !important;',
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
