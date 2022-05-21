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
                                    <button type="button" class="btn btn-success" disabled>APPROVED BY LEGAL CORPORATES</button>
                                @elseif ($row->status == 'RETURNED BY USER')
                                    <button type="button" class="btn btn-warning" disabled>RETURNED BY USER</button>
                                @elseif ($row->status == 'RETURNED BY LEGAL CORPORATES')
                                    <button type="button" class="btn btn-warning" disabled>RETURNED BY LEGAL CORPORATES</button>
                                @else
                                    <button type="button" class="btn btn-warning" disabled>Pengajuan Diproses</button>
                                @endif
                            </td>
                            <td>
                                @if ($row->status == 'APPROVED BY LEGAL CORPORATES')
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
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pengguna" name="name"
                        value="{{ $data->name }}" disabled />
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
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Bukti Kepemilikan" name="ownership_proof"
                        value="{{ $data->ownership_proof }}" disabled />

                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Bukti Kepemilikan"
                        name="ownership_number" value="{{ $data->ownership_number }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nilai/Harga Pembelian" prefix="Rp"
                        name="agreement_nominal" value="{{ $data->agreement_nominal }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Mekanisme Pembayaran" name="payment_type"
                        value="{{ $data->payment_type }}" disabled />

                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <x-textarea name="notaris_note" label="Data Notaris dan PPAT" disabled>{{ $data->notaris_note }}
                    </x-textarea>
                </div>
            </div>

            <hr>

            <div class="row mt-3">

                <div class="col-sm-12">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. RTRW/Advice Planning*"
                        name="file_advice_planning" type="download"
                        path="{{ route('download.landsell', [substr($data->file_advice_planning, 9)]) }}">Unduh <i
                            class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Appraisal KJPP*" name="file_kjjp"
                        type="download" path="{{ route('download.landsell', [substr($data->file_kjjp, 9)]) }}">Unduh <i
                            class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Business Case Analysis (BCA)*"
                        name="file_bca" type="download"
                        path="{{ route('download.landsell', [substr($data->file_bca, 9)]) }}">Unduh <i
                            class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Disposisi Management*"
                        name="file_disposition" type="download"
                        path="{{ route('download.landsell', [substr($data->file_disposition, 9)]) }}">Unduh <i
                            class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Bukti Kepemilikan (SHM/SHGB/AJB/Girik)*"
                        name="file_ownership_proof" type="download"
                        path="{{ route('download.landsell', [substr($data->file_ownership_proof, 9)]) }}">Unduh <i
                            class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. IMB*" name="file_imb" type="download"
                        path="{{ route('download.landsell', [substr($data->file_imb, 9)]) }}">Unduh <i
                            class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. SPPT & STTS PBB 10 tahun terakhir*"
                        name="file_sppt" type="download"
                        path="{{ route('download.landsell', [substr($data->file_sppt, 9)]) }}">Unduh <i
                            class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. IM Pengajuan Pembelian kepada Legal*"
                        name="file_im" type="download"
                        path="{{ route('download.landsell', [substr($data->file_im, 9)]) }}">Unduh <i
                            class="fa fa-download"></i></x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Gambar/Foto Objek Pembelian*"
                        name="file_purchase" type="download"
                        path="{{ route('download.landsell', [substr($data->file_purchase, 9)]) }}">Unduh <i
                            class="fa fa-download"></i></x-file>
                    <hr>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Identitas Pemilik/Penjual"
                        name="identity_type" value="{{ $data->identity_type }}" disabled />
                    @if ($data->identity_type == 'Peorangan/Pribadi')
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="i. KTP*" name="file_ktp"
                            type="download" path="{{ route('download.landsell', [substr($data->file_ktp, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ii. NPWP*" name="file_npwp"
                            type="download" path="{{ route('download.landsell', [substr($data->file_npwp, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iii. Buku/Akta Nikah"
                            name="file_marriage" type="download"
                            path="{{ route('download.landsell', [substr($data->file_marriage, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iv. KK*" name="file_kk"
                            type="download" path="{{ route('download.landsell', [substr($data->file_kk, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="v. Kartu Kepesertaan BPJSS*"
                            name="file_bpjs" type="download"
                            path="{{ route('download.landsell', [substr($data->file_bpjs, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <div class="mb-3 row d-flex" id=heir_note1>
                            <label class="col-sm-5" id="heir_note">
                                Dokumen di bawah wajib diisi apabila dokumen waris
                            </label>
                        </div>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="vi. Surat Keterangan Kematian" name="file_death_statement" type="download"
                            path="{{ route('download.landsell', [substr($data->file_death_statement, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="vii. Surat Keterangan Waris/Akta Waris" name="file_legal_heir" type="download"
                            path="{{ route('download.landsell', [substr($data->file_legal_heir, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="viii. KTP/Ahli Waris"
                            name="file_heir_id" type="download"
                            path="{{ route('download.landsell', [substr($data->file_heir_id, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ix. NPWP Ahli Waris"
                            name="file_heir_npwp" type="download"
                            path="{{ route('download.landsell', [substr($data->file_heir_npwp, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        {{-- {{  }} --}}
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="i. Akta Pendirian dan Perubahan Terakhir*" name="file_legal_corp" hidden />
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ii. SK Menkumham*"
                            name="file_sk" hidden />
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iii. KTP Direksi*"
                            name="file_director_id" hidden />
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iv. NPWP Badan Hukum*"
                            name="file_legal_npwp" hidden />
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="v. NIB*" name="file_nib"
                            hidden />
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="vi. Izin Usaha OSS*"
                            name="file_business_permit" hidden />
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="vii. PB-UMKU OSS*"
                            name="file_pb_umku" hidden />
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="viii. Izin Lokasi/KKPR OSS*"
                            name="file_location_permit" hidden />
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ix. Kartu Kepesertaan BPJS*"
                            name="file_npwp_card" hidden />
                    @else
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="i. KTP*" name="file_ktp"
                            hidden />
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ii. NPWP*" name="file_npwp"
                            hidden />
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iii. Buku/Akta Nikah"
                            name="file_marriage" hidden />
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iv. KK*" name="file_kk"
                            hidden />
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="v. Kartu Kepesertaan BPJSS*"
                            name="file_bpjs" hidden />
                        <div class="mb-3 row d-none" id=heir_note1>
                            <label class="col-sm-5" id="heir_note">
                                Dokumen di bawah wajib diisi apabila dokumen waris
                            </label>
                        </div>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="vi. Surat Keterangan Kematian" name="file_death_statement" hidden />
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="vii. Surat Keterangan Waris/Akta Waris" name="file_legal_heir" hidden />
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="viii. KTP/Ahli Waris"
                            name="file_heir_id" hidden />
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ix. NPWP Ahli Waris"
                            name="file_heir_npwp" hidden />
                        {{-- {{  }} --}}
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="i. Akta Pendirian dan Perubahan Terakhir*" name="file_legal_corp" type="download"
                            path="{{ route('download.landsell', [substr($data->file_legal_corp, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ii. SK Menkumham*"
                            name="file_sk" type="download"
                            path="{{ route('download.landsell', [substr($data->file_sk, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iii. KTP Direksi*"
                            name="file_director_id" type="download"
                            path="{{ route('download.landsell', [substr($data->file_director_id, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iv. NPWP Badan Hukum*"
                            name="file_legal_npwp" type="download"
                            path="{{ route('download.landsell', [substr($data->file_legal_npwp, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="v. NIB*" name="file_nib"
                            type="download" path="{{ route('download.landsell', [substr($data->file_nib, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="vi. Izin Usaha OSS*"
                            name="file_business_permit" type="download"
                            path="{{ route('download.landsell', [substr($data->file_business_permit, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="vii. PB-UMKU OSS*"
                            name="file_pb_umku" type="download"
                            path="{{ route('download.landsell', [substr($data->file_pb_umku, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="viii. Izin Lokasi/KKPR OSS*"
                            name="file_location_permit" type="download"
                            path="{{ route('download.landsell', [substr($data->file_location_permit, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                        <x-file type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ix. Kartu Kepesertaan BPJS*"
                            name="file_npwp_card" type="download"
                            path="{{ route('download.landsell', [substr($data->file_npwp_card, 9)]) }}">Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @endif
                </div>
            </div>

            <hr>

            <div class="col-sm-12 mb-3">
                <label for="">Catatan dari Legal Corporates</label>
                <textarea class="form-control" name="cb_note" id="" cols="30" rows="10" disabled>{{ $data->cb_note }}</textarea>
            </div>

            <div class="col-sm-12 mb-3">
                <label for="">Catatan untuk Legal Corporates</label>
                <textarea class="form-control" name="user_note" id="" cols="30" rows="10"></textarea>
            </div>

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
