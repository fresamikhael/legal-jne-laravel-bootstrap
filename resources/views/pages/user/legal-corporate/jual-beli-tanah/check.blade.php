@extends('layouts.user')

@section('title')
    Jual Beli Tanah & Bangunan
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Jual Beli Tanah & Bangunan</h2>
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
                            <td>
                                @if ($row->status == 'APPROVED BY LEGAL CORPORATES')
                                    <button type="button" class="btn btn-warning" disabled>APPROVED BY LEGAL
                                        CORPORATES</button>
                                @elseif ($row->status == 'RETURNED BY USER')
                                    <button type="button" class="btn btn-warning" disabled>RETURNED BY USER</button>
                                @elseif ($row->status == 'RETURNED BY LEGAL CORPORATES')
                                    <button type="button" class="btn btn-warning" disabled>RETURNED BY LEGAL
                                        CORPORATES</button>
                                @elseif ($row->status == 'APPROVED BY HEAD OF LEGAL DIVISION')
                                    <button type="button" class="btn btn-warning" disabled>APPROVED BY HEAD OF LEGAL
                                        DIVISION</button>
                                @elseif ($row->status == 'REJECTED BY HEAD OF LEGAL DIVISION')
                                    <button type="button" class="btn btn-danger" disabled>REJECTED BY HEAD OF LEGAL
                                        DIVISION</button>
                                @elseif ($row->status == 'APPROVED WITH SCANNED DOCUMENT SENT')
                                    <button type="button" class="btn btn-success" disabled>APPROVED WITH SCANNED DOCUMENT
                                        SENT</button>
                                @else
                                    <button type="button" class="btn btn-warning" disabled>Pengajuan Diproses</button>
                                @endif
                            </td>
                            <td>
                                @if ($row->status == 'APPROVED BY LEGAL CORPORATES')
                                    <a href="{{ route('legalcorporate.landsell-final', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @elseif ($row->status == 'APPROVED BY HEAD OF LEGAL DIVISION')
                                    <a href="{{ route('legalcorporate.landsell-final', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @elseif ($row->status == 'REJECTED BY HEAD OF LEGAL DIVISION')
                                    <a href="{{ route('legalcorporate.landsell-final', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @elseif ($row->status == 'APPROVED WITH SCANNED DOCUMENT SENT')
                                    <a href="{{ route('legalcorporate.landsell-final', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @else
                                    <a href="{{ route('legalcorporate.landsell-check', [$row->id]) }}"
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
            action="{{ route('legalcorporate.landsell-check-post', $data->id) }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Regional" name="regional"
                        value="{{ $data->regional }}" disabled />
                    @php
                        $province = DB::table('provinces')
                            ->where('id', $data->user_province)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi"
                        value="{{ ucwords(strtolower($province->name)) }}" disabled />
                    @php
                        $regency = DB::table('regencies')
                            ->where('id', $data->user_regency)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota"
                        value="{{ ucwords(strtolower($regency->name)) }}" disabled />
                    @php
                        $district = DB::table('districts')
                            ->where('id', $data->user_district)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan"
                        value="{{ ucwords(strtolower($district->name)) }}" disabled />
                    @php
                        $village = DB::table('villages')
                            ->where('id', $data->user_village)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan"
                        value="{{ ucwords(strtolower($village->name)) }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos"
                        value="{{ $data->user_zip_code }}" disabled />
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat" disabled>
                        {{ $data->user_address }}
                    </x-textarea>

                </div>
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Sertifikat" name="ownership_proof"
                        value="{{ $data->ownership_proof }}" disabled />

                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Bukti Kepemilikan"
                        name="ownership_number" value="{{ $data->ownership_number }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nilai/Harga Pembelian" prefix="Rp"
                        name="agreement_nominal" value="{{ $data->agreement_nominal }}" disabled />

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    @if ($data->notaris_note == null)
                        <x-textarea name="notaris_note" label="Data Notaris dan PPAT" disabled>-- --
                        </x-textarea>
                    @else
                        <x-textarea name="notaris_note" label="Data Notaris dan PPAT" disabled>{{ $data->notaris_note }}
                        </x-textarea>
                    @endif

                </div>
            </div>

            <hr>

            <div class="row mt-3">

                <div class="col-sm-12">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Sertifikat*" name="file_certificate"
                        type="download" path="{{ route('download.landsell', [substr($data->file_certificate, 9)]) }}">Unduh
                        <i class="fa fa-download"></i>
                    </x-file>
                    @if ($data->file_ippt == null)
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="2. IPPT/IPR" name="file_ippt"
                            value="-- --" disabled />
                    @else
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. IPPT/IPR" name="file_ippt"
                            type="download" path="{{ route('download.landsell', [substr($data->file_ippt, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @endif

                    @if ($data->file_imb == null)
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="3. IMB" name="file_imb"
                            value="-- --" disabled />
                    @else
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. IMB" name="file_imb"
                            type="download" path="{{ route('download.landsell', [substr($data->file_imb, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @endif
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. SPPT & STTS PBB*" name="file_sppt"
                        type="download" path="{{ route('download.landsell', [substr($data->file_sppt, 9)]) }}">Unduh <i
                            class="fa fa-download"></i></x-file>
                    @if ($data->file_mom == null)
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="5. MOM Pembelian" name="file_mom"
                            value="-- --" disabled />
                    @else
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. MOM Pembelian" name="file_mom"
                            type="download" path="{{ route('download.landsell', [substr($data->file_mom, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @endif
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Identitas Pemilik Sebelumnya*"
                        name="file_previous_owner_id" type="download"
                        path="{{ route('download.landsell', [substr($data->file_previous_owner_id, 9)]) }}">Unduh <i
                            class="fa fa-download"></i></x-file>
                    <hr>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Identitas Pemilik/Penjual"
                        name="identity_type" value="{{ $data->identity_type }}" disabled />
                    @if ($data->identity_type == 'Peorangan/Pribadi')
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="i. Internal Memo*"
                            name="file_internal_memo" type="download"
                            path="{{ route('download.landsell', [substr($data->file_internal_memo, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ii. KTP*"
                            name="file_ktp" type="download"
                            path="{{ route('download.landsell', [substr($data->file_ktp, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iii. NPWP*"
                            name="file_npwp" type="download"
                            path="{{ route('download.landsell', [substr($data->file_npwp, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        @if ($data->file_marriage == null)
                            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="iv. Buku/Akta Nikah"
                                name="file_marriage" value="-- --" disabled />
                        @else
                            <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="iv. Buku/Akta Nikah" name="file_marriage" type="download"
                                path="{{ route('download.landsell', [substr($data->file_marriage, 9)]) }}">Unduh
                                <i class="fa fa-download"></i>
                            </x-file>
                        @endif

                        @if ($data->file_marriage == null)
                            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="v. KTP Suami/Istri"
                                name="file_ktp_pasutri" value="-- --" disabled />
                        @else
                            <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="v. KTP Suami/Istri" name="file_ktp_pasutri" type="download"
                                path="{{ route('download.landsell', [substr($data->file_ktp_pasutri, 9)]) }}">Unduh
                                <i class="fa fa-download"></i>
                            </x-file>
                        @endif

                        @if ($data->file_marriage == null)
                            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="vi. Surat Kematian"
                                name="file_death_statement" value="-- --" disabled />
                        @else
                            <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="vi. Surat Kematian" name="file_death_statement" type="download"
                                path="{{ route('download.landsell', [substr($data->file_death_statement, 9)]) }}">Unduh
                                <i class="fa fa-download"></i>
                            </x-file>
                        @endif

                        @if ($data->file_marriage == null)
                            <x-input labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="vii. Surat Keterangan Waris/Akta Waris" name="file_legal_heir" value="-- --"
                                disabled />
                        @else
                            <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="vii. Surat Keterangan Waris/Akta Waris" name="file_legal_heir" type="download"
                                path="{{ route('download.landsell', [substr($data->file_legal_heir, 9)]) }}">Unduh
                                <i class="fa fa-download"></i>
                            </x-file>
                        @endif

                        @if ($data->file_marriage == null)
                            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="viii. KTP/Ahli Waris"
                                name="file_heir_id" value="-- --" disabled />
                        @else
                            <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="viii. KTP/Ahli Waris" name="file_heir_id" type="download"
                                path="{{ route('download.landsell', [substr($data->file_heir_id, 9)]) }}">Unduh
                                <i class="fa fa-download"></i>
                            </x-file>
                        @endif
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ix. KK*"
                            name="file_kk" type="download"
                            path="{{ route('download.landsell', [substr($data->file_kk, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        {{-- {{  }} --}}
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="i. Internal Memo Untuk Legal*" name="file_internal_memo_legal" hidden />
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="ii. Akta Pendirian dan Perubahan Terakhir*" name="file_legal_corp" hidden />
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iii. SK Menkumham*"
                            name="file_sk" hidden />
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iv. KTP Direksi*"
                            name="file_director_id" hidden />
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="v. NPWP*"
                            name="file_legal_npwp" hidden />
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="vi. NIB*"
                            name="file_nib" hidden />
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="vii. Surat Kuasa"
                            name="file_power_attorney" hidden />
                    @else
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="i. Internal Memo*"
                            name="file_internal_memo" hidden />
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ii. KTP*"
                            name="file_ktp" hidden />
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iii. NPWP*"
                            name="file_npwp" hidden />
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iv. Buku/Akta Nikah"
                            name="file_marriage" hidden />
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="v. KTP Suami/Istri"
                            name="file_ktp_pasutri" hidden />
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="vi. Surat Kematian"
                            name="file_death_statement" hidden />
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="vii. Surat Keterangan Waris/Akta Waris" name="file_legal_heir" hidden />
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="viii. KTP/Ahli Waris"
                            name="file_heir_id" hidden />
                        <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ix. KK*"
                            name="file_kk" hidden />
                        {{-- {{  }} --}}
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="i. Internal Memo Untuk Legal*" name="file_internal_memo_legal" type="download"
                            path="{{ route('download.landsell', [substr($data->file_internal_memo_legal, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="ii. Akta Pendirian dan Perubahan Terakhir*" name="file_legal_corp" type="download"
                            path="{{ route('download.landsell', [substr($data->file_legal_corp, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iii. SK Menkumham*"
                            name="file_sk" type="download"
                            path="{{ route('download.landsell', [substr($data->file_sk, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iv. KTP Direksi*"
                            name="file_director_id" type="download"
                            path="{{ route('download.landsell', [substr($data->file_director_id, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="v. NPWP*"
                            name="file_legal_npwp" type="download"
                            path="{{ route('download.landsell', [substr($data->file_legal_npwp, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="vi. NIB*"
                            name="file_nib" type="download"
                            path="{{ route('download.landsell', [substr($data->file_nib, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        @if ($data->file_power_attorney == null)
                            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="vii. Surat Kuasa"
                                name="file_power_attorney" value="-- --" disabled />
                        @else
                            <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="vii. Surat Kuasa"
                                name="file_power_attorney" type="download"
                                path="{{ route('download.landsell', [substr($data->file_power_attorney, 9)]) }}">Unduh
                                <i class="fa fa-download"></i>
                            </x-file>
                        @endif
                    @endif
                    <hr>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Foto Lokasi*" name="file_location"
                        type="download" path="{{ route('download.landsell', [substr($data->file_location, 9)]) }}">
                        Unduh
                        <i class="fa fa-download"></i>
                    </x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Titik Koordinat Lokasi*"
                        name="file_coordinate" type="download"
                        path="{{ route('download.landsell', [substr($data->file_coordinate, 9)]) }}">Unduh <i
                            class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Business Case Analysist*"
                        name="file_business_case" type="download"
                        path="{{ route('download.landsell', [substr($data->file_business_case, 9)]) }}">Unduh <i
                            class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="10. Hasil Appraisal KJPP*"
                        name="file_appraisal" type="download"
                        path="{{ route('download.landsell', [substr($data->file_appraisal, 9)]) }}">Unduh <i
                            class="fa fa-download"></i></x-file>
                </div>
            </div>

            <hr>

            <div class="col-sm-12 mb-3">
                <label for="">Catatan dari Legal Corporates</label>
                <textarea class="form-control h-100 mt-0" name="cb_note" id="" cols="30" rows="10" disabled>{{ $data->cb_note }}</textarea>
            </div>

            <div class="col-sm-12 mb-3">
                <label for="">Catatan untuk Legal Corporates</label>
                <textarea class="form-control h-100 mt-0" name="user_note" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
