@extends('layouts.user')

@section('title')
    Outstanding
@endsection

@section('content')
    <x-base>
        <x-button-back />

        <div class="d-flex align-items-center justify-content-between">
            <h2>Outstanding</h2>
            
            <x-modal-history id="dataTables">
                @slot('header')
                    <tr>
                        <th>No</th>
                        <th>Nomor Kasus</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                @endslot
                @slot('data')
                    @foreach ($ost as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                <a href="{{ route('litigation.outstanding.show', $row->id) }}" class="btn btn-primary">Lihat</a>
                            </td>
                        </tr>
                    @endforeach
                @endslot
            </x-modal-history>
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
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pihak" name="party_name" required/>
                    <x-address label="Pihak" name="party"/>                
                </div>
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Unit/Departemen/Divisi" name="department" required/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Perjanjian" name="agreement_number" required/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Kerugian" prefix="Rp" name="total_loss" required/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Perjanjian" type="date" name="from_date" required/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Berakhir Perjanjian" type="date" name="till_date" required/>
                </div>
            </div>
    
            <div class="row">
                <div class="col-sm-12">
                    <x-textarea
                        label="Kronologis Singkat Kejadian:" name="incident_chronology"/>
                </div>
            </div>
    
            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Bukti :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Perjanjian/PCRF*" name="file_pcrf"/>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Rekapitulasi Data Outstanding*" name="file_recapitulation"/>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Packing List / Invoice Tertunggak*" name="file_packing_list"/>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Bukti Penagihan*" name="file_billing_proof"/>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Akta Perusahaan" name="file_deed_company" option/>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Nomor Induk Berusaha (NIB)" name="file_nib" option/>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Dokumen Lainnya" name="file_other"/>
                </div>
            </div>
    
            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
