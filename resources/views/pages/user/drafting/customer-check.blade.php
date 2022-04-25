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
                    @foreach ($table as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                @if ($row->status == 'APPROVED BY CONTRACT BUSINESS')
                                    <a href="{{ route('legal.drafting.legal-customer-check', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @else
                                    <a href="{{ route('legal.drafting.legal-customer-check', [$row->id]) }}"
                                        class="btn btn-info">Update</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endslot
            </x-modal-history>
        </div>

        <form method="POST" enctype="multipart/form-data" action="{{ route('drafting.customer-check-post', $data->id) }}">
            @csrf

            <div class="row mt-3">
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pihak"
                        value="{{ $data->party_name }}" disabled />
                    @php
                        $province = DB::table('provinces')
                            ->where('id', $data->party_province)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Pihak"
                        value="{{ ucwords(strtolower($province->name)) }}" disabled />
                    @php
                        $regency = DB::table('regencies')
                            ->where('id', $data->party_regency)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Pihak"
                        value="{{ ucwords(strtolower($regency->name)) }}" disabled />
                    @php
                        $district = DB::table('districts')
                            ->where('id', $data->party_district)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Pihak"
                        value="{{ ucwords(strtolower($district->name)) }}" disabled />
                    @php
                        $village = DB::table('villages')
                            ->where('id', $data->party_village)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Pihak"
                        value="{{ ucwords(strtolower($village->name)) }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Pihak"
                        value="{{ $data->party_zip_code }}" disabled />
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" disabled>
                        {{ $data->party_address }}
                    </x-textarea>
                </div>
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pihak (Opsional)"
                        value="{{ $data->optional_party_name }}" disabled />
                    @php
                        $province = DB::table('provinces')
                            ->where('id', $data->optional_party_province)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Pihak (Opsional)"
                        value="{{ ucwords(strtolower($province->name)) }}" disabled />
                    @php
                        $regency = DB::table('regencies')
                            ->where('id', $data->optional_party_regency)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Pihak (Opsional)"
                        value="{{ ucwords(strtolower($regency->name)) }}" disabled />
                    @php
                        $district = DB::table('districts')
                            ->where('id', $data->optional_party_district)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Pihak (Opsional)"
                        value="{{ ucwords(strtolower($district->name)) }}" disabled />
                    @php
                        $village = DB::table('villages')
                            ->where('id', $data->optional_party_village)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Pihak (Opsional)"
                        value="{{ ucwords(strtolower($village->name)) }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Pihak (Opsional)"
                        value="{{ $data->optional_party_zip_code }}" disabled />
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak (Opsional)" disabled>
                        {{ $data->optional_party_address }}
                    </x-textarea>
                    <x-input value="{{ $data->type }}" labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis"
                        name="type" disabled />
                    <x-input value="{{ $data->addendum_to }}" labelClass="col-sm-5" fieldClass="col-sm-7"
                        label="Addendum Ke" name="addendum_to" disabled />
                    <x-input value="{{ $data->discount }}" labelClass="col-sm-5" fieldClass="col-sm-7" label="Discount"
                        name="discount" postfix="%" disabled />
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

            <hr>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Dokumen :</h5>
                </div>
                <div class="col-sm-9">
                    @if ($data->file_mom)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. MOM/Penawaran Kesepakatan Para Pihak"
                            name="file_mom" type="download"
                            path="{{ route('download.drafting', [substr($data->file_mom, 9)]) }}">Unduh <i
                                class="fa fa-download"></i></x-file>
                    @else
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="1. MOM/Penawaran Kesepakatan Para Pihak"
                            value="Tidak Ada" readOnly />
                    @endif
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Form Pengajuan PKS*"
                        name="file_claim_form" type="download"
                        path="{{ route('download.drafting', [substr($data->file_claim_form, 9)]) }}">
                        Unduh <i class="fa fa-download"></i>
                    </x-file>
                    @if ($data->file_agreement_draft)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Draft Perjanjian dalam bentuk word"
                            name="file_agreement_draft" type="download"
                            path="{{ route('download.drafting', [substr($data->file_agreement_draft, 9)]) }}">Unduh <i
                                class="fa fa-download"></i></x-file>
                    @else
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Draft Perjanjian dalam bentuk word"
                            value="Tidak Ada" hidden />
                    @endif
                    @if ($data->file_agreement_signature)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Perjanjian yang telah ditandatangan"
                            name="file_agreement_signature" type="download"
                            path="{{ route('download.drafting', [substr($data->file_agreement_signature, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @else
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="4. Draft Perjanjian yang telah ditandatangan" value="Tidak Ada" hidden />
                    @endif
                </div>
            </div>

            <hr>

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

            <hr>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Entitas :</h5>
                </div>
                <div class="col-sm-9">
                    @if ($data->file_deed_of_company)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Akta Perusahaan"
                            name="file_deed_of_company" type="download"
                            path="{{ route('download.drafting', [substr($data->file_deed_of_company, 9)]) }}">Unduh <i
                                class="fa fa-download"></i></x-file>
                    @else
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Akta Perusahaan" value="Tidak Ada"
                            readOnly />
                    @endif
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Nomor Induk Berusaha (NIB)*"
                        name="file_nib" type="download"
                        path="{{ route('download.drafting', [substr($data->file_nib, 9)]) }}">
                        Unduh <i class="fa fa-download"></i>
                    </x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Nomor Pokok Wajib Pajak (NPWP)*"
                        name="file_npwp" type="download"
                        path="{{ route('download.drafting', [substr($data->file_npwp, 9)]) }}">
                        Unduh <i class="fa fa-download"></i>
                    </x-file>
                    @if ($data->file_business_permit)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Izin Usaha"
                            name="file_business_permit" type="download"
                            path="{{ route('download.drafting', [substr($data->file_business_permit, 9)]) }}">Unduh <i
                                class="fa fa-download"></i></x-file>
                    @else
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Izin Usaha" value="Tidak Ada"
                            readOnly />
                    @endif
                    @if ($data->file_oss_location)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Izin Lokasi OSS"
                            name="file_oss_location" type="download"
                            path="{{ route('download.drafting', [substr($data->file_oss_location, 9)]) }}">Unduh <i
                                class="fa fa-download"></i></x-file>
                    @else
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Izin Lokasi OSS" value="Tidak Ada"
                            readOnly />
                    @endif
                    @if ($data->file_director_id_card)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. KTP Direksi"
                            name="file_director_id_card" type="download"
                            path="{{ route('download.drafting', [substr($data->file_director_id_card, 9)]) }}">Unduh <i
                                class="fa fa-download"></i></x-file>
                    @else
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="6. KTP Direksi" value="Tidak Ada"
                            readOnly />
                    @endif
                    @if ($data->file_sk)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Surat Kuasa" name="file_sk"
                            type="download" path="{{ route('download.drafting', [substr($data->file_sk, 9)]) }}">Unduh <i
                                class="fa fa-download"></i></x-file>
                    @else
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Surat Kuasa" value="Tidak Ada"
                            readOnly />
                    @endif
                    @if ($data->file_other)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Lain-lain" name="file_other"
                            type="download" path="{{ route('download.drafting', [substr($data->file_other, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @else
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Lain-lain" value="Tidak Ada"
                            readOnly />
                    @endif
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Internal Memo"
                        name="file_internal_memo" />
                </div>
            </div>

            <hr>

            <div class="col-sm-12 mb-3">
                <label for="">Catatan dari Contract Business</label>
                <textarea class="form-control" name="cb_note" id="" cols="30" rows="10" disabled>{{ $data->cb_note }}</textarea>
            </div>

            <div class="col-sm-12 mb-3">
                <label for="">Catatan untuk Contract Business</label>
                <textarea class="form-control" name="user_note" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-danger">Submit</button>
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
