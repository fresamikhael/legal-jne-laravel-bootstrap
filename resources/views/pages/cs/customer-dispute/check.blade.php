@extends('layouts.cs')

@section('title')
    Customer Dispute
@endsection

@section('content')
    <x-base>
        <h2>Customer Dispute</h2>
        
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success"/>
            @endslot
        @endif
        
        <form action="{{ route('litigation.customer-dispute.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Kasus" value="" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Pengiriman" value="" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pengirim" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Pengirim" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Pengirim" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Pengirim" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Pengirim" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Pengirim" disabled/>
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pengirim" disabled>
                    </x-textarea>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Pengirim" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab" disabled/>
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab (Lain-Lain)" name="causative_factor_other" disabled>    
                    </x-textarea>
                </div>
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Penerima" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Penerima" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Penerima" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Penerima" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Penerima" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Penerima" disabled/>
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Penerima" disabled/>               
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Penerima" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Kerugian/Klaim" prefix="Rp" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Barang" prefix="Rp" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Connote/Perjanjian" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Customer" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Pengiriman" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi Nominal" prefix="Rp" disabled/>
                </div>
            </div>
    
            <div class="row">
                <div class="col-sm-12">
                    <x-textarea
                        label="Kronologis Singkat Kejadian:" disabled>
                    </x-textarea>
                </div>
            </div>
    
            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Bentuk Kiriman :</h5>
                </div>
                <div class="col-sm-9">
                    <x-input fieldClass="col-sm-12" disabled/>
                    <x-textarea fieldClass="col-sm-12" disabled>
                    </x-textarea>
                </div>
            </div>
    
            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Bukti :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Connote*" name="file_connote"/>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Orion*" name="file_orion"/>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. POD*" name="file_pod" option/>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Form Kasus Sengketa Konsumen" name="file_customer_case_form"/>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Kronologis Destinasi" name="file_destination_chronology" option/>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Kronologis Origin" name="file_orion_chronology" option/>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Kronologis CS" name="file_cs_chronology" option/>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Surat Customer atau Somasi" name="file_subpoena" option/>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Surat Kuasa" name="file_procuration" option/>
                </div>
            </div>
    
            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
