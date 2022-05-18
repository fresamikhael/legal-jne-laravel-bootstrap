@extends('layouts.user')

@section('title')
    Customer Dispute
@endsection

@section('content')
    <x-base>
        <x-button-back />
        <div class="d-flex align-items-center justify-content-between">
            <h2>Customer Dispute</h2>
        </div>
        
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success"/>
            @endslot
        @endif
        
        <div class="row mt-3">
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Pengiriman" name="shipping_date" type="date" value="{{ $cd->shipping_date }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pengirim" name="sender_name" value="{{ $cd->sender_name }}" readOnly/>
                @php
                    $province = DB::table('provinces')
                        ->where('id', $cd->sender_province)
                        ->first();
                @endphp
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Pengirim" value="{{ ucwords(strtolower($province->name)) }}" readOnly/>
                @php
                    $regency = DB::table('regencies')
                        ->where('id', $cd->sender_regency)
                        ->first();
                @endphp
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Pengirim" value="{{ ucwords(strtolower($regency->name)) }}" readOnly/>
                @php
                    $district = DB::table('districts')
                        ->where('id', $cd->sender_district)
                        ->first();
                @endphp
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Pengirim" value="{{ ucwords(strtolower($district->name)) }}" readOnly/>
                @php
                    $village = DB::table('villages')
                        ->where('id', $cd->sender_village)
                        ->first();
                @endphp
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Pengirim" value="{{ ucwords(strtolower($village->name)) }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Pengirim" value="{{ $cd->sender_zip_code }}" readOnly/>
                <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pengirim" readOnly>
                    {{ $cd->sender_address }}
                </x-textarea>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Pengirim" name="sender_phone_number" readOnly value="{{ $cd->sender_phone_number }}"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Kasus" name="case_type" readOnly value="{{ $cd->case_type }}"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab" name="causative_factor" readOnly value="{{ $cd->causative_factor }}"/>
                @if ($cd->causative_factor_others !== null)
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab (Lain-Lain)" name="causative_factor_others" readOnly>
                        {{$cd->causative_factor_others}}
                    </x-textarea>
                @endif
            </div>
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Penerima" name="receiver_name" readOnly value="{{ $cd->receiver_name }}"/>
                @php
                    $province = DB::table('provinces')
                        ->where('id', $cd->receiver_province)
                        ->first();
                @endphp
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Penerima" value="{{ ucwords(strtolower($province->name)) }}" readOnly/>
                @php
                    $regency = DB::table('regencies')
                        ->where('id', $cd->receiver_regency)
                        ->first();
                @endphp
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Penerima" value="{{ ucwords(strtolower($regency->name)) }}" readOnly/>
                @php
                    $district = DB::table('districts')
                        ->where('id', $cd->receiver_district)
                        ->first();
                @endphp
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Penerima" value="{{ ucwords(strtolower($district->name)) }}" readOnly/>
                @php
                    $village = DB::table('villages')
                        ->where('id', $cd->receiver_village)
                        ->first();
                @endphp
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Penerima" value="{{ ucwords(strtolower($village->name)) }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Penerima" value="{{ $cd->receiver_zip_code }}" readOnly/>
                <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Penerima" readOnly>
                    {{ $cd->receiver_address }}
                </x-textarea>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Penerima" name="receiver_phone_number" readOnly value="{{ $cd->receiver_phone_number }}"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Kerugian/Klaim" prefix="Rp" name="total_loss" readOnly value="{{ number_format($cd->total_loss) }}"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Barang" prefix="Rp" name="item_nominal" readOnly value="{{ number_format($cd->item_nominal) }}"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Connote/Perjanjian" name="connote" readOnly value="{{ $cd->connote }}"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Customer" name="customer" readOnly value="{{ $cd->customer }}"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Pengiriman" name="shipping_type" readOnly value="{{ $cd->shipping_type }}"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi" name="assurance" readOnly value="{{ $cd->assurance }}"/>
                @if ($cd->assurance == "Ada")
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi Nominal" name="assurance_nominal" prefix="Rp" readOnly value="{{ number_format($cd->assurance_nominal) }}"/>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <x-textarea
                    label="Kronologis Singkat Kejadian:" name="incident_chronology" readOnly>
                    {{ $cd->incident_chronology }}
                </x-textarea>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Bentuk Kiriman :</h5>
            </div>
            <div class="col-sm-9">
                <x-input fieldClass="col-sm-12" value="{{ $cd->shipping_form }}" readOnly/>
                @if ($cd->shipping_form == "Lain-Lain")
                    <x-textarea fieldClass="col-sm-12" readOnly>
                        {{ $cd->detail_shipping_form }}
                    </x-textarea>
                @endif
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Bukti :</h5>
            </div>
            <div class="col-sm-9">
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Connote*" name="file_connote" type="download" path="{{ route('download.litigation', [substr($cd->file_connote, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Orion*" name="file_orion" type="download" path="{{ route('download.litigation', [substr($cd->file_orion, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @if ($cd->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. POD*" name="file_pod" type="download" path="{{ route('download.litigation', [substr($cd->file_pod, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="3. POD*" value="Tidak Ada" readOnly/>
                @endif
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Form Kasus Sengketa Konsumen" name="file_customer_case_form" type="download" path="{{ route('download.litigation', [substr($cd->file_customer_case_form, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @if ($cd->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Kronologis Destinasi" name="file_destination_chronology" type="download" path="{{ route('download.litigation', [substr($cd->file_destination_chronology, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Kronologis Destinasi" value="Tidak Ada" readOnly/>
                @endif
                @if ($cd->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Kronologis Origin" name="file_orion_chronology" type="download" path="{{ route('download.litigation', [substr($cd->file_orion_chronology, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Kronologis Origin" value="Tidak Ada" readOnly/>
                @endif
                @if ($cd->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Kronologis CS" name="file_cs_chronology" type="download" path="{{ route('download.litigation', [substr($cd->file_cs_chronology, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Kronologis CS" value="Tidak Ada" readOnly/>
                @endif
                @if ($cd->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Surat Customer atau Somasi" name="file_subpoena" type="download" path="{{ route('download.litigation', [substr($cd->file_subpoena, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Surat Customer atau Somasi" value="Tidak Ada" readOnly/>
                @endif
                @if ($cd->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Surat Kuasa" name="file_procuration" type="download" path="{{ route('download.litigation', [substr($cd->file_procuration, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Surat Kuasa" value="Tidak Ada" readOnly/>
                @endif
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Status" value="{{ $cd->status }}" readOnly/>
            </div>
        </div>
    </x-base>
@endsection
