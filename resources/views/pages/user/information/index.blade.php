@extends('layouts.user')

@section('title')
    Informasi
@endsection

@section('content')
    <x-base>
        <div class="container">
            <div class="row g-2">
                <div class="col-3 pe-4">
                    <div style="background-color: #3648ec ; border-radius: 20px 20px 0 0">
                        <div class=" col px-4 py-3" style="color: white">
                            <i class="fa-solid fa-align-left"></i>
                            <span>Pencarian</span>
                        </div>
                    </div>
                    <div class="p-3 border bg-white">
                        <form action="{{ route('information.index') }}" method="GET">
                            @csrf
                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Pilih Jenis" name="type">
                                <option value="QNA" {{ request('type') == 'QNA' ? 'selected' : '' }}>QnA</option>
                                <option value="KLINIK HUKUM" {{ request('type') == 'KLINIK HUKUM' ? 'selected' : '' }}>
                                    Klinik Hukum
                                </option>
                            </x-select>
                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Pilih Kategori" name="category">
                                <option value="BISNIS" {{ request('category') == 'BISNIS' ? 'selected' : '' }}>Bisnis
                                </option>
                                <option value="Kekayaan Intelektual"
                                    {{ request('category') == 'Kekayaan Intelektual' ? 'selected' : '' }}>
                                    Kekayaan Intelektual
                                </option>
                            </x-select>
                            {{-- <x-input label="Nomor Peraturan" labelClass="col-sm-12" fieldClass="col-sm-12" name="number"
                                value="{{ request('number') }}" />
                            <x-input label="Tahun Peraturan" labelClass="col-sm-12" fieldClass="col-sm-12" name="year"
                                value="{{ request('year') }}" />
                            <x-input label="Tentang" labelClass="col-sm-12" fieldClass="col-sm-12" name="title"
                                value="{{ request('title') }}" /> --}}
                            <div class="container">
                                <div class="row g-2">
                                    <button type="submit" class="btn"
                                        style="background-color: #3648ec; color:white"><i class="fa fa-search"
                                            style="color: white"></i> Cari</button>
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
                    <div style="background-color:#3648ec; border-radius: 20px 20px 0 0">
                        <div class="col px-4 py-3" style="color: white">
                            <i class="fa-solid fa-align-left"></i>
                            <span>Data Informasi</span>
                        </div>
                    </div>
                    <div class="p-3 border bg-white">
                        <div class="d-flex align-items-center justify-content-end mb-3">
                            Ditampilkan {{ $database->firstItem() }} - {{ $database->lastItem() }} dari
                            {{ $database->total() }} Data Peraturan
                        </div>
                        <div class="border rounded">
                            {{-- <table class="table table-borderless">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col">Tanggal</th>
                                        <th scope="col">Kategori</th>
                                        <th scope="col">Tentang</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if ($database->count() != 0)
                                        @foreach ($database as $row)
                                            <tr class="{{ $loop->iteration % 2 == 0 ? 'bg-light' : '' }}">
                                                <th scope="row">{{ $database->firstItem() + $loop->index }}</th>
                                                <td>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->isoFormat('D MMMM Y') }}
                                                </td>
                                                <td>{{ Str::limit($row->category, 40, '...') }}</td>
                                                <td>
                                                    <a
                                                        href="{{ route('information.show', [$row->id]) }}">{{ Str::limit($row->title, 40, '...') }}</a>
                                                </td>
                                                <td>
                                                    @foreach ($row->file as $file)
                                                        <a href="{{ asset($file->name) }}" target="_blank"
                                                            style="font-size: 25px;">
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
                            </table> --}}
                            @if ($database->count() != 0)
                                @foreach ($database as $row)
                                    <div class="m-3">
                                        <h5><a style="color: black"
                                                href="{{ route('information.show', [$row->id]) }}">{{ $row->title }}</a>
                                        </h5>
                                        <p>{{ Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $row->created_at)->isoFormat('D MMMM Y') }}
                                            • {{ $row->category }} • {{ $row->type }} • {{ $row->user->name }}
                                        </p>
                                        <hr>
                                    </div>
                                @endforeach
                            @else
                                <h5 class="m-3">Data yang dicari tidak tersedia</h5>
                            @endif
                        </div>

                        {{ $database->links('vendor.pagination.custom') }}

                    </div>
                </div>
            </div>
        </div>
    </x-base>
@endsection
