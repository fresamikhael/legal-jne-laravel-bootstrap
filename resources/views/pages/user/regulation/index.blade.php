@extends('layouts.user')

@section('title')
    Database
@endsection

@section('content')
    <x-base>
        <div class="container">
            <div class="row g-2">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color:#fe1717">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Database</li>
                    </ol>
                </nav>
                <div class="col-3 pe-4">
                    <div style="background-color: #fe3f40; border-radius: 20px 20px 0 0">
                        <div class="col px-4 py-3" style="color: white">
                            <i class="fa-solid fa-align-left"></i>
                            <span>Pencarian</span>
                        </div>
                    </div>
                    <div class="p-3 border bg-white">
                        <form action="{{ route('regulation.index') }}" method="GET">
                            @csrf
                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Pilih Jenis Peraturan"
                                name="rule_type">
                                <option value="" {{ request('rule_type') == '' ? 'selected' : '' }}>Semua Jenis
                                </option>
                                <option disabled>-----------------------------</option>
                                <option value="Internal" {{ request('rule_type') == 'Internal' ? 'selected' : '' }}>
                                    Peraturan
                                    Internal</option>
                                <option value="Normatif" {{ request('rule_type') == 'Normatif' ? 'selected' : '' }}>
                                    Peraturan
                                    Normatif
                                </option>
                            </x-select>
                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Pilih Jenis Peraturan"
                                name="type">
                                <option value="" {{ request('type') == '' ? 'selected' : '' }}>Semua Jenis</option>
                                <option disabled>-----------------------------</option>
                                <option value="Peraturan Perusahaan"
                                    {{ request('type') == 'Peraturan Perusahaan' ? 'selected' : '' }}>
                                    Peraturan
                                    Perusahaan</option>
                                <option value="SK Direksi" {{ request('type') == 'SK Direksi' ? 'selected' : '' }}>
                                    SK Direksi
                                </option>
                                <option value="SE Direksi" {{ request('type') == 'SE Direksi' ? 'selected' : '' }}>
                                    SE Direksi
                                </option>
                                <option value="Internal Memo (IM)"
                                    {{ request('type') == 'Internal Memo (IM)' ? 'selected' : '' }}>
                                    Internal Memo (IM)
                                </option>
                                <option value="Undang-undang" {{ request('type') == 'Undang-undang' ? 'selected' : '' }}>
                                    Undang-undang</option>
                                <option value="Peraturan Pemerintah"
                                    {{ request('type') == 'Peraturan Pemerintah' ? 'selected' : '' }}>
                                    Peraturan Pemerintah
                                </option>
                                <option value="Peraturan Menteri"
                                    {{ request('type') == 'Peraturan Menteri' ? 'selected' : '' }}>
                                    Peraturan Menteri
                                </option>
                                <option value="PERDA Provinsi/Kota"
                                    {{ request('type') == 'PERDA Provinsi/Kota' ? 'selected' : '' }}>
                                    PERDA Provinsi/Kota
                                </option>
                            </x-select>
                            <x-input label="Nama Peraturan" labelClass="col-sm-12" fieldClass="col-sm-12" name="name"
                                value="{{ request('name') }}" />
                            <div class="container">
                                <div class="row g-2">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i>
                                        Cari</button>
                                    {{-- @if (auth()->user()->role == 'LEGAL')
                                        <a href="{{ route('legal.regulation.add') }}" class="btn btn-primary"><i
                                                class="fa fa-plus"></i> Tambah</a>
                                    @endif --}}
                                    @auth
                                        <a href="{{ route('regulation.request') }}" class="btn btn-primary"><i
                                                class="fas fa-file-contract"></i> Ajukan Dokumen</a>
                                    @endauth
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="col-9">
                    <div style="background-color:#fe3f40; border-radius: 20px 20px 0 0">
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
                                        <th scope="col" class="col-3">Peraturan</th>
                                        <th scope="col">Tipe Peraturan</th>
                                        <th scope="col"><i class="fa-solid fa-download"></i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($database->count() != 0)
                                        @foreach ($database as $row)
                                            <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-light' : '' }}">
                                                <th scope="row">{{ $database->firstItem() + $loop->index }}</th>
                                                <td>
                                                    <a style="color: brown"
                                                        href="{{ route('regulation.detail', [$row->id]) }}">{{ Str::limit($row->name, 40, '...') }}</a>
                                                </td>
                                                {{-- <td>{{ Str::limit($row->title, 40, '...') }}</td> --}}
                                                <td>{{ $row->about }}</td>
                                                <td>
                                                    {{-- @dd($row->file) --}}
                                                    {{-- @foreach ($row->file as $file) --}}
                                                    <a href="{{ asset($row->file) }}" target="_blank"
                                                        style="font-size: 25px; color:#fe3f40">
                                                        <i class="fa-solid fa-file-arrow-down"></i>
                                                    </a>
                                                    {{-- @endforeach --}}
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
