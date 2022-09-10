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
                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Dokumen" name="type">
                                @foreach ($type as $t)
                                    <option value="{{ $t->name }}"
                                        {{ request('type') == '. {$t->name} .' ? 'selected' : '' }}>
                                        {{ $t->name . ' ' . '(' . $allData[$t->name] . ')' }}
                                    </option>
                                @endforeach
                            </x-select>

                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Unit" name="dropperjanjian"
                                hidden>
                                <option value="Customer">Customer</option>
                                <option value="Supplier">Supplier</option>
                                <option value="Vendor">Vendor</option>
                                <option value="Lease/Other">Lease/Other</option>
                            </x-select>

                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Unit" name="dropperizinan"
                                hidden>
                                <option value="Izin Reklame - SKPD">Izin Reklame - SKPD</option>
                                <option value="Izin Reklame - TLBBR">Izin Reklame - TLBBR</option>
                                <option value="Izin Reklame - IPR">Izin Reklame - IPR</option>
                                <option value="Izin Reklame - IMBBR">Izin Reklame - IMBBR</option>
                                <option value="Izin Lingkungan - UKL/UPL">Izin Lingkungan - UKL/UPL</option>
                                <option value="Izin Lingkungan - AMDAL">Izin Lingkungan - AMDAL</option>
                                <option value="Izin Lingkungan - SPPL">Izin Lingkungan - SPPL</option>
                                <option value="izin K3">Izin K3</option>
                                <option value="Disnaker">Disnaker</option>
                            </x-select>

                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Unit" name="droplitigasi"
                                hidden>
                                <option value="Gugatan">Gugatan</option>
                                <option value="Somasi">Somasi</option>
                            </x-select>

                            <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Unit" name="dropcorporate"
                                hidden>
                                <option value="Anggaran Dasar Perusahaan">Anggaran Dasar Perusahaan</option>
                                <option value="SK Menteri Hukum dan Ham">SK Menteri Hukum dan Ham</option>
                                <option value="Identitas Direksi">Identitas Direksi</option>
                                <option value="Identitas Dewan Komisaris">Identitas Dewan Komisaris</option>
                                <option value="Identitas Pemegang Saham">Identitas Pemegang Saham</option>
                                <option value="NPWP">NPWP</option>
                                <option value="NIB">NIB</option>
                                <option value="SIPP">SIPP</option>

                                <option value="Sertifikat - HGB">Sertifikat - HGB</option>
                                <option value="Sertifikat - HM">Sertifikat - HM</option>
                                <option value="PBB">PBB</option>
                                <option value="IMB">IMB</option>
                                <option value="SLF">SLF</option>
                                <option value="Akta Jual Beli">Akta Jual Beli</option>
                                <option value="PPJB">PPJB</option>
                                <option value="APH">APH</option>
                                <option value="Kendaraan">Kendaraan</option>
                                <option value="Hak Kekayaan Intelektual - Hak Merek">Hak Kekayaan Intelektual - Hak Merek
                                </option>
                                <option value="Hak Kekayaan Intelektual - Hak Cipta">Hak Kekayaan Intelektual - Hak Cipta
                                </option>
                                <option value="Hak Kekayaan Intelektual - Desain Industri">Hak Kekayaan Intelektual - Desain
                                    Industri</option>

                                <option value="Cabang Utama - Anggaran Dasar Perusahaan">Cabang Utama - Anggaran Dasar
                                    Perusahaan</option>
                                <option value="Cabang Utama - SK Hukum dan Ham">Cabang Utama - SK Hukum dan Ham</option>
                                <option value="Cabang Utama - Identitas Direksi">Cabang Utama - Identitas Direksi</option>
                                <option value="Cabang Utama - Identitas Dewan Komisaris">Cabang Utama - Identitas Dewan
                                    Komisaris</option>
                                <option value="Cabang Utama - Identitas Pemegang Saham">Cabang Utama - Identitas Pemegang
                                    Saham</option>
                                <option value="Cabang Utama - NPWP">Cabang Utama - NPWP</option>
                                <option value="Cabang Utama - NIB">Cabang Utama - NIB</option>
                                <option value="Cabang">Cabang</option>
                                <option value="Agen">Agen</option>

                                <option value="SK Dewan Komisaris">SK Dewan Komisaris</option>
                                <option value="SK Dewan Komisaris dan Direksi">SK Dewan Komisaris dan Direksi</option>
                                <option value="SK Direksi">SK Direksi</option>
                                <option value="SE Direksi">SE Direksi</option>
                                <option value="Internal Memo Direksi">Internal Memo Direksi</option>
                                <option value="Sertifikat Saham">Sertifikat Saham</option>
                                <option value="Surat Kuasa">Surat Kuasa</option>
                                <option value="Asosiasi">Asosiasi</option>
                            </x-select>

                            <script>
                                document.getElementById("type").addEventListener("change", handleChange);

                                function handleChange() {
                                    var x = document.getElementById("type");
                                    if (x.value === "Perjanjian") {
                                        document.getElementById("dropperjanjian1").classList.remove('d-none');
                                        document.getElementById("dropperjanjian1").classList.add('d-flex');
                                        document.getElementById("dropperjanjian").required = false;

                                        document.getElementById("dropperizinan1").classList.remove('d-flex');
                                        document.getElementById("dropperizinan1").classList.add('d-none');
                                        document.getElementById("dropperizinan").required = false;

                                        document.getElementById("droplitigasi1").classList.remove('d-flex');
                                        document.getElementById("droplitigasi1").classList.add('d-none');
                                        document.getElementById("droplitigasi").required = false;

                                        document.getElementById("dropcorporate1").classList.remove('d-flex');
                                        document.getElementById("dropcorporate1").classList.add('d-none');
                                        document.getElementById("dropcorporate").required = false;
                                    } else if (x.value === "Perizinan") {
                                        document.getElementById("dropperjanjian1").classList.remove('d-flex');
                                        document.getElementById("dropperjanjian1").classList.add('d-none');
                                        document.getElementById("dropperjanjian").required = false;

                                        document.getElementById("dropperizinan1").classList.remove('d-none');
                                        document.getElementById("dropperizinan1").classList.add('d-flex');
                                        document.getElementById("dropperizinan").required = false;

                                        document.getElementById("droplitigasi1").classList.remove('d-flex');
                                        document.getElementById("droplitigasi1").classList.add('d-none');
                                        document.getElementById("droplitigasi").required = false;

                                        document.getElementById("dropcorporate1").classList.remove('d-flex');
                                        document.getElementById("dropcorporate1").classList.add('d-none');
                                        document.getElementById("dropcorporate").required = false;
                                    } else if (x.value === "Litigasi") {
                                        document.getElementById("dropperjanjian1").classList.remove('d-flex');
                                        document.getElementById("dropperjanjian1").classList.add('d-none');
                                        document.getElementById("dropperjanjian").required = false;

                                        document.getElementById("dropperizinan1").classList.remove('d-flex');
                                        document.getElementById("dropperizinan1").classList.add('d-none');
                                        document.getElementById("dropperizinan").required = false;

                                        document.getElementById("droplitigasi1").classList.remove('d-none');
                                        document.getElementById("droplitigasi1").classList.add('d-flex');
                                        document.getElementById("droplitigasi").required = false;

                                        document.getElementById("dropcorporate1").classList.remove('d-flex');
                                        document.getElementById("dropcorporate1").classList.add('d-none');
                                        document.getElementById("dropcorporate").required = false;
                                    } else if (x.value === "Corporate") {
                                        document.getElementById("dropperjanjian1").classList.remove('d-flex');
                                        document.getElementById("dropperjanjian1").classList.add('d-none');
                                        document.getElementById("dropperjanjian").required = false;

                                        document.getElementById("dropperizinan1").classList.remove('d-flex');
                                        document.getElementById("dropperizinan1").classList.add('d-none');
                                        document.getElementById("dropperizinan").required = false;

                                        document.getElementById("droplitigasi1").classList.remove('d-flex');
                                        document.getElementById("droplitigasi1").classList.add('d-none');
                                        document.getElementById("droplitigasi").required = false;

                                        document.getElementById("dropcorporate1").classList.remove('d-none');
                                        document.getElementById("dropcorporate1").classList.add('d-flex');
                                        document.getElementById("dropcorporate").required = false;
                                    } else {
                                        document.getElementById("dropperjanjian1").classList.remove('d-flex');
                                        document.getElementById("dropperjanjian1").classList.add('d-none');
                                        document.getElementById("dropperjanjian").required = false;

                                        document.getElementById("dropperizinan1").classList.remove('d-flex');
                                        document.getElementById("dropperizinan1").classList.add('d-none');
                                        document.getElementById("dropperizinan").required = false;

                                        document.getElementById("droplitigasi1").classList.remove('d-flex');
                                        document.getElementById("droplitigasi1").classList.add('d-none');
                                        document.getElementById("droplitigasi").required = false;

                                        document.getElementById("dropcorporate1").classList.remove('d-flex');
                                        document.getElementById("dropcorporate1").classList.add('d-none');
                                        document.getElementById("dropcorporate").required = false;
                                    }
                                }
                            </script>

                            {{-- <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Tipe Peraturan" name="type">
                                @foreach ($type as $t)
                                    <option value="{{ $t->name }}"
                                        {{ request('type') == '. {$t->name} .' ? 'selected' : '' }}>{{ $t->name }}
                                    </option>
                                @endforeach
                            </x-select> --}}
                            {{-- <x-select labelClass="col-sm-12" fieldClass="col-sm-12" label="Unit" name="unit">
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
                            </x-select> --}}
                            <x-input label="Nomor" labelClass="col-sm-12" fieldClass="col-sm-12" name="number"
                                value="{{ request('number') }}" />
                            <x-input label="Tahun" labelClass="col-sm-12" fieldClass="col-sm-12" type="agency"
                                name="agency" value="{{ request('agency') }}" />
                            <div class="col-sm-12">
                                <label for="">Tentang</label>
                                <input type="text" class="form-control mb-4" value="{{ request('about') }}"
                                    name="about">
                            </div>
                            <div class="container">
                                <div class="row g-2">
                                    <button type="submit" class="btn btn-danger"><i class="fa fa-search"></i>
                                        Cari</button>
                                    @if (auth()->user()->role == 'LEGAL')
                                        {{-- <a href="{{ route('legal.regulation.normative-create') }}"
                                            class="btn btn-primary"><i class="fa fa-plus"></i> Tambah</a> --}}
                                        <a href="{{ route('legal.regulation.add') }}" class="btn btn-primary"><i
                                                class="fa fa-plus"></i> Tambah</a>
                                        <a href="{{ route('legal.regulation.request') }}" class="btn btn-success"><i
                                                class="fas fa-file-contract"></i> Pengajuan</a>
                                        <a href="{{ route('legal.regulation.request-index') }}"
                                            class="btn btn-success"><i class="fas fa-history"></i> Riwayat</a>
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
                            <span>
                                @if (request('type'))
                                    Data {{ request('type') }}
                                @elseif(request('agency'))
                                    Data pada Tahun {{ request('agency') }}
                                @elseif(request('number'))
                                    Data dengan nomor {{ request('number') }}
                                @elseif(request('unit'))
                                    Data dengan nomor {{ request('unit') }}
                                @elseif(request('about'))
                                    Data tentang {{ request('about') }}
                                @else
                                    Data Dokumen
                                @endif
                            </span>
                        </div>
                    </div>
                    <div class="p-3 border bg-white">
                        <div class="d-flex align-items-center justify-content-end mb-3">
                            Ditampilkan {{ $database->firstItem() }} - {{ $database->lastItem() }} dari
                            {{ $database->total() }}
                            @if (request('type'))
                                Data {{ request('type') }}
                            @elseif(request('agency'))
                                Data pada Tahun {{ request('agency') }}
                            @elseif(request('number'))
                                Data dengan nomor {{ request('number') }}
                            @elseif(request('unit'))
                                Data dengan nomor {{ request('unit') }}
                            @elseif(request('about'))
                                Data tentang {{ request('about') }}
                            @else
                                Data Dokumen
                            @endif
                        </div>
                        <div class="border rounded">
                            <table class="table table-bordered">
                                <thead class="bg-light">
                                    <tr>
                                        <th scope="col">No</th>
                                        <th scope="col" class="col-3">Nama Dokumen</th>
                                        <th scope="col">Nomor</th>
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
                                                        href="{{ route('legal.regulation.detail', [$row->id]) }}">{{ Str::limit($row->type, 40, '...') }}
                                                        @if ($row->number)
                                                            No {{ $row->number }}
                                                        @endif
                                                        @if ($row->nopol)
                                                            No Polisi {{ $row->nopol }}
                                                        @endif
                                                        @if ($row->date)
                                                            Tahun
                                                            {{ date('Y', strtotime($row->date)) }}
                                                        @endif
                                                    </a>
                                                </td>
                                                {{-- <td>{{ Str::limit($row->title, 40, '...') }}</td> --}}
                                                <td>{{ $row->number }}</td>
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
