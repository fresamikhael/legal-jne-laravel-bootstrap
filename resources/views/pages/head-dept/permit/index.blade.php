@extends('layouts.legal')

@section('title')
    Permit
@endsection

@section('content')

    <div style="margin-top: 5rem;">
        <x-menu>
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
                                    <td> <a href="{{ route('headdept.permit.detail', $row->id) }}" class="btn btn-primary">Lihat</a>
                                    </td>
                                </tr>
                            @endforeach
                        @endslot
                    </x-table>
                </div>
            @endslot
        </x-menu>
    </div>
@endsection
