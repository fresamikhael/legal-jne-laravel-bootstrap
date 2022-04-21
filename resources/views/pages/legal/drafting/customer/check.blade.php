@extends('layouts.legal')

@section('title')
    Check Customer
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Customer</h2>
            <x-modal-history>
                @slot('data')
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-primary">Lihat</a>
                        </td>
                    </tr>
                @endslot
            </x-modal-history>
        </div>

        <form method="POST" enctype="multipart/form-data" action="{{ route('legal.drafting.customer-post') }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-6">
                    <x-input name="party_name" type="text" labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pihak"
                        value="{{ $data->party_name }}" readonly />
                    <x-address label="Pihak" name="party" />
                </div>
                <div class="col-sm-6">
                    <x-input value="{{ $data->optional_party_name }}" labelClass="col-sm-5" fieldClass="col-sm-7"
                        label="Nama Pihak (Optional)" name="optional_party_name" />
                    <x-address label="Pihak (Optional)" name="optional_party" />
                    <x-input value="{{ $data->type }}" labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis"
                        name="type" />
                    <x-input value="{{ $data->addendum_to }}" labelClass="col-sm-5" fieldClass="col-sm-7"
                        label="Addendum Ke" name="addendum_to" />
                    <x-input value="{{ $data->discount }}" labelClass="col-sm-5" fieldClass="col-sm-7" label="Discount"
                        name="discount" postfix="%" />
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <x-textarea name="other_point"
                        label="Poin-Poin Khusus Lainnya Yang Dicantumkan Dalam Perjanjian Sesuai Kesepakatan Para Pihak:">
                        {!! $data->other_point !!}
                    </x-textarea>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Dokumen :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. MOM/Penawaran Kesepakatan Para Pihak"
                        name="file_mom" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Draft Perjanjian dalam bentuk word"
                        name="file_agreement_draft" option />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Form Pengajuan PKS*"
                        name="file_claim_form">
                        <a href="{{ route('download-Drafting', substr($data->file_claim_form, 11)) }}"
                            style="font-size:24px ">
                            <div class="btn btn-primary">
                                Download
                                <i class="fa fa-download"></i>
                            </div>
                        </a>
                    </x-input>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Korespondensi :</h5>
                </div>
                <div class="col-sm-9">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama PIC" name="correspondence_name" />
                    <x-address label="PIC" name="correspondence" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="No Telepon PIC"
                        name="correspondence_phone" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Email PIC" name="correspondence_email" />
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Entitas :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Akta Perusahaan"
                        name="file_deed_of_company" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Nomor Induk Berusaha (NIB)*"
                        name="file_nib" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Nomor Pokok Wajib Pajak (NPWP)*"
                        name="file_npwp" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Izin Usaha" name="file_business_permit"
                        option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Izin Lokasi OSS" name="file_oss_location"
                        option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. KTP Direksi" name="file_director_id_card"
                        option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Surat Kuasa" name="file_sk" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Lain-lain" name="file_other" />
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection

@push('addon-script')
    <script type="text/javascript">
        $(function() {
            var table = $('#dataTables').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: "{{ route('regulation.internal') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        "className": "text-center"
                    },
                    {
                        data: 'name',
                        name: 'name',
                        "className": "text-center"
                    },
                    {
                        data: 'action',
                        name: 'action',
                        "className": "text-center",
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endpush
