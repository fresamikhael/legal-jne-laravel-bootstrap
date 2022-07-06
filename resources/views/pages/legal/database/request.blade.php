@extends('layouts.legal')

@section('title')
    Permintaan Akses
@endsection

@section('content')
    <x-base>
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif

        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('legal-home') }}" style="color:#fe1717">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('legal.database.index') }}" style="color:#fe1717">Regulasi</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Riwayat</li>
            </ol>
        </nav>

        <div class="mt-3">
            <x-table id="dataTables">
                @slot('header')
                    <tr>
                        <th>No</th>
                        <th>File</th>
                        <th>Nama</th>
                        <th>NIK</th>
                        <th>Departemen/Cabang</th>
                    </tr>
                @endslot
                @slot('data')
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->database->name }}</td>
                            <td>{{ $row->name }}</td>
                            <td>{{ $row->nik }}</td>
                            <td>
                                {{ $row->location }}
                            </td>
                        </tr>
                    @endforeach
                @endslot
            </x-table>
        </div>
    </x-base>
@endsection
