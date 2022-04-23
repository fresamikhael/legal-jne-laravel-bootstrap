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
        <div class="row mt-3">
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Kasus" value="{{ $data->id }}" readOnly/>
            </div>
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Penerima" value="{{ $data->receiver_name }}" readOnly/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <x-textarea
                    label="Kronologis Singkat Kejadian:" readOnly>
                    {{ $data->incident_chronology }}
                </x-textarea>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Bentuk Kiriman :</h5>
            </div>
            <div class="col-sm-9">
                <x-input fieldClass="col-sm-12" value="{{ $data->shipping_form }}" readOnly/>
                @if ($data->shipping_form == "Lain-Lain")
                    <x-textarea fieldClass="col-sm-12" readOnly>
                        {{ $data->detail_shipping_form }}
                    </x-textarea>
                @endif
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Bukti :</h5>
            </div>
            <div class="col-sm-9">
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Connote*" name="file_connote" type="download" path="{{ route('download.litigation', [substr($data->file_connote, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Orion*" name="file_orion" type="download" path="{{ route('download.litigation', [substr($data->file_orion, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @if ($data->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. POD*" name="file_pod" type="download" path="{{ route('download.litigation', [substr($data->file_pod, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="3. POD*" value="Tidak Ada" readOnly/>
                @endif
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Form Kasus Sengketa Konsumen" name="file_customer_case_form" type="download" path="{{ route('download.litigation', [substr($data->file_customer_case_form, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @if ($data->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Kronologis Destinasi" name="file_destination_chronology" type="download" path="{{ route('download.litigation', [substr($data->file_destination_chronology, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Kronologis Destinasi" value="Tidak Ada" readOnly/>
                @endif
                @if ($data->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Kronologis Origin" name="file_orion_chronology" type="download" path="{{ route('download.litigation', [substr($data->file_orion_chronology, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Kronologis Origin" value="Tidak Ada" readOnly/>
                @endif
                @if ($data->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Kronologis CS" name="file_cs_chronology" type="download" path="{{ route('download.litigation', [substr($data->file_cs_chronology, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Kronologis CS" value="Tidak Ada" readOnly/>
                @endif
                @if ($data->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Surat Customer atau Somasi" name="file_subpoena" type="download" path="{{ route('download.litigation', [substr($data->file_subpoena, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Surat Customer atau Somasi" value="Tidak Ada" readOnly/>
                @endif
                @if ($data->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Surat Kuasa" name="file_procuration" type="download" path="{{ route('download.litigation', [substr($data->file_procuration, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Surat Kuasa" value="Tidak Ada" readOnly/>
                @endif
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Status" value="{{ $data->status }}" readOnly/>
            </div>
        </div>
        
        @if ($data->status == "PENDING")
            <form action="{{ route('cs.customer-dispute.store', [$data->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-3">
                    <div class="col-sm-3">
                        <h5>Berkas Tim CS :</h5>
                    </div>
                    <div class="col-sm-9">
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Form Kasus Sengketa Konsumen" name="file_consumer_dispute_case_form" required/>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Kronologis Pengiriman Operasional" name="file_operational_delivery_chronology" required/>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Kronologis Penanganan CS" name="file_cs_handling_chronology" required/>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Bukti POD" name="file_pod_evidence" required/>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Bukti Tanda Terima" name="file_receipt_proof" required/>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Bukti Dokumentasi 1" name="file_proof_of_documentation1" required/>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Bukti Dokumentasi 2" name="file_proof_of_documentation2" required/>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Bukti Dokumentasi 3" name="file_proof_of_documentation3" required/>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Dokumen pendukung lainnya" name="file_other_supporting_document" required/>
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal penawaran ganti kerugian" prefix="Rp" name="nominal_indemnity_offer" required/>
                    </div>
                </div>
                <div class="d-flex justify-content-end">
                    <x-button type="submit" name="Submit" buttonClass="btn-danger" />
                </div>
            </form>
        @elseif($data->status === "DILENGKAPI OLEH CS")
            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Berkas Tim CS :</h5>
                </div>
                <div class="col-sm-9">
                    @php
                        $cs = DB::table('cs')
                            ->where('form_id', $data->id)
                            ->first();
                    @endphp
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Form Kasus Sengketa Konsumen" name="file_consumer_dispute_case_form" type="download" path="{{ route('download.litigation', [substr($cs->file_consumer_dispute_case_form, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Kronologis Pengiriman Operasional" name="file_operational_delivery_chronology" type="download" path="{{ route('download.litigation', [substr($cs->file_operational_delivery_chronology, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Kronologis Penanganan CS" name="file_cs_handling_chronology" type="download" path="{{ route('download.litigation', [substr($cs->file_cs_handling_chronology, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Bukti POD" type="download" name="file_pod_evidence" path="{{ route('download.litigation', [substr($cs->file_pod_evidence, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Bukti Tanda Terima" name="file_receipt_proof" type="download" path="{{ route('download.litigation', [substr($cs->file_receipt_proof, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Bukti Dokumentasi 1" name="file_proof_of_documentation1" type="download" path="{{ route('download.litigation', [substr($cs->file_proof_of_documentation1, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Bukti Dokumentasi 2" name="file_proof_of_documentation2" type="download" path="{{ route('download.litigation', [substr($cs->file_proof_of_documentation2, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Bukti Dokumentasi 3" name="file_proof_of_documentation3" type="download" path="{{ route('download.litigation', [substr($cs->file_proof_of_documentation3, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Dokumen pendukung lainnya" name="file_other_supporting_document" type="download" path="{{ route('download.litigation', [substr($cs->file_other_supporting_document, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal penawaran ganti kerugian" name="nominal_indemnity_offer" prefix="Rp" value="{{ number_format($cs->nominal_indemnity_offer) }}" readOnly/>
                </div>
            </div>
        @endif
    </x-base>
@endsection
