@extends('layouts.legal')

@section('title')
    Detail Peraturan
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Detail Peraturan</h2>
        </div>

        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
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
                        <table class="table table-borderless">
                            <tr class="bg-light">
                                <th scope="row" style="width: 30%;" class="text-end">Nama Peraturan</th>
                                <td>{{ $database->name }}</td>
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
                                <td>{{ $database->title }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th scope="row" class="text-end">Tanggal Ditetapkan</th>
                                <td>{{ $database->set_date }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Tanggal Diundangkan</th>
                                <td>{{ $database->promulgated_date }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th scope="row" class="text-end">Tanggal Berlaku</th>
                                <td>{{ $database->valid_date }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Submber</th>
                                <td>{{ $database->source }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th scope="row" class="text-end">Status Peraturan</th>
                                <td>{{ $database->status }}</td>
                            </tr>
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
                            <a href="{{ asset($file->name) }}" target="_blank">
                                <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </x-base>
@endsection
