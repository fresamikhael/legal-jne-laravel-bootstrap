@extends('layouts.legal')

@section('title')
    Regulasi
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
                            Regulasi</li>
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
                        <form action="{{ route('legal.database.index') }}" method="GET">
                            @csrf
                            {{-- <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Pilih Jenis Peraturan"
                                name="type">
                                <option value="UU" {{ request('type') == 'UU' ? 'selected' : '' }}>UU</option>
                                <option value="PERPU" {{ request('type') == 'PERPU' ? 'selected' : '' }}>PERPU</option>
                                <option value="PP" {{ request('type') == 'PP' ? 'selected' : '' }}>PP</option>
                                <option value="PERPRES" {{ request('type') == 'PERPRES' ? 'selected' : '' }}>PERPRES
                                </option>
                            </x-select> --}}
                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Tipe Peraturan" name="privilege">
                                <option value="ALL" {{ request('privilege') == 'ALL' ? 'selected' : '' }}>
                                    Normatif</option>
                                <option value="RESTRICTED" {{ request('privilege') == 'RESTRICTED' ? 'selected' : '' }}>
                                    Internal
                                </option>
                            </x-select>
                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Pilih Jenis Peraturan"
                                name="type">
                                @foreach ($type as $t)
                                    <option value="{{ $t->name }}" {{ request('type') == $t->name ? 'selected' : '' }}>
                                        {{ $t->name }}
                                    </option>
                                @endforeach
                            </x-select>
                            <x-input label="Nomor Peraturan" labelClass="col-sm-12" fieldClass="col-sm-12" name="number"
                                value="{{ request('number') }}" />
                            <x-input label="Tahun Peraturan" labelClass="col-sm-12" fieldClass="col-sm-12" name="year"
                                value="{{ request('year') }}" />
                            <div class="col-sm-12">
                                <label for="">Tentang</label>
                                <input type="text" class="form-control mb-4" value="{{ request('about') }}"
                                    name="about">
                            </div>
                            <div class="container">
                                <div class="row g-2">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i> Cari</button>
                                    @if (auth()->user()->role == 'LEGAL')
                                        <a href="{{ route('legal.database.add') }}" class="btn btn-primary"><i
                                                class="fa fa-plus"></i> Tambah</a>
                                        <a href="{{ route('legal.database.request-index') }}" class="btn btn-primary"><i
                                                class="fas fa-history"></i> Riwayat</a>
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
                            <table class="table table-bordered" width="100%">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col" width="5%">No</th>
                                        <th scope="col" width="10%" class="col-3">Nama Dokumen</th>
                                        <th scope="col" width="20%">Nomor</th>
                                        <th scope="col" width="55%">Tentang</th>
                                        <th scope="col" width="5%">Tahun</th>
                                        <th scope="col" width="5%" class="col-1">Aksi</i></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($database->count() != 0)
                                        @foreach ($database as $row)
                                            <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-light' : '' }}">
                                                <th scope="row">{{ $database->firstItem() + $loop->index }}</th>
                                                <td>
                                                    <a style="color: brown"
                                                        href="{{ route('legal.database.show', [$row->id]) }}">{{ Str::limit($row->name, 40, '...') }}</a>
                                                </td>
                                                <td>{{ $row->number }}</td>
                                                <td>{{ $row->about }}</td>
                                                <td>{{ $row->year }}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <button class="btn btn-secondary dropdown-toggle" type="button"
                                                            id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                                            aria-expanded="false">
                                                            Aksi
                                                        </button>
                                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('legal.database.edit', [$row->id]) }}">Ubah</a>
                                                            </li>
                                                            <li><a class="dropdown-item"
                                                                    href="{{ route('legal.database.delete', [$row->id]) }}">Hapus</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr>
                                            <th scope="row" colspan="6">Data yang dicari tidak tersedia.</th>
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
