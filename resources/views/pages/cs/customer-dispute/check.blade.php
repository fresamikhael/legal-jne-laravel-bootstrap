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
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Kasus" value="{{ $data->id }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Pengiriman" value="{{ $data->shipping_date }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pengirim" value="{{ $data->sender_name }}" disabled/>
                    @php
                        $province = DB::table('provinces')
                            ->where('id', $data->sender_province)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Pengirim" value="{{ $province->name }}" disabled/>
                    @php
                        $regency = DB::table('regencies')
                            ->where('id', $data->sender_regency)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Pengirim" value="{{ $regency->name }}" disabled/>
                    @php
                        $district = DB::table('districts')
                            ->where('id', $data->sender_district)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Pengirim" value="{{ $district->name }}" disabled/>
                    @php
                        $village = DB::table('villages')
                            ->where('id', $data->sender_village)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Pengirim" value="{{ $village->name }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Pengirim" value="{{ $data->sender_zip_code }}" disabled/>
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pengirim" disabled>
                        {{ $data->sender_address }}
                    </x-textarea>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Pengirim" value="{{ $data->shipping_date }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab" value="{{ $data->shipping_date }}" disabled/>
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab (Lain-Lain)" disabled>    
                        {{ $data->shipping_date }}
                    </x-textarea>
                </div>
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Penerima" value="{{ $data->shipping_date }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Penerima" value="{{ $data->shipping_date }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Penerima" value="{{ $data->shipping_date }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Penerima" value="{{ $data->shipping_date }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Penerima" value="{{ $data->shipping_date }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Penerima" value="{{ $data->shipping_date }}" disabled/>
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Penerima" disabled>
                        {{ $data->shipping_date }}
                    </x-textarea>               
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Penerima" value="{{ $data->shipping_date }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Kerugian/Klaim" prefix="Rp" value="{{ $data->shipping_date }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Barang" prefix="Rp" value="{{ $data->shipping_date }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Connote/Perjanjian" value="{{ $data->shipping_date }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Customer" value="{{ $data->shipping_date }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Pengiriman" value="{{ $data->shipping_date }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi" value="{{ $data->shipping_date }}" disabled/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi Nominal" value="{{ $data->shipping_date }}" prefix="Rp" disabled/>
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
