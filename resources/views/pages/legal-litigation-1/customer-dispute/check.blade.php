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
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Dokumen" value="{{ $cs->id }}" readOnly/>
            </div>
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Dokumen Litigasi" value="{{ $cs->form_id }}" readOnly/>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Berkas Tim CS :</h5>
            </div>
            <div class="col-sm-9">
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Form Kasus Sengketa Konsumen" name="file_consumer_dispute_case_form" type="download" path="{{ route('download.litigation', [substr($cs->file_consumer_dispute_case_form, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Kronologis Pengiriman Operasional" name="file_operational_delivery_chronology" type="download" path="{{ route('download.litigation', [substr($cs->file_operational_delivery_chronology, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Kronologis Penanganan CS" name="file_cs_handling_chronology" type="download" path="{{ route('download.litigation', [substr($cs->file_cs_handling_chronology, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Bukti POD" name="file_pod_evidence" type="download" path="{{ route('download.litigation', [substr($cs->file_pod_evidence, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Bukti Tanda Terima" name="file_receipt_proof" type="download" path="{{ route('download.litigation', [substr($cs->file_receipt_proof, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Bukti Dokumentasi 1" name="file_proof_of_documentation1" type="download" path="{{ route('download.litigation', [substr($cs->file_proof_of_documentation1, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Bukti Dokumentasi 2" name="file_proof_of_documentation2" type="download" path="{{ route('download.litigation', [substr($cs->file_proof_of_documentation2, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Bukti Dokumentasi 3" name="file_proof_of_documentation3" type="download" path="{{ route('download.litigation', [substr($cs->file_proof_of_documentation3, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Dokumen pendukung lainnya" name="file_other_supporting_document" type="download" path="{{ route('download.litigation', [substr($cs->file_other_supporting_document, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal penawaran ganti kerugian" prefix="Rp" value="{{ number_format($cs->nominal_indemnity_offer) }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Status" value="{{ $cs->status }}" readOnly/>
            </div>
        </div>

        @if ($cs->status == "RETURNED BY LEGAL LITIGASI 1")
            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Berkas Legal Litigation 1 :</h5>
                </div>
                <div class="col-sm-9">
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Note (Jika Ditokak)" name="note" readOnly>
                        {{ $cs->note }}
                    </x-textarea>
                </div>
            </div>
        @elseif ($cs->status == "APPROVED BY LEGAL LITIGASI 1")
            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Berkas Legal Litigation 1 :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Draft Tanggapan Somasi" name="file_subpoena_responese_draft" type="download" path="{{ route('download.litigation', [substr($cs->file_subpoena_responese_draft, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Analisis Kasus" name="case_analysis" readOnly>
                        {{ $cs->case_analysis }}
                    </x-textarea>
                </div>
            </div>
        @else
            <form action="{{ route('legal-litigation-1.customer-dispute.store', [$cs->form_id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-3">
                    <div class="col-sm-3">
                        <h5>Berkas Legal Litigation 1 :</h5>
                    </div>
                    <div class="col-sm-9">
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Draft Tanggapan Somasi" name="file_subpoena_responese_draft"/>
                        <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Analisis Kasus" name="case_analysis"/>
                        @if ($cs->status == "DIPERBAIKI OLEH CS")
                            <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Note (Penolakan Baru)" name="note"/>
                            <x-textarea readOnly labelClass="col-sm-5" fieldClass="col-sm-7" label="Note (Penolakan Sebelumnya)">
                                {{$cs->note}}
                            </x-textarea>
                        @else
                            <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Note (Jika Ditokak)" name="note"/>
                        @endif
                    </div>
                </div>
        
                <div class="d-flex align-items-center gap-3 justify-content-end">
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-danger" name="action" value="return">Return</button>
                    </div>
                    <div class="d-flex justify-content-end">
                        <button type="submit" class="btn btn-primary" name="action" value="approve">Approve</button>
                    </div>
                </div>
            </form>
        @endif
    </x-base>
@endsection
