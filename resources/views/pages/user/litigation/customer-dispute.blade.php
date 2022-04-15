@extends('layouts.user')

@section('title')
    Customer Dispute
@endsection

@section('content')
    <x-base>
        <h2>Customer Dispute</h2>
        {{-- @slot('alert')
    <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        <div class="row mt-3">
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Kasus" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Pengiriman" type="date" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pengirim" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Pengirim" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Kasus" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab" />
            </div>
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Penerima" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Penerima" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Penerima" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Kerugian/Klaim" prefix="Rp"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Barang" prefix="Rp"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Connote/Perjanjian" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Customer" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Pengiriman" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi" />
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
                <h5>Bentuk Kiriman :</h5>
            </div>
            <div class="col-sm-9">
                <x-select fieldClass="col-sm-12"/>
                <x-textarea fieldClass="col-sm-12"/>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Bukti :</h5>
            </div>
            <div class="col-sm-9">
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Connote*" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Orion*" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. POD*" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Form Kasus Sengketa Konsumen" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Kronologis Destinasi" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Kronologis Origin" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Kronologis CS" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Surat Customer atau Somasi" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Surat Kuasa" />
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <x-button type="submit" name="Submit" buttonClass="btn-danger" />
        </div>
    </x-base>
@endsection
