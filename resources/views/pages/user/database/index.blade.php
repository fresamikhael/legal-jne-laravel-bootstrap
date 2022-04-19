@extends('layouts.user')

@section('title')
    Database
@endsection

@section('content')
    <x-base>
        <div class="container">
            <div class="row g-2">
                <div class="col-3 pe-4">
                    <div style="background-color: #fe3f40">
                        <div class="col px-4 py-3" style="color: white">
                            <i class="fa-solid fa-align-left"></i>
                            <span>Pencarian</span>
                        </div>
                    </div>
                    <div class="p-3 border bg-white">
                        <form action="{{ route('database.index') }}" method="GET">
                            @csrf
                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Pilih Jenis Peraturan" name="type">
                                <option value="UU" {{ request('type') == "UU" ? "selected" : "" }} >UU</option>
                                <option value="PERPU" {{ request('type') == "PERPU" ? "selected" : "" }}>PERPU</option>
                                <option value="PP" {{ request('type') == "PP" ? "selected" : "" }}>PP</option>
                                <option value="PERPRES" {{ request('type') == "PERPRES" ? "selected" : "" }}>PERPRES</option>
                            </x-select>
                            <x-input label="Nomor Peraturan" labelClass="col-sm-12" fieldClass="col-sm-12" name="number" value="{{ request('number') }}"/>
                            <x-input label="Tahun Peraturan" labelClass="col-sm-12" fieldClass="col-sm-12" name="year" value="{{ request('year') }}"/>
                            <x-input label="Tentang" labelClass="col-sm-12" fieldClass="col-sm-12" name="title" value="{{ request('title') }}"/>
                            <div class="container">
                                <div class="row g-2">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i> Cari</button>
                                    <a href="{{ route('database.add') }}" class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a>
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
                            Ditampilkan {{ $database->firstItem() }} - {{ $database->lastItem() }} dari {{ $database->total() }} Data Peraturan
                        </div>
                        <div class="border rounded">
                            <table class="table table-borderless">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tahun Peraturan</th>
                                        <th scope="col">Peraturan</th>
                                        <th scope="col">Tentang</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($database->count() != 0)
                                        @foreach ($database as $row)
                                            <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-light' : '' }}">
                                                <th scope="row">{{ $database->firstItem() + $loop->index }}</th>
                                                <td>{{ $row->year }}</td>
                                                <td>
                                                    <a href="{{ route('database.show', [$row->id]) }}">{{ Str::limit($row->name, 40, '...') }}</a>
                                                </td>
                                                <td>{{ Str::limit($row->title, 40, '...')  }}</td>
                                                <td>
                                                    @foreach ($row->file as $file)
                                                        <a href="{{ asset($file->name) }}" target="_blank" style="font-size: 25px;">
                                                            <i class="fa-solid fa-file-arrow-down"></i>
                                                        </a>
                                                    @endforeach
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
