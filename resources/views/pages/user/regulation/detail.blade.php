@extends('layouts.user')

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
                                <td>Peraturan {{ $database->rule_type }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th scope="row" class="text-end">Jenis Peraturan</th>
                                <td>{{ $database->type }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Instansi</th>
                                <td>{{ $database->agency }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th scope="row" class="text-end">Nomor Peraturan</th>
                                <td>{{ $database->rule_number }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Tahun Peraturan</th>
                                <td>{{ $database->rule_year }}</td>
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
                                <th scope="row" class="text-end">Nomor BN</th>
                                <td>{{ $database->bn_number }}</td>
                            </tr>
                            <tr>
                                <th scope="row" class="text-end">Nomor TBN</th>
                                <td>{{ $database->tbn_number }}</td>
                            </tr>
                            <tr class="bg-light">
                                <th scope="row" class="text-end">Tgl Diundangkan </th>
                                <td>{{ $database->promulgation_date }}</td>
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
                        {{-- @foreach ($database->file as $file) --}}
                        <a href="{{ asset($database->file) }}" target="_blank">
                            <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                        </a>
                        {{-- @endforeach --}}
                    </div>
                </div>
            </div>
        </div>
    </x-base>
@endsection
