@extends('layouts.legal')

@section('title')
    Vendor & Supplier
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Vendor & Supplier</h2>
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
                    @foreach ($table as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->id }}</td>
                            <td>
                                @if ($row->status == 'APPROVED BY CONTRACT BUSINESS')
                                    <button type="button" class="btn btn-success" disabled>APPROVED BY CONTRACT BUSINESS</button>
                                @elseif ($row->status == 'RETURNED BY USER')
                                    <button type="button" class="btn btn-warning" disabled>RETURNED BY USER</button>
                                @elseif ($row->status == 'RETURNED BY CONTRACT BUSINESS')
                                    <button type="button" class="btn btn-warning" disabled>RETURNED BY CONTRACT BUSINESS</button>
                                @elseif ($row->status == 'CONTRACT BUSINESS SEND AGREEMENT DRAFT')
                                    <button type="button" class="btn btn-success" disabled>CONTRACT BUSINESS SEND AGREEMENT
                                        DRAFT</button>
                                @elseif ($row->status == 'USER RETURNED AGREEMENT DRAFT')
                                    <button type="button" class="btn btn-warning" disabled>USER RETURNED AGREEMENT DRAFT</button>
                                @elseif ($row->status == 'USER APPROVED AGREEMENT DRAFT')
                                    <button type="button" class="btn btn-success" disabled>USER APPROVED AGREEMENT DRAFT</button>
                                @elseif ($row->status == 'USER SEND SIGNATURED FINAL AGREEMENT')
                                    <button type="button" class="btn btn-success" disabled>USER SEND SIGNATURED FINAL
                                        AGREEMENT</button>
                                @else
                                    <button type="button" class="btn btn-danger" disabled>Pengajuan Ditolak</button>
                                @endif
                            </td>
                            <td>
                                @if ($row->status == 'APPROVED BY CONTRACT BUSINESS')
                                    <a href="{{ route('legal.drafting.legal-vendor-update', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @elseif ($row->status == 'USER APPROVED AGREEMENT DRAFT')
                                    <a href="{{ route('legal.drafting.legal-vendor-process', [$row->id]) }}"
                                        class="btn btn-primary">Check</a>
                                @elseif ($row->status == 'USER RETURNED AGREEMENT DRAFT')
                                    <a href="{{ route('legal.drafting.legal-vendor-update', [$row->id]) }}"
                                        class="btn btn-primary">Check</a>
                                @elseif ($row->status == 'USER SEND SIGNATURED FINAL AGREEMENT')
                                    <a href="{{ route('legal.drafting.legal-vendor-final', [$row->id]) }}"
                                        class="btn btn-primary">Check</a>
                                @else
                                    <a href="{{ route('legal.drafting.legal-vendor-check', [$row->id]) }}"
                                        class="btn btn-danger">Update</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endslot
            </x-modal-history>
        </div>

        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif

        <form method="POST" enctype="multipart/form-data"
            action="{{ route('legal.drafting.legal-vendor-check-post', $data->id) }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Pihak Pertama" name="party_name"
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
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Perjanjian" prefix="Rp"
                        name="agreement_nominal" value="{{ $data->agreement_nominal }}" disabled />
                    <x-input type="text" labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Vendor"
                        value="{{ $data->vendor_type }}" disabled />
                    @if ($data->vendor_type == 'Others')
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Isi Form"
                            name="file_form_vendor" hidden />
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Lampiran Pendukung"
                            name="file_supporting_attachment" hidden />
                    @endif
                </div>
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Pihak Pertama (Opsional)" name="party_name"
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
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis" value="{{ $data->type }}"
                        disabled />
                    @if ($data->type === 'Addendum')
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Addendum Ke" name="addendum_to"
                            value="{{ $data->addendum_to }}" hidden />
                    @endif
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jaminan" value="{{ $data->guarantee }}"
                        disabled />
                    @if ($data->guarantee == 'Bank Garansi')
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Isi Bank Garansi" name="bank_guarantee"
                            value="{{ $data->bank_guarantee }}" disabled />
                    @elseif($data->guarantee == 'Deposit')
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Isi Deposit" name="deposit_guarantee"
                            value="{{ $data->deposit_guarantee }}" disabled />
                    @endif
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jangka Waktu Retensi" postfix="Bulan"
                        name="relation_period" value="{{ $data->relation_period }}" disabled />
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
                    @if ($data->file_internal_memo)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. File Internal Memo"
                            name="file_internal_memo" type="download"
                            path="{{ route('download.drafting', [substr($data->file_internal_memo, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
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
                    <h5>Dokumen :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Penawaran Vendor" name="file_vendor_offer"
                        type="download" path="{{ route('download.drafting', [substr($data->file_vendor_offer, 9)]) }}">
                        Unduh
                        <i class="fa fa-download"></i>
                    </x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. MOM Kesepakatan Para Pihak"
                        name="file_mom" type="download"
                        path="{{ route('download.drafting', [substr($data->file_mom, 9)]) }}">
                        Unduh
                        <i class="fa fa-download"></i>
                    </x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Disposisi" name="file_dispotition"
                        type="download" path="{{ route('download.drafting', [substr($data->file_dispotition, 9)]) }}">
                        Unduh
                        <i class="fa fa-download"></i>
                    </x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Draft Perjanjian dalam bentuk word"
                        name="file_agreement_draft" type="download"
                        path="{{ route('download.drafting', [substr($data->file_agreement_draft, 9)]) }}">
                        Unduh
                        <i class="fa fa-download"></i>
                    </x-file>
                </div>
            </div>

            <hr>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Kontak Sales/PIC :</h5>
                </div>
                <div class="col-sm-9">
                    <x-input value="{{ $data->sales_name }}" labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama"
                        name="sales_name" readOnly />
                    <x-input value="{{ $data->sales_email }}" labelClass="col-sm-5" fieldClass="col-sm-7" label="Email"
                        name="sales_email" readOnly />
                    <x-input value="{{ $data->sales_phone }}" labelClass="col-sm-5" fieldClass="col-sm-7"
                        label="No Telepon" name="sales_phone" readOnly />
                    <x-input value="{{ $data->sales_department }}" labelClass="col-sm-5" fieldClass="col-sm-7"
                        label="Departemen/Cabang" name="sales_department" readOnly />
                </div>
            </div>

            <div class="col-sm-12 mb-3">
                <label for="">Catatan dari Contract Business</label>
                <textarea class="form-control h-100 mt-0" name="cb_note" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="col-sm-12 mb-3">
                <label for="">Catatan untuk Contract Business</label>
                <textarea class="form-control h-100 mt-0" name="user_note" id="" cols="30" rows="10"
                    disabled>{{ $data->user_note }}</textarea>
            </div>

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Approve" value="Approve" buttonClass="btn-primary me-3" />
                <x-button type="submit" name="Reject" value="Reject" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
