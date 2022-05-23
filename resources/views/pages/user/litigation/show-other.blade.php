@extends('layouts.user')

@section('title')
    Other
@endsection

@section('content')
    <x-base>
        <x-button-back />

        <div class="d-flex align-items-center justify-content-between">
            <h2>Other</h2>
        </div>
        
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success"/>
            @endslot
        @endif

        <form action="{{ route('litigation.other.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pihak" name="party_name" readOnly value="{{ $ol->party_name }}"/>
                    @php
                        $province = DB::table('provinces')
                            ->where('id', $ol->party_province)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Pihak" value="{{ ucwords(strtolower($province->name)) }}" readOnly/>
                    @php
                        $regency = DB::table('regencies')
                            ->where('id', $ol->party_regency)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Pihak" value="{{ ucwords(strtolower($regency->name)) }}" readOnly/>
                    @php
                        $district = DB::table('districts')
                            ->where('id', $ol->party_district)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Pihak" value="{{ ucwords(strtolower($district->name)) }}" readOnly/>
                    @php
                        $village = DB::table('villages')
                            ->where('id', $ol->party_village)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Pihak" value="{{ ucwords(strtolower($village->name)) }}" readOnly/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Pihak" value="{{ $ol->party_zip_code }}" readOnly/>
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" readOnly>
                        {{ $ol->party_address }}
                    </x-textarea>            
                </div>
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Unit/Departemen/Divisi" name="department" readOnly value="{{ $ol->department }}"/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Dokumen" name="document_number" readOnly value="{{ $ol->document_number }}"/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Kerugian/Klaim" prefix="Rp" name="total_loss" readOnly value="{{ number_format($ol->total_loss) }}"/>
                </div>
            </div>
    
            <div class="row">
                <div class="col-sm-12">
                    <x-textarea
                        label="Kronologis Singkat Kejadian:" name="incident_chronology" readOnly>
                        {{ $ol->incident_chronology }}
                    </x-textarea>
                </div>
            </div>
    
            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Bukti :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Dokumen*" name="file_document" type="download" path="{{ route('download.litigation', [substr($ol->file_document, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Bukti*" name="file_proof" type="download" path="{{ route('download.litigation', [substr($ol->file_proof, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Status" value="{{ $ol->status }}" readOnly/>
                </div>
            </div>
        </form>
    </x-base>
@endsection
