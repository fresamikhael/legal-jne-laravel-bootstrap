@extends('layouts.legal')

@section('title')
    Surat Kuasa
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
                    @foreach ($data as $row)
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
                                @elseif ($row->status == 'SENT BY LEGAL CORPORATES')
                                    <button type="button" class="btn btn-warning" disabled>SENT BY LEGAL
                                        CORPORATES</button>
                                @elseif ($row->status == 'APPROVED BY HEAD OF LEGAL DIVISION')
                                    <button type="button" class="btn btn-warning" disabled>APPROVED BY HEAD OF LEGAL
                                        DIVISION</button>
                                @elseif ($row->status == 'REJECTED BY HEAD OF LEGAL DIVISION')
                                    <button type="button" class="btn btn-danger" disabled>REJECTED BY HEAD OF LEGAL
                                        DIVISION</button>
                                @elseif ($row->status == 'APPROVED WITH SCANNED DOCUMENT SENT')
                                    <button type="button" class="btn btn-success" disabled>APPROVED WITH SCANNED
                                        DOCUMENT
                                        SENT</button>
                                @else
                                    <button type="button" class="btn btn-warning" disabled>Pengajuan Diproses</button>
                                @endif
                            </td>
                            <td>
                                @if ($row->status == 'APPROVED BY LEGAL CORPORATES')
                                    <a href="{{ route('legal.legalcorporate.powerattorney-check', [$row->id]) }}"
                                        class="btn btn-danger">Update</a>
                                @elseif ($row->status == 'SENT BY LEGAL CORPORATES')
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

        <form method="POST" enctype="multipart/form-data" action="{{ route('legal.legalcorporate.powerattorney-post') }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Penerima Kuasa" name="name"
                        required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor KTP" name="id_number" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tempat Lahir" name="birth_place" required />
                    <x-input type="date" labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Lahir"
                        name="birth_date" required />
                    <x-address label="" name="user" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Divisi/Regional" name="division" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Departement/Cabang Utama" name="departement"
                        required />
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <x-textarea name="attorney_purpose" label="Tujuan Pembuatan Surat Kuasa" labelClass="col-sm-5"
                        fieldClass="col-sm-7" required />
                </div>
            </div>

            <hr>

            <div class="row mt-3">

                <div class="col-sm-12">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7"
                        label="1. Internal Memo Permohonan Surat Kuasa ke Legal*" name="file_internal_memo" required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. KTP Penerima Kuasa*"
                        name="file_endorsee_id" required />

                </div>
            </div>

            <x-input name="status" value="SENT BY LEGAL CORPORATES" hidden></x-input>

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection

{{-- @extends ('layouts.legal')

@section('title')
    Surat Kuasa
@endsection

@section('content')
    <x-base>
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Kasus</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($data as $row)
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
                                        <button type="button" class="btn btn-success" disabled>APPROVED WITH SCANNED
                                            DOCUMENT
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
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>No</th>
                            <th>Nomor Kasus</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
    </x-base>
@endsection --}}
