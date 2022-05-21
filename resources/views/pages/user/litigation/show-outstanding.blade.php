@extends('layouts.user')

@section('title')
    Outstanding
@endsection

@section('content')
    <x-base>
        <x-button-back />

        <div class="d-flex align-items-center justify-content-between">
            <h2>Outstanding</h2>
        </div>
        
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success"/>
            @endslot
        @endif

        <form action="{{ route('litigation.outstanding.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pihak" name="party_name" readOnly value="{{ $ost->party_name }}"/>
                    @php
                        $province = DB::table('provinces')
                            ->where('id', $ost->party_province)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Pihak" value="{{ ucwords(strtolower($province->name)) }}" readOnly/>
                    @php
                        $regency = DB::table('regencies')
                            ->where('id', $ost->party_regency)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Pihak" value="{{ ucwords(strtolower($regency->name)) }}" readOnly/>
                    @php
                        $district = DB::table('districts')
                            ->where('id', $ost->party_district)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Pihak" value="{{ ucwords(strtolower($district->name)) }}" readOnly/>
                    @php
                        $village = DB::table('villages')
                            ->where('id', $ost->party_village)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Pihak" value="{{ ucwords(strtolower($village->name)) }}" readOnly/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Pihak" value="{{ $ost->party_zip_code }}" readOnly/>
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" readOnly>
                        {{ $ost->party_address }}
                    </x-textarea> 
                </div>
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Unit/Departemen/Divisi" name="department" readOnly value="{{ $ost->department }}"/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Perjanjian" name="agreement_number" readOnly value="{{ $ost->agreement_number }}"/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Kerugian" prefix="Rp" name="total_loss" readOnly value="{{ number_format($ost->total_loss) }}"/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Perjanjian" type="date" name="from_date" readOnly value="{{ $ost->from_date }}"/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Berakhir Perjanjian" type="date" name="till_date" readOnly value="{{ $ost->till_date }}"/>
                </div>
            </div>
    
            <div class="row">
                <div class="col-sm-12">
                    <x-textarea
                        label="Kronologis Singkat Kejadian:" readOnly name="incident_chronology">
                      {{ $ost->incident_chronology }}
                    </x-textarea>
                </div>
            </div>

            <div class="row mt-3">
              <div class="col-sm-3">
                  <h5>Bukti :</h5>
              </div>
              <div class="col-sm-9">
                  <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Perjanjian/PCRF*" name="file_pcrf" type="download" path="{{ route('download.litigation', [substr($ost->file_pcrf, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                  <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Rekapitulasi Data Outstanding*" name="file_recapitulation" type="download" path="{{ route('download.litigation', [substr($ost->file_recapitulation, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                  <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Packing List / Invoice Tertunggak*" name="file_packing_list" type="download" path="{{ route('download.litigation', [substr($ost->file_packing_list, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                  <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Bukti Penagihan*" name="file_billing_proof" type="download" path="{{ route('download.litigation', [substr($ost->file_billing_proof, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                  <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Akta Perusahaan" name="file_deed_company" type="download" path="{{ route('download.litigation', [substr($ost->file_deed_company, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                  @if ($ost->file_deed_company)
                  <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Akta Perusahaan" name="file_deed_company" type="download" path="{{ route('download.litigation', [substr($ost->file_deed_company, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                  @else
                  <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Akta Perusahaan" value="Tidak Ada" readOnly/>
                  @endif
                  @if ($ost->file_nib)
                  <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Nomor Induk Berusaha (NIB)" name="file_nib" type="download" path="{{ route('download.litigation', [substr($ost->file_nib, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                  @else
                  <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Nomor Induk Berusaha (NIB)" value="Tidak Ada" readOnly/>
                  @endif
                  <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Dokumen Lainnya" name="file_other" type="download" path="{{ route('download.litigation', [substr($ost->file_other, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                  <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Status" value="{{ $ost->status }}" readOnly/>
              </div>
          </div>
        </form>
    </x-base>
@endsection
