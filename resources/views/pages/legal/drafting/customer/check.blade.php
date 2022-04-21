@extends('layouts.legal')

@section('title')
    Check Customer
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Customer</h2>
            <x-modal-history>
                @slot('header')
                    <tr>
                        <th>No</th>
                        <th>Nomor Kasus</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                @endslot

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

        <form method="POST" enctype="multipart/form-data" action="{{ route('legal.drafting.legal-customer-post') }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-6">
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Nama Pihak</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $data->party_name }}" name="id"
                                    disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Provinsi Pihak</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control"
                                    value="{{ App\Models\Province::find($data->party_province)->name }}" name="id"
                                    disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Kab/Kota Pihak</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control"
                                    value="{{ App\Models\Regency::find($data->party_regency)->name }}" name="id"
                                    disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Kecamatan Pihak</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control"
                                    value="{{ App\Models\District::find($data->party_district)->name }}" name="id"
                                    disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Kelurahan Pihak</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control"
                                    value="{{ App\Models\Village::find($data->party_village)->name }}" name="id"
                                    disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Kode Pos Pihak</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $data->party_zip_code }}" name="id"
                                    disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Alamat Pihak</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $data->party_address }}" name="id"
                                    disabled />
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Nama Pihak (Opsional)</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $data->optional_party_name }}"
                                    name="id" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Provinsi Pihak (Opsional)</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control"
                                    value="{{ App\Models\Province::find($data->optional_party_province)->name }}"
                                    name="id" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Kab/Kota Pihak (Opsional)</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control"
                                    value="{{ App\Models\Regency::find($data->optional_party_regency)->name }}" name="id"
                                    disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Kecamatan Pihak (Opsional)</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control"
                                    value="{{ App\Models\District::find($data->optional_party_district)->name }}"
                                    name="id" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Kelurahan Pihak (Opsional)</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control"
                                    value="{{ App\Models\Village::find($data->optional_party_village)->name }}" name="id"
                                    disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Kode Pos Pihak (Opsional)</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $data->optional_party_zip_code }}"
                                    name="id" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Alamat Pihak (Opsional)</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $data->optional_party_address }}"
                                    name="id" disabled />
                            </div>
                        </div>
                    </div>
                    <x-input value="{{ $data->type }}" labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis"
                        name="type" readOnly />
                    <x-input value="{{ $data->addendum_to }}" labelClass="col-sm-5" fieldClass="col-sm-7"
                        label="Addendum Ke" name="addendum_to" readOnly />
                    <x-input value="{{ $data->discount }}" labelClass="col-sm-5" fieldClass="col-sm-7" label="Discount"
                        name="discount" postfix="%" readOnly />
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <x-textarea name="other_point" disabled
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
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Form Pengajuan PKS*"
                        name="file_claim_form">
                    </x-file>
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Korespondensi :</h5>
                </div>
                <div class="col-sm-9">
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Nama PIC</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $data->correspondence_name }}"
                                    name="id" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Provinsi PIC</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control"
                                    value="{{ App\Models\Province::find($data->correspondence_province)->name }}"
                                    name="id" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Kab/Kota PIC</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control"
                                    value="{{ App\Models\Regency::find($data->correspondence_regency)->name }}" name="id"
                                    disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Kecamatan PIC</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control"
                                    value="{{ App\Models\District::find($data->correspondence_district)->name }}"
                                    name="id" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Kelurahan PIC</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control"
                                    value="{{ App\Models\Village::find($data->correspondence_village)->name }}" name="id"
                                    disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Kode Pos PIC</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $data->correspondence_zip_code }}"
                                    name="id" disabled />
                            </div>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="id" class="col-sm-5 col-form-label">Alamat PIC</label>
                        <div class="col-sm-7">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $data->correspondence_address }}"
                                    name="id" disabled />
                            </div>
                        </div>
                    </div>
                    <x-input value="{{ $data->correspondence_phone }}" labelClass="col-sm-5" fieldClass="col-sm-7"
                        label="No Telepon PIC" name="correspondence_phone" readOnly />
                    <x-input value="{{ $data->correspondence_email }}" labelClass="col-sm-5" fieldClass="col-sm-7"
                        label="Email PIC" name="correspondence_email" readOnly />
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

            <div class="col-sm-12 mb-3">
                <label for="">Reason If Returned</label>
                <textarea class="form-control" name="note" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Approve" buttonClass="btn-primary me-3" />
                <x-button type="submit" name="Reject" buttonClass="btn-danger" />
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
