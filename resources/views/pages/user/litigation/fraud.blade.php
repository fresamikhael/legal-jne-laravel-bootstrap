@extends('layouts.user')

@section('title')
    Fraud
@endsection

@section('content')
    <x-base>
        <h2>Fraud</h2>
        {{-- @slot('alert')
    <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        <div class="row mt-3">
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Kasus" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal" type="date" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Kasus" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab" />
            </div>
            <div class="col-sm-6">
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Pelaku" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Unit/Departemen/Divisi" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Kerugian" prefix="Rp"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Kejadian" type="date"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tempat Kejadian" />
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
                <h5>Klasifikasi Fraud :</h5>
            </div>
            <div class="col-sm-9">
                <x-select fieldClass="col-sm-12"/>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Bukti :</h5>
            </div>
            <div class="col-sm-9">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Saksi 1" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Departemen/Unit" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Saksi 2" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Departemen/Unit" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Bukti Dokumen Surat" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Keterangan Pelaku" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Keterangan Saksi" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Lain-Lain" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Dokumen Barang Bukti" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="10. Dokumen Investigasi" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="11. Bukti Lainnya" />
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <x-button type="submit" name="Submit" buttonClass="btn-danger" />
        </div>
    </x-base>
@endsection
