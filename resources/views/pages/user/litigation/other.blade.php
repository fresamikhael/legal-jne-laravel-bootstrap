@extends('layouts.user')

@section('title')
    Other
@endsection

@section('content')
    <x-base>
        <h2>Other</h2>
        {{-- @slot('alert')
    <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        <div class="row mt-3">
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Kasus" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
            </div>
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Unit/Departemen/Divisi" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Dokumen" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Kerugian/Klaim" prefix="Rp"/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <x-textarea
                    label="Kronologis Singkat Kejadian:" />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Bukti :</h5>
            </div>
            <div class="col-sm-9">
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Dokumen*" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Bukti*" />
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <x-button type="submit" name="Submit" buttonClass="btn-danger" />
        </div>
    </x-base>
@endsection
