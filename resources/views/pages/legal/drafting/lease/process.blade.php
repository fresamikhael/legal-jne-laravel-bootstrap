@extends('layouts.legal')

@section('title')
    Lease
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Lease</h2>
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
                            <td>{{ $row->status }}</td>
                            <td>
                                <a href="{{ route('legal.drafting.legal-lease-check', [$row->id]) }}"
                                    class="btn btn-primary">Lihat</a>
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
            action="{{ route('legal.drafting.legal-lease-process-post', $data->id) }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Landlord" name="landlord_name"
                        value="{{ $data->landlord_name }}" disabled />
                    @php
                        $province = DB::table('provinces')
                            ->where('id', $data->landlord_province)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Landlord"
                        value="{{ ucwords(strtolower($province->name)) }}" disabled />
                    @php
                        $regency = DB::table('regencies')
                            ->where('id', $data->landlord_regency)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Landlord"
                        value="{{ ucwords(strtolower($regency->name)) }}" disabled />
                    @php
                        $district = DB::table('districts')
                            ->where('id', $data->landlord_district)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Landlord"
                        value="{{ ucwords(strtolower($district->name)) }}" disabled />
                    @php
                        $village = DB::table('villages')
                            ->where('id', $data->landlord_village)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Landlord"
                        value="{{ ucwords(strtolower($village->name)) }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Landlord"
                        value="{{ $data->landlord_zip_code }}" disabled />
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Landlord" disabled>
                        {{ $data->landlord_address }}
                    </x-textarea>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis" value="{{ $data->type }}"
                        disabled />
                    @if ($data->type === 'Addendum')
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Addendum Ke" name="addendum_to"
                            value="{{ $data->addendum_to }}" hidden />
                    @endif
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Regional" value="{{ $data->regional }}"
                        disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nilai Sewa" prefix="Rp" name="rental_value"
                        value="{{ $data->rental_value }}" disabled />
                    @php
                        $province = DB::table('provinces')
                            ->where('id', $data->rental_object_province)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Objek Sewa"
                        value="{{ ucwords(strtolower($province->name)) }}" disabled />
                    @php
                        $regency = DB::table('regencies')
                            ->where('id', $data->rental_object_regency)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Objek Sewa"
                        value="{{ ucwords(strtolower($regency->name)) }}" disabled />
                    @php
                        $district = DB::table('districts')
                            ->where('id', $data->rental_object_district)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Objek Sewa"
                        value="{{ ucwords(strtolower($district->name)) }}" disabled />
                    @php
                        $village = DB::table('villages')
                            ->where('id', $data->rental_object_village)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Objek Sewa"
                        value="{{ ucwords(strtolower($village->name)) }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Objek Sewa"
                        value="{{ $data->rental_object_zip_code }}" disabled />
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Objek Sewa" disabled>
                        {{ $data->rental_object_address }}
                    </x-textarea>
                    {{-- <x-address label="Objek Sewa" name="rental_object" /> --}}
                </div>
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Landlord (Optional)"
                        name="optional_landlord_name" value="{{ $data->optional_landlord_name }}" disabled />
                    @php
                        $province = DB::table('provinces')
                            ->where('id', $data->optional_landlord_province)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Landlord (Optional)"
                        value="{{ ucwords(strtolower($province->name)) }}" disabled />
                    @php
                        $regency = DB::table('regencies')
                            ->where('id', $data->optional_landlord_regency)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Landlord (Optional)"
                        value="{{ ucwords(strtolower($regency->name)) }}" disabled />
                    @php
                        $district = DB::table('districts')
                            ->where('id', $data->optional_landlord_district)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Landlord (Optional)"
                        value="{{ ucwords(strtolower($district->name)) }}" disabled />
                    @php
                        $village = DB::table('villages')
                            ->where('id', $data->optional_landlord_village)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Landlord (Optional)"
                        value="{{ ucwords(strtolower($village->name)) }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Landlord (Optional)"
                        value="{{ $data->optional_landlord_zip_code }}" disabled />
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Landlord (Optional)" disabled>
                        {{ $data->optional_landlord_address }}
                    </x-textarea>
                    {{-- <x-address label="Landlord (Optional)" name="optional_landlord" /> --}}
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jangka Waktu" postfix="Hari"
                        name="period_of_time" value="{{ $data->period_of_time }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Jaminan" prefix="Rp"
                        name="guarantee_nominal" value="{{ $data->guarantee_nominal }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Cabang Utama" name="main_branch"
                        value="{{ $data->main_branch }}" disabled />
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

            <div class="col-sm-12">
                <x-input name="landlord_type" labelClass="col-sm-3" fieldClass="col-sm-9" label="Tipe Landlord"
                    value="{{ $data->landlord_type }}" disabled />
            </div>
            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Dokumen :</h5>
                </div>
                @if ($data->landlord_type == 'Perorangan')
                    <div class="col-sm-9">
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Fotocopy Disposisi Direksi"
                            name="file_director_disposition" type="download"
                            path="{{ route('download.drafting', [substr($data->file_director_disposition, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Asli Internal Memo Pengajuan Sewa"
                            name="file_internal_memo" type="download"
                            path="{{ route('download.drafting', [substr($data->file_internal_memo, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Asli Lease Drafting Application Form"
                            name="file_lease_application_form" type="download"
                            path="{{ route('download.drafting', [substr($data->file_lease_application_form, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Fotocopy Kartu Identitas Pemilik Hak"
                            name="file_right_owner_id_card" type="download"
                            path="{{ route('download.drafting', [substr($data->file_right_owner_id_card, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Copy NPWP" name="file_npwp_individual"
                            type="download"
                            path="{{ route('download.drafting', [substr($data->file_npwp_individual, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Copy Kartu Keluarga"
                            name="file_family_card" type="download"
                            path="{{ route('download.drafting', [substr($data->file_family_card, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Copy Akta Nikah"
                            name="file_marriage_certificate" type="download"
                            path="{{ route('download.drafting', [substr($data->file_marriage_certificate, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Copy Akta Kematian"
                            name="file_death_certificate" type="download"
                            path="{{ route('download.drafting', [substr($data->file_death_certificate, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Copy Surat Keterangan Ahli Waris"
                            name="file_heir_certificate" type="download"
                            path="{{ route('download.drafting', [substr($data->file_heir_certificate, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="10. Fotocopy Sertifikat/Girik"
                            name="file_certificate" type="download"
                            path="{{ route('download.drafting', [substr($data->file_certificate, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="11. Fotocopy IMB" name="file_imb"
                            type="download" path="{{ route('download.drafting', [substr($data->file_imb, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="12. Fotocopy SPPT & STTS (PBB)"
                            name="file_sppt" type="download"
                            path="{{ route('download.drafting', [substr($data->file_sppt, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="13. Fotocopy Kuitansi DP"
                            name="file_dp_receipt" type="download"
                            path="{{ route('download.drafting', [substr($data->file_dp_receipt, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="14. Fotocopy Kuitansi Pelunasan"
                            name="file_payment_imb" type="download"
                            path="{{ route('download.drafting', [substr($data->file_payment_imb, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="15. Asli Surat Kuasa"
                            name="file_procuration" type="download"
                            path="{{ route('download.drafting', [substr($data->file_procuration, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="16. Perjanjian Sewa Sebelumnya"
                            name="file_previous_agreement" type="download"
                            path="{{ route('download.drafting', [substr($data->file_previous_agreement, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="17. Surat Kuasa Direksi"
                            name="file_director_procuration" type="download"
                            path="{{ route('download.drafting', [substr($data->file_director_procuration, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="18. Form Pengajuan Sewa"
                            name="file_lease_application" type="download"
                            path="{{ route('download.drafting', [substr($data->file_lease_application, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="19. Form Kelayakan Sewa"
                            name="file_lease_eligibility" type="download"
                            path="{{ route('download.drafting', [substr($data->file_lease_eligibility, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="File Draft Perjanjian"
                            name="file_agreement_draft" type="download"
                            path="{{ route('download.drafting', [substr($data->file_agreement_draft, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-input type="file" name="file_agreement_signature" labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="File Perjanjian Ditandatangani" />
                    </div>
                @elseif ($data->landlord_type == 'Badan Hukum')
                    <div class="col-sm-9">
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Fotocopy Disposisi Direksi"
                            name="file_director_disposition" type="download"
                            path="{{ route('download.drafting', [substr($data->file_director_disposition, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Asli Internal Memo Pengajuan Sewa"
                            name="file_internal_memo" type="download"
                            path="{{ route('download.drafting', [substr($data->file_internal_memo, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Asli Lease Drafting Application Form"
                            name="file_lease_application_form" type="download"
                            path="{{ route('download.drafting', [substr($data->file_lease_application_form, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Fotocopy KTP Direksi"
                            name="file_director_id_card" type="download"
                            path="{{ route('download.drafting', [substr($data->file_director_id_card, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="5. Fotocopy Akta Pendirian dan Perubahan Terakhir" name="file_deed_of_incorporation"
                            type="download"
                            path="{{ route('download.drafting', [substr($data->file_deed_of_incorporation, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Fotocopy SK MENKUM-HAM"
                            name="file_sk_menkumham" type="download"
                            path="{{ route('download.drafting', [substr($data->file_sk_menkumham, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Fotocopy SIUP" name="file_siup"
                            type="download" path="{{ route('download.drafting', [substr($data->file_siup, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Fotocopy TDP" name="file_tdp"
                            type="download" path="{{ route('download.drafting', [substr($data->file_tdp, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Fotocopy NPWP"
                            name="file_npwp_legal_entity" type="download"
                            path="{{ route('download.drafting', [substr($data->file_npwp_legal_entity, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="10. Fotocopy SKD" name="file_skd"
                            type="download" path="{{ route('download.drafting', [substr($data->file_skd, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="11. Fotocopy SKDU" name="file_skdu"
                            type="download" path="{{ route('download.drafting', [substr($data->file_skdu, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="12. Fotocopy Sertifikat/Girik"
                            name="file_certificate" type="download"
                            path="{{ route('download.drafting', [substr($data->file_certificate, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="13. Fotocopy IMB" name="file_imb"
                            type="download" path="{{ route('download.drafting', [substr($data->file_imb, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="14. Fotocopy SPPT & STTS (PBB)"
                            name="file_sppt" type="download"
                            path="{{ route('download.drafting', [substr($data->file_sppt, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="15. Fotocopy Kuitansi DP"
                            name="file_dp_receipt" type="download"
                            path="{{ route('download.drafting', [substr($data->file_dp_receipt, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="16. Fotocopy Kuitansi Pelunasan"
                            name="file_payment_imb" type="download"
                            path="{{ route('download.drafting', [substr($data->file_payment_imb, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="17. Asli Surat Kuasa"
                            name="file_procuration" type="download"
                            path="{{ route('download.drafting', [substr($data->file_procuration, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="18. Perjanjian Sewa Sebelumnya"
                            name="file_previous_agreement" type="download"
                            path="{{ route('download.drafting', [substr($data->file_previous_agreement, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="19. Surat Kuasa Direksi"
                            name="file_director_procuration" type="download"
                            path="{{ route('download.drafting', [substr($data->file_director_procuration, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="20. Form Pengajuan Sewa"
                            name="file_lease_application" type="download"
                            path="{{ route('download.drafting', [substr($data->file_lease_application, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="21. Form Kelayakan Sewa"
                            name="file_lease_eligibility" type="download"
                            path="{{ route('download.drafting', [substr($data->file_lease_eligibility, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="File Draft Perjanjian"
                            name="file_agreement_draft" type="download"
                            path="{{ route('download.drafting', [substr($data->file_agreement_draft, 9)]) }}">
                            Unduh <i class="fa fa-download"></i>
                        </x-file>
                        <x-input type="file" name="file_agreement_signature" labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="File Perjanjian Ditandatangani" />
                    </div>
                @endif
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

            <div class="d-flex justify-content-end">
                <button type="submit" class="btn btn-danger">Submit</button>
            </div>
        </form>
    </x-base>
@endsection
