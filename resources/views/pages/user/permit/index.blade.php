@extends('layouts.user')

@section('title')
    Litigation
@endsection

@section('content')

    <div style="margin-top: 5rem;">
        <x-menu>
            @php
                $menu = [
                    [
                        'label' => 'Perizinan Baru',
                        'route' => 'permit.newpermit',
                        'style' => 'background: #03a4ed !important; color: #fff !important;',
                    ],
                    [
                        'label' => 'Perpanjangan',
                        'route' => 'permit.prolongation',
                        'style' => 'background: #fe3f40 !important; color: #fff !important;',
                    ],
                    // [
                    //     'label' => 'Outstanding',
                    //     'route' => 'litigation.outstanding',
                    //     'style' => 'background: #2a2a2a !important; color: #fff !important;',
                    // ],
                    // [
                    //     'label' => 'Other',
                    //     'route' => 'litigation.other',
                    //     'style' => 'background: #3b566e !important; color: #fff !important;',
                    // ],
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
