@extends('layouts.user')

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
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-primary">Lihat</a>
                        </td>
                    </tr>
                @endslot
            </x-modal-history>
        </div>

        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('legalcorporate.powerattorney-post') }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pengguna" name="name" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Divisi/Regional" name="division" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Departement/Cabang Utama"
                        name="departement" />
                </div>

            </div>

            <div class="row">
                <div class="col-sm-12">
                    <x-textarea name="attorney_purpose" label="Tujuan Pembuatan Surat Kuasa" labelClass="col-sm-5"
                        fieldClass="col-sm-7" />
                </div>
            </div>

            <div class="row mt-3">

                <div class="col-sm-12">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7"
                        label="1. Internal Memo Permohonan Surat Kuasa ke Legal*" name="file_internal_memo" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Dokumen Pendukung*"
                        name="file_supporting_document" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. KTP Penerima Kuasa*"
                        name="file_endorsee_id" />

                </div>
            </div>

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
