@extends('layouts.user')

@section('title')
    Update Surat Kuasa
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Surat Kuasa</h2>
            <x-modal-history>
                @slot('header')
                    <tr>
                        <th>No</th>
                        <th>Nomor Kasus</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                @endslot

                @slot('data')
                    @foreach ($table as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->id }}</td>
                            <td>
                                @if ($row->status == 'APPROVED BY LEGAL CORPORATES')
                                    <button type="button" class="btn btn-warning" disabled>APPROVED BY LEGAL
                                        CORPORATES</button>
                                @elseif ($row->status == 'RETURNED BY USER')
                                    <button type="button" class="btn btn-warning" disabled>RETURNED BY USER</button>
                                @elseif ($row->status == 'RETURNED BY LEGAL CORPORATES')
                                    <button type="button" class="btn btn-warning" disabled>RETURNED BY LEGAL
                                        CORPORATES</button>
                                @elseif ($row->status == 'APPROVED BY HEAD OF LEGAL DIVISION')
                                    <button type="button" class="btn btn-warning" disabled>APPROVED BY HEAD OF LEGAL
                                        DIVISION</button>
                                @elseif ($row->status == 'REJECTED BY HEAD OF LEGAL DIVISION')
                                    <button type="button" class="btn btn-danger" disabled>REJECTED BY HEAD OF LEGAL
                                        DIVISION</button>
                                @elseif ($row->status == 'APPROVED WITH SCANNED DOCUMENT SENT')
                                    <button type="button" class="btn btn-success" disabled>APPROVED WITH SCANNED DOCUMENT
                                        SENT</button>
                                @else
                                    <button type="button" class="btn btn-warning" disabled>Pengajuan Diproses</button>
                                @endif
                            </td>
                            <td>
                                @if ($row->status == 'APPROVED BY LEGAL CORPORATES')
                                    <a href="{{ route('legal.legalcorporate.powerattorney-check', [$row->id]) }}"
                                        class="btn btn-danger">Update</a>
                                @elseif ($row->status == 'APPROVED BY HEAD OF LEGAL DIVISION')
                                    <a href="{{ route('legal.legalcorporate.powerattorney-update', [$row->id]) }}"
                                        class="btn btn-danger">Update</a>
                                @elseif ($row->status == 'REJECTED BY HEAD OF LEGAL DIVISION')
                                    <a href="{{ route('legal.legalcorporate.powerattorney-final', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @elseif ($row->status == 'APPROVED WITH SCANNED DOCUMENT SENT')
                                    <a href="{{ route('legal.legalcorporate.powerattorney-final', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @else
                                    <a href="{{ route('legal.legalcorporate.powerattorney-check', [$row->id]) }}"
                                        class="btn btn-danger">Update</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endslot
            </x-modal-history>
        </div>

        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif

        <form method="POST" enctype="multipart/form-data"
            action="{{ route('legal.legalcorporate.powerattorney-update-post', $data->id) }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pengguna" name="name"
                        value="{{ $data->name }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Divisi/Regional" name="division"
                        value="{{ $data->division }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Departement/Cabang Utama" name="departement"
                        value="{{ $data->departement }}" disabled />
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <x-textarea name="attorney_purpose" label="Tujuan Pembuatan Surat Kuasa" labelClass="col-sm-5"
                        fieldClass="col-sm-7" disabled>{{ $data->attorney_purpose }}</x-textarea>
                </div>
            </div>

            <hr>

            <div class="row mt-3">

                <div class="col-sm-12">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7"
                        label="1. Internal Memo Permohonan Surat Kuasa ke Legal*" name="file_internal_memo" type="download"
                        path="{{ route('download.powerattorney', [substr($data->file_internal_memo, 14)]) }}">Unduh <i
                            class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Dokumen Pendukung*"
                        name="file_supporting_document" type="download"
                        path="{{ route('download.powerattorney', [substr($data->file_supporting_document, 14)]) }}">Unduh
                        <i class="fa fa-download"></i>
                    </x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. KTP Penerima Kuasa*"
                        name="file_endorsee_id" type="download"
                        path="{{ route('download.powerattorney', [substr($data->file_endorsee_id, 14)]) }}">Unduh
                        <i class="fa fa-download"></i>
                    </x-file>

                    <hr>

                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Scan Surat Kuasa"
                        name="file_scan_power_attorneys" />

                </div>
            </div>

            <hr>

            <div class="col-sm-12 mb-3">
                <label for="">Catatan dari Legal Corporate</label>
                <textarea class="form-control" name="cb_note" id="" cols="30" rows="10"></textarea>
            </div>

            {{-- <div class="col-sm-12 mb-3">
                <label for="">Catatan untuk Legal Corporate</label>
                <textarea class="form-control" name="user_note" id="" cols="30" rows="10" disabled>{{ $data->user_note }}</textarea>
            </div> --}}

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Approve" value="Approve" buttonClass="btn-primary me-3" />
            </div>
        </form>
    </x-base>
@endsection
