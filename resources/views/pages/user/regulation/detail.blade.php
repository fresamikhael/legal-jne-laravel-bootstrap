@extends('layouts.user')

@section('title')
    Detail Peraturan
@endsection

@section('content')
    <x-base>
        <div class="row">
            <div class="col-sm-12">
                <div class="col px-3 py-3" style="background-color: rgb(239, 236, 236); border-radius: 10px;">
                    <nav style="--bs-breadcrumb-divider: '>'; margin-top: -5px; margin-bottom: -18px" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color:#fe1717">Home</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('regulation.index') }}"
                                    style="color:#fe1717">Database</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @if (Session::get('status'))
            @slot('alert')
                <x-alert message="{{ Session::get('status') }}" type="success" />
            @endslot
        @endif

        @if (!Session::get('status'))
            @guest
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog modal-xl">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Diri terlebih dahulu sebelum
                                    mengakses
                                    database</h5>
                            </div>
                            <form method="POST" enctype="multipart/form-data"
                                action="{{ route('regulation.public-request-post') }}">
                                <div class="modal-body">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nama Lengkap:</label>
                                        <input type="text" name="name" class="form-control">
                                        <input type="hidden" name="database_id" value="{{ $database->id }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nomor Induk Kewarganegaraan
                                            (NIK)
                                            :</label>
                                        <input type="text" name="nik" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Department/Cabang:</label>
                                        <input type="text" name="location" class="form-control">
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    {{-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> --}}
                                    <button type="submit" id="btnSave" class="btn btn-primary">Submit
                                        Data</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            @endguest
        @endif

        <div class="row mt-3">
            <div class="col-sm-8">
                <div style="background-color:#fe3f40">
                    <div class="col px-4 py-3" style="color: white">
                        <i class="fa-solid fa-align-left"></i>
                        <span>Detail Peraturan</span>
                    </div>
                </div>
                <div class="p-3 border bg-white">
                    <div class="border rounded">
                        <table class="table table-bordered">
                            @if ($database->privilege == 'ALL')
                                <tr class="bg-light">
                                    <th scope="row" style="width: 30%;" class="text-end">Nama Peraturan</th>
                                    <td>{{ $database->name }}</td>
                                </tr>
                            @else
                                <tr class="bg-light">
                                    <th scope="row" style="width: 30%;" class="text-end">Nama Dokumen</th>
                                    <td>{{ $database->name }}</td>
                                </tr>
                            @endif
                            <tr class="bg-light">
                                <th scope="row" class="text-end">Tipe Regulasi</th>
                                <td>{{ $database->type }}</td>
                            </tr>
                            @if ($database->privilege == 'ALL')
                                <tr>
                                    <th scope="row" class="text-end">Direktorat/Divisi/Departement</th>
                                    <td>{{ $database->agency }}</td>
                                </tr>
                            @else
                                <tr>
                                    <th scope="row" class="text-end">Dikeluarkan/Mitra</th>
                                    <td>{{ $database->agency }}</td>
                                </tr>
                            @endif
                            @if ($database->privilege == 'ALL')
                                <tr class="bg-light">
                                    <th scope="row" class="text-end">Nomor Peraturan</th>
                                    <td>{{ $database->number }}</td>
                                </tr>
                            @else
                                <tr class="bg-light">
                                    <th scope="row" class="text-end">Nomor Dokumen</th>
                                    <td>{{ $database->number }}</td>
                                </tr>
                            @endif
                            <tr>
                                <th scope="row" class="text-end">Tanggal</th>
                                <td>{{ $database->date }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th scope="row" class="text-end">Tentang</th>
                                <td>{{ $database->about }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Tgl Ditetapkan</th>
                                <td>{{ $database->set_date }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th scope="row" class="text-end">Unit</th>
                                <td>{{ $database->unit }}</td>
                            </tr>
                            @if ($database->historical_id)
                                <tr>
                                    <th scope="row" class="text-end">Dokumen Sebelumnya</th>
                                    <td><a style="color: brown"
                                            href="{{ route('database.show', [$database->historical_id]) }}">Klik
                                            Disini Untuk Melihat Peraturan</a></td>
                                </tr>
                            @else
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div style="background-color:#fe3f40">
                    <div class="col px-4 py-3" style="color: white">
                        <i class="fa-solid fa-align-left"></i>
                        <span>Dokumen</span>
                    </div>
                </div>
                <div class="p-3 border bg-white">
                    <div class="border rounded p-3"
                        style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                        @foreach ($database->data as $file)
                            <a href="{{ asset($file->name) }}" style="color: #fe1717" target="_blank">
                                <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                            </a>
                        @endforeach
                        {{-- @foreach ($database->file as $file)
                            <a href="{{ asset($database->file) }}" style="color: #fe1717" target="_blank">
                                <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                            </a>
                        @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </x-base>
@endsection
