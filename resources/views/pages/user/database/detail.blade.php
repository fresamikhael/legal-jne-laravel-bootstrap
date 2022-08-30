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
                            <li class="breadcrumb-item"><a href="{{ route('database.index') }}"
                                    style="color:#fe1717">Regulasi</a>
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
                                action="{{ route('database.public-request-post') }}">
                                <div class="modal-body">
                                    @csrf
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nama Lengkap:</label>
                                        <input type="text" name="name" class="form-control" required>
                                        <input type="hidden" name="database_id" value="{{ $database->id }}"
                                            class="form-control">
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Nomor Induk Kewarganegaraan
                                            (NIK)
                                            :</label>
                                        <input type="text" name="nik" class="form-control" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="recipient-name" class="col-form-label">Department/Cabang:</label>
                                        <input type="text" name="location" class="form-control" required>
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
                            <tr class="bg-light">
                                <th scope="row" style="width: 30%;" class="text-end">Nama Peraturan</th>
                                <td>{{ $database->name }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Jenis Peraturan</th>
                                <td>
                                    @if ($database->privilege == 'ALL')
                                        Peraturan Umum
                                    @else
                                        Peraturan Internal
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Tipe Peraturan</th>
                                <td>{{ $database->type }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th scope="row" class="text-end">Entitas</th>
                                <td>{{ $database->entity }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Nomor Peraturan</th>
                                <td>{{ $database->number }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th scope="row" class="text-end">Tahun Peraturan</th>
                                <td>{{ $database->year }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Tentang</th>
                                <td>{{ $database->about }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th scope="row" class="text-end">Tanggal Ditetapkan</th>
                                <td>{{ $database->set_date }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Tanggal Diundangkan</th>
                                <td>{{ $database->promulgated_date }}</td>
                            </tr>
                            {{-- <tr class="bg-light">
                                <th scope="row" class="text-end">Nomor BN</th>
                                <td>{{ $database->bn_number }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Nomor TBN</th>
                                <td>{{ $database->tbn_number }}</td>
                            </tr> --}}
                            <tr class="bg-light">
                                <th scope="row" class="text-end">Status Peraturan</th>
                                <td>{{ $database->status }}</td>
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
                        @foreach ($database->file as $file)
                            <div class="row">
                                <a href="{{ asset($file->name) }}" style="color: #fe1717" target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($file->name, 9) }}</p>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-base>
@endsection
