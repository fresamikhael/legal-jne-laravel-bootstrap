@extends('layouts.legal')

@section('title')
    Database
@endsection

@section('content')
    <x-base>
        <div class="container">
            <div class="row g-2">
                @if (Session::get('message_success'))
                    @slot('alert')
                        <x-alert message="{{ Session::get('message_success') }}" type="success" />
                    @endslot
                @endif
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('legal-home') }}" style="color:#fe1717">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Database</li>
                    </ol>
                </nav>
                <div class="col-3 pe-4">
                    <div style="background-color: #fe3f40">
                        <div class="col px-4 py-3" style="color: white">
                            <i class="fa-solid fa-align-left"></i>
                            <span>Pencarian</span>
                        </div>
                    </div>
                    <div class="p-3 border bg-white">
                        <form action="{{ route('legal.regulation.index') }}" method="GET">
                            @csrf
                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Jenis Data" name="privilege">
                                <option value="ALL" {{ request('privilege') == 'ALL' ? 'selected' : '' }}>
                                    Database Umum</option>
                                <option value="RESTRICTED" {{ request('privilege') == 'RESTRICTED' ? 'selected' : '' }}>
                                    Database Khusus
                                </option>
                            </x-select>
                            <x-input label="Nomor" labelClass="col-sm-12" fieldClass="col-sm-12" name="number"
                                value="{{ request('number') }}" />
                            <x-input label="Tanggal" labelClass="col-sm-12" fieldClass="col-sm-12" type="date"
                                name="date" value="{{ request('date') }}" />
                            <x-input label="Tentang" labelClass="col-sm-12" fieldClass="col-sm-12" name="title"
                                value="{{ request('about') }}" />
                            <div class="container">
                                <div class="row g-2">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i> Cari</button>
                                    @if (auth()->user()->role == 'LEGAL')
                                        <a href="{{ route('legal.regulation.add') }}" class="btn btn-primary"><i
                                                class="fa fa-plus"></i> Tambah</a>
                                        <a href="{{ route('legal.regulation.request') }}" class="btn btn-success"><i
                                                class="fas fa-file-contract"></i> Pengajuan</a>
                                    @endif
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-9">
                    <div style="background-color:#fe3f40">
                        <div class="col px-4 py-3" style="color: white">
                            <i class="fa-solid fa-align-left"></i>
                            <span>Data Peraturan</span>
                        </div>
                    </div>
                    <div class="p-3 border bg-white">
                        <div class="d-flex align-items-center justify-content-end mb-3">
                            Ditampilkan {{ $database->firstItem() }} - {{ $database->lastItem() }} dari
                            {{ $database->total() }} Data Peraturan
                        </div>
                        <div class="border rounded">
                            <table class="table table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        {{-- <th scope="col">Tahun Peraturan</th> --}}
                                        <th scope="col" class="col-3">Dokumen</th>
                                        <th scope="col">Tentang</th>
                                        <th scope="col" class="col-1">Aksi</i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($database->count() != 0)
                                        @foreach ($database as $row)
                                            <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-light' : '' }}">
                                                <th scope="row">{{ $database->firstItem() + $loop->index }}</th>
                                                <td>
                                                    <a style="color: brown"
                                                        href="{{ route('legal.regulation.detail', [$row->id]) }}">{{ Str::limit($row->name, 40, '...') }}</a>
                                                </td>
                                                {{-- <td>{{ Str::limit($row->title, 40, '...') }}</td> --}}
                                                <td>{{ $row->about }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Aksi
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                            <li>
                                                                @if ($row->privilege == 'ALL')
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('legal.regulation.public-edit', [$row->id]) }}">Ubah</a>
                                                                @elseif($row->privilege == 'RESTRICTED')
                                                                    <a class="dropdown-item"
                                                                        href="{{ route('legal.regulation.special-edit', [$row->id]) }}">Ubah</a>
                                                                @endif
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('legal.regulation.delete', [$row->id]) }}">Hapus</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th scope="row">Data yang dicari tidak tersedia.</th>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>

                        {{ $database->links('vendor.pagination.custom') }}

                    </div>
                </div>
            </div>
        </div>
    </x-base>
@endsection
