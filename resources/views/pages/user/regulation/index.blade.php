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
                            {{-- <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Pilih Jenis Peraturan"
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
                            </x-select> --}}
                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Dokumen" name="type">
                                @foreach ($type as $t)
                                    <option value="{{ $t->name }}"
                                        {{ request('type') == '. {$t->name} .' ? 'selected' : '' }}>{{ $t->name }}
                                    </option>
                                @endforeach
                            </x-select>
                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Unit" name="unit">
                                <option value="Drafting" {{ request('unit') == '. {$t->name} .' ? 'selected' : '' }}>
                                    Drafting
                                </option>
                                <option value="Litigation" {{ request('unit') == '. {$t->name} .' ? 'selected' : '' }}>
                                    Litigation
                                </option>
                                <option value="Permit" {{ request('unit') == '. {$t->name} .' ? 'selected' : '' }}>
                                    Permit
                                </option>
                                <option value="Corporate" {{ request('unit') == '. {$t->name} .' ? 'selected' : '' }}>
                                    Corporate
                                </option>
                            </x-select>
                            <x-input label="Nomor" labelClass="col-sm-12" fieldClass="col-sm-12" name="number"
                                value="{{ request('number') }}" />
                            <x-input label="Tanggal" labelClass="col-sm-12" fieldClass="col-sm-12" name="date"
                                type="date" value="{{ request('date') }}" />
                            <div class="col-sm-12">
                                <label for="">Tentang</label>
                                <input type="text" class="form-control mb-4" value="{{ request('about') }}"
                                    name="about">
                            </div>
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
                        @auth
                            <div class="d-flex align-items-center justify-content-end mb-3">
                                Ditampilkan {{ $database->firstItem() }} - {{ $database->lastItem() }} dari
                                {{ $database->total() }} Data Peraturan
                            </div>
                        @endauth
                        @guest
                            <div class="d-flex align-items-center justify-content-end mb-3">
                                Ditampilkan {{ $all->firstItem() }} - {{ $all->lastItem() }} dari
                                {{ $all->total() }} Data Peraturan
                            </div>
                        @endguest
                        <div class="border rounded">
                            <table class="table table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        {{-- <th scope="col">Tahun Peraturan</th> --}}
                                        <th scope="col" class="col-3">Nama Dokumen</th>
                                        <th scope="col">Nomor</th>
                                        <th scope="col">Tentang</th>
                                        {{-- <th scope="col"><i class="fa-solid fa-download"></i></th> --}}
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($database->count() != 0)
                                        @auth
                                            @foreach ($database as $row)
                                                <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-light' : '' }}">
                                                    <th scope="row">{{ $database->firstItem() + $loop->index }}</th>
                                                    <td>
                                                        @if ($row->privilege == 'ALL')
                                                            <a style="color: brown"
                                                                href="{{ route('regulation.detail', [$row->id]) }}">{{ Str::limit($row->name, 40, '...') }}</a>
                                                        @else
                                                            <a style="color: brown">{{ Str::limit($row->name, 40, '...') }}</a>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if ($row->privilege == 'ALL')
                                                            {{ $row->number }}
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($row->privilege == 'ALL')
                                                            {{ $row->about }}
                                                        @else
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                        @if ($row->privilege == 'ALL')
                                                            <a href="{{ asset($row->file) }}" target="_blank"
                                                                style="font-size: 25px; color:#fe3f40">
                                                                <i class="fa-solid fa-file-arrow-down"></i>
                                                            </a>
                                                        @else
                                                        @endif

                                                    </td> --}}
                                                    {{-- @guest
                                                        <td>
                                                            @if ($row->privilege == 'ALL')
                                                                <a style="color: brown"
                                                                    href="{{ route('regulation.detail', [$row->id]) }}">{{ Str::limit($row->name, 40, '...') }}</a>
                                                            @elseif($row->privilege == 'RESTRICTED')
                                                            @endif

                                                        </td>
                                                        <td>
                                                            @if ($row->privilege == 'ALL')
                                                                {{ $row->number }}
                                                            @else
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($row->privilege == 'ALL')
                                                                {{ $row->about }}
                                                            @else
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if ($row->privilege == 'ALL')
                                                                <a href="{{ asset($row->file) }}" target="_blank"
                                                                    style="font-size: 25px; color:#fe3f40">
                                                                    <i class="fa-solid fa-file-arrow-down"></i>
                                                                </a>
                                                            @else
                                                            @endif
                                                        </td>
                                                    @endguest --}}
                                                </tr>
                                            @endforeach
                                        @endauth

                                        @guest
                                            @foreach ($all as $row)
                                                <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-light' : '' }}">
                                                    <th scope="row">{{ $all->firstItem() + $loop->index }}</th>
                                                    <td>
                                                        @if ($row->privilege == 'ALL')
                                                            <a style="color: brown"
                                                                href="{{ route('regulation.detail', [$row->id]) }}">{{ Str::limit($row->name, 40, '...') }}</a>
                                                        @else
                                                            <a style="color: brown">{{ Str::limit($row->name, 40, '...') }}</a>
                                                        @endif

                                                    </td>
                                                    <td>
                                                        @if ($row->privilege == 'ALL')
                                                            {{ $row->number }}
                                                        @else
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($row->privilege == 'ALL')
                                                            {{ $row->about }}
                                                        @else
                                                        @endif
                                                    </td>
                                                    {{-- <td>
                                                        @if ($row->privilege == 'ALL')
                                                            <a href="{{ asset($row->file) }}" target="_blank"
                                                                style="font-size: 25px; color:#fe3f40">
                                                                <i class="fa-solid fa-file-arrow-down"></i>
                                                            </a>
                                                        @else
                                                        @endif

                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        @endguest
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
