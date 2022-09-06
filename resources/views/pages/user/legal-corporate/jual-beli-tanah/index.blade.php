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

        <form method="POST" enctype="multipart/form-data" action="{{ route('legalcorporate.landsell-post') }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Regional" name="regional" />
                    <x-address label="" name="user" />

                </div>
                <div class="col-sm-6">
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Sertifikat" name="ownership_proof">
                        <option value="Hak Guna Bangunan">Hak Guna Bangunan</option>
                        <option value="Hak Guna Usaha">Hak Guna Usaha</option>
                        <option value="Hak Milik">Hak Milik</option>
                    </x-select>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Bukti Kepemilikan"
                        name="ownership_number" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Harga Obyek Jual-Beli" prefix="Rp"
                        name="agreement_nominal" />
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <x-textarea name="notaris_note" label="Data Notaris dan PPAT" />
                </div>
            </div>

            <hr>

            <div class="row mt-3">

                <div class="col-sm-12">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Sertifikat*" name="file_certificate" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. IPPT/IPR" name="file_ippt" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. IMB" name="file_imb" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. SPPT & STTS PBB*" name="file_sppt" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. MOM Pembelian" name="file_mom" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Identitas Pemilik Sebelumnya*"
                        name="file_previous_owner_id" />
                    <hr>
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Identitas Pemilik/Penjual"
                        name="identity_type">
                        <option value="Peorangan/Pribadi">Peorangan/Pribadi</option>
                        <option value="Badan Hukum">Badan Hukum</option>
                    </x-select>

                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="i. Internal Memo*"
                        name="file_internal_memo" hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ii. KTP*" name="file_ktp"
                        hidden />
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
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ix. KK*" name="file_kk"
                        hidden />

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
                    <script>
                        document.getElementById("identity_type").addEventListener("change", handleChange);

                        function handleChange() {
                            var x = document.getElementById("identity_type");
                            if (x.value === "Peorangan/Pribadi") {
                                document.getElementById("file_internal_memo1").classList.remove('d-none');
                                document.getElementById("file_internal_memo1").classList.add('d-flex');
                                document.getElementById("file_internal_memo").required = true;
                                document.getElementById("file_ktp1").classList.remove('d-none');
                                document.getElementById("file_ktp1").classList.add('d-flex');
                                document.getElementById("file_ktp").required = true;
                                document.getElementById("file_npwp1").classList.remove('d-none');
                                document.getElementById("file_npwp1").classList.add('d-flex');
                                document.getElementById("file_npwp").required = true;
                                document.getElementById("file_marriage1").classList.remove('d-none');
                                document.getElementById("file_marriage1").classList.add('d-flex');
                                document.getElementById("file_marriage").required = true;
                                document.getElementById("file_ktp_pasutri1").classList.remove('d-none');
                                document.getElementById("file_ktp_pasutri1").classList.add('d-flex');
                                document.getElementById("file_ktp_pasutri").required = true;
                                document.getElementById("file_death_statement1").classList.remove('d-none');
                                document.getElementById("file_death_statement1").classList.add('d-flex');
                                document.getElementById("file_death_statement").required = false;
                                document.getElementById("file_legal_heir1").classList.remove('d-none');
                                document.getElementById("file_legal_heir1").classList.add('d-flex');
                                document.getElementById("file_legal_heir").required = false;
                                document.getElementById("file_heir_id1").classList.remove('d-none');
                                document.getElementById("file_heir_id1").classList.add('d-flex');
                                document.getElementById("file_heir_id").required = false;
                                document.getElementById("file_kk1").classList.remove('d-none');
                                document.getElementById("file_kk1").classList.add('d-flex');
                                document.getElementById("file_kk").required = false;

                                document.getElementById("file_internal_memo_legal1").classList.remove('d-flex');
                                document.getElementById("file_internal_memo_legal1").classList.add('d-none');
                                document.getElementById("file_internal_memo_legal").required = false;
                                document.getElementById("file_legal_corp1").classList.remove('d-flex');
                                document.getElementById("file_legal_corp1").classList.add('d-none');
                                document.getElementById("file_legal_corp").required = false;
                                document.getElementById("file_sk1").classList.remove('d-flex');
                                document.getElementById("file_sk1").classList.add('d-none');
                                document.getElementById("file_sk").required = false;
                                document.getElementById("file_director_id1").classList.remove('d-flex');
                                document.getElementById("file_director_id1").classList.add('d-none');
                                document.getElementById("file_director_id").required = false;
                                document.getElementById("file_legal_npwp1").classList.remove('d-flex');
                                document.getElementById("file_legal_npwp1").classList.add('d-none');
                                document.getElementById("file_legal_npwp").required = false;
                                document.getElementById("file_nib1").classList.remove('d-flex');
                                document.getElementById("file_nib1").classList.add('d-none');
                                document.getElementById("file_nib").required = false;
                                document.getElementById("file_power_attorney1").classList.remove('d-flex');
                                document.getElementById("file_power_attorney1").classList.add('d-none');
                                document.getElementById("file_power_attorney").required = false;

                            } else {
                                document.getElementById("file_internal_memo1").classList.remove('d-flex');
                                document.getElementById("file_internal_memo1").classList.add('d-none');
                                document.getElementById("file_internal_memo").required = false;
                                document.getElementById("file_ktp1").classList.remove('d-flex');
                                document.getElementById("file_ktp1").classList.add('d-none');
                                document.getElementById("file_ktp").required = false;
                                document.getElementById("file_npwp1").classList.remove('d-flex');
                                document.getElementById("file_npwp1").classList.add('d-none');
                                document.getElementById("file_npwp").required = false;
                                document.getElementById("file_marriage1").classList.remove('d-flex');
                                document.getElementById("file_marriage1").classList.add('d-none');
                                document.getElementById("file_marriage").required = false;
                                document.getElementById("file_ktp_pasutri1").classList.remove('d-flex');
                                document.getElementById("file_ktp_pasutri1").classList.add('d-none');
                                document.getElementById("file_ktp_pasutri").required = false;
                                document.getElementById("file_death_statement1").classList.remove('d-flex');
                                document.getElementById("file_death_statement1").classList.add('d-none');
                                document.getElementById("file_death_statement").required = false;
                                document.getElementById("file_legal_heir1").classList.remove('d-flex');
                                document.getElementById("file_legal_heir1").classList.add('d-none');
                                document.getElementById("file_legal_heir").required = false;
                                document.getElementById("file_heir_id1").classList.remove('d-flex');
                                document.getElementById("file_heir_id1").classList.add('d-none');
                                document.getElementById("file_heir_id").required = false;
                                document.getElementById("file_kk1").classList.remove('d-flex');
                                document.getElementById("file_kk1").classList.add('d-none');
                                document.getElementById("file_kk").required = false;

                                document.getElementById("file_internal_memo_legal1").classList.remove('d-none');
                                document.getElementById("file_internal_memo_legal1").classList.add('d-flex');
                                document.getElementById("file_internal_memo_legal").required = true;
                                document.getElementById("file_legal_corp1").classList.remove('d-none');
                                document.getElementById("file_legal_corp1").classList.add('d-flex');
                                document.getElementById("file_legal_corp").required = true;
                                document.getElementById("file_sk1").classList.remove('d-none');
                                document.getElementById("file_sk1").classList.add('d-flex');
                                document.getElementById("file_sk").required = true;
                                document.getElementById("file_director_id1").classList.remove('d-none');
                                document.getElementById("file_director_id1").classList.add('d-flex');
                                document.getElementById("file_director_id").required = true;
                                document.getElementById("file_legal_npwp1").classList.remove('d-none');
                                document.getElementById("file_legal_npwp1").classList.add('d-flex');
                                document.getElementById("file_legal_npwp").required = true;
                                document.getElementById("file_nib1").classList.remove('d-none');
                                document.getElementById("file_nib1").classList.add('d-flex');
                                document.getElementById("file_nib").required = true;
                                document.getElementById("file_power_attorney1").classList.remove('d-none');
                                document.getElementById("file_power_attorney1").classList.add('d-flex');
                                document.getElementById("file_power_attorney").required = true;
                            }
                        }
                    </script>
                    <hr>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Foto Lokasi*" name="file_location" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Titik Koordinat Lokasi*"
                        name="file_coordinate" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Business Case Analysist*"
                        name="file_business_case" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="10. Hasil Appraisal KJPP*"
                        name="file_appraisal" />
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
