@extends('layouts.user')

@section('title')
    Regulasi
@endsection

@section('content')
    <x-base>
        <div class="container">
            <div class="row g-2">
                <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color:#fe1717">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">
                            Regulasi</li>
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
                        <form action="{{ route('database.index') }}" method="GET">
                            @csrf
                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Tipe Peraturan" name="privilege">
                                <option value="ALL" {{ request('privilege') == 'ALL' ? 'selected' : '' }}>
                                    Peraturan Umum</option>
                                <option value="RESTRICTED" {{ request('privilege') == 'RESTRICTED' ? 'selected' : '' }}>
                                    Peraturan Internal
                                </option>
                            </x-select>
                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Pilih Jenis Peraturan"
                                name="type">
                                @foreach ($type as $t)
                                    <option value="{{ $t->name }}"
                                        {{ request('type') == '. {$t->name} .' ? 'selected' : '' }}>{{ $t->name }}
                                    </option>
                                @endforeach
                            </x-select>
                            <x-input label="Nomor Peraturan" labelClass="col-sm-12" fieldClass="col-sm-12" name="number"
                                value="{{ request('number') }}" />
                            <x-input label="Tahun Peraturan" labelClass="col-sm-12" fieldClass="col-sm-12" name="year"
                                value="{{ request('year') }}" />
                            <label class="col-sm-12">Tentang</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control mb-4" value="{{ request('about') }}"
                                    name="about">
                            </div>
                            {{-- <x-input label="Tentang" labelClass="col-sm-12" fieldClass="col-sm-12" name="about"
                                value="{{ request('about') }}" /> --}}
                            <div class="container">
                                <div class="row g-2">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i>
                                        Cari</button>
                                    {{-- @if (auth()->user()->role == 'LEGAL')
                                        <a href="{{ route('database.add') }}" class="btn btn-primary"><i
                                                class="fa fa-plus"></i> Tambah</a>
                                    @endif --}}
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
                                        <th scope="col" class="col-3">Nama Dokumen</th>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Tentang</th>
                                        {{-- <th scope="col" class="col-1">Aksi</i></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($database->count() != 0)
                                        @foreach ($database as $row)
                                            <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-light' : '' }}">
                                                <th scope="row">{{ $database->firstItem() + $loop->index }}</th>
                                                {{-- <td>{{ $row->year }}</td> --}}
                                                <td>
                                                    <a style="color: brown"
                                                        href="{{ route('database.show', [$row->id]) }}">{{ Str::limit($row->name, 40, '...') }}</a>
                                                </td>
                                                <td>{{ $row->number }}</td>
                                                <td>{{ $row->about }}</td>
                                                {{-- <td>
                                                    @foreach ($row->file as $file)
                                                        <a href="{{ asset($file->name) }}" target="_blank"
                                                            style="font-size: 25px; color:#fe3f40">
                                                            <i class="fa-solid fa-file-arrow-down"></i>
                                                        </a>
                                                    @endforeach
                                                </td> --}}
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
