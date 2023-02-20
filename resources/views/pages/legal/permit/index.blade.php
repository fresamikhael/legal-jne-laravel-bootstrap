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
                        'label' => 'Permohonan Baru',
                        'route' => 'legal.permit.newPermit',
                        'style' => 'background: #03a4ed !important; color: #fff !important;',
                    ],
                    [
                        'label' => 'Perpanjangan',
                        'route' => 'legal.permit.extendPermit',
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
                <div class="col-sm-12">
                    <x-table id="dataTables">
                        @slot('header')
                            <tr>
                                <th>No</th>
                                <th>No Pengajuan</th>
                                <th>Tipe Permit</th>
                                <th>Permit Model</th>
                                <th>User Submited</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        @endslot
                        @slot('data')
                            @foreach ($data as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->id }}</td>
                                    <td>{{ $row->permit_type }}</td>
                                    <td>{{ strtoupper($row->permit_model) }}</td>
                                    <td>{{ $row->user_submited }}</td>
                                    <td>{{ strtoupper($row->status) }}</td>
                                    <td>
                                        @if ( isset($row->history) && $row->history->to_level == 'LEGAL')
                                            <a href="{{ route('legal.permit.check', $row->id) }}" class="btn btn-primary">Check</a>
                                        @else
                                            <a href="{{ route('legal.permit.detail', $row->id) }}" class="btn btn-info">Lihat</a>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @endslot
                    </x-table>
                </div>
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
