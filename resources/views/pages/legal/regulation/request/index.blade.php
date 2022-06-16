@extends('layouts.legal')

@section('title')
    Database Request
@endsection

@section('content')
    <x-base>
        <nav style="--bs-breadcrumb-divider: '>'; margin-top: -5px;" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('legal-home') }}" style="color:#fe1717">Home</a>
                </li>
                <li class="breadcrumb-item"><a href="{{ route('legal.database.index') }}" style="color:#fe1717">Database</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Permohonan Dokumen</li>
            </ol>
        </nav>

        <div class="mt-3">
            <x-table id="dataTables">
                @slot('header')
                    <tr>
                        <th>No</th>
                        <th>Nomor Tiket</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                @endslot
                @slot('data')
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                @if ($row->status == 'PENDING')
                                    <a href="{{ route('legal.regulation.request-check', [$row->id]) }}"
                                        class="btn btn-primary">Check</a>
                                @elseif ($row->status == 'RETURN')
                                @else
                                    <a href="{{ route('legal.regulation.request-detail', $row->id) }}"
                                        class="btn btn-primary">Lihat</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endslot
            </x-table>
        </div>
    </x-base>
@endsection
