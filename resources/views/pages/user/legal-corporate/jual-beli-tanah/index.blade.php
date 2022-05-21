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

        <form method="POST" enctype="multipart/form-data" action="{{ route('legalcorporate.landsell-post') }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pengguna" name="name" />
                    <x-address label="" name="user" />

                </div>
                <div class="col-sm-6">
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Bukti Kepemilikan" name="ownership_proof">
                        <option value="Sertifikat Hak Milik">Sertifikat Hak Milik</option>
                        <option value="Sertifikat Hak Guna Bangunan">Sertifikat Hak Guna Bangunan</option>
                        <option value="Akta Jual Beli">Akta Jual Beli</option>
                        <option value="Girik">Girik</option>
                    </x-select>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Bukti Kepemilikan"
                        name="ownership_number" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nilai/Harga Pembelian" prefix="Rp"
                        name="agreement_nominal" />
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Mekanisme Pembayaran" name="payment_type">
                        <option value="Lunas">Lunas</option>
                        <option value="Bertahap">Bertahap</option>
                    </x-select>
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
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. RTRW/Advice Planning*"
                        name="file_advice_planning" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Appraisal KJPP*" name="file_kjjp" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Business Case Analysis (BCA)*"
                        name="file_bca" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Disposisi Management*"
                        name="file_disposition" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Bukti Kepemilikan (SHM/SHGB/AJB/Girik)*"
                        name="file_ownership_proof" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. IMB*" name="file_imb" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. SPPT & STTS PBB 10 tahun terakhir*"
                        name="file_sppt" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. IM Pengajuan Pembelian kepada Legal*"
                        name="file_im" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Gambar/Foto Objek Pembelian*"
                        name="file_purchase" />
                    <hr>
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Identitas Pemilik/Penjual"
                        name="identity_type">
                        <option value="Peorangan/Pribadi">Peorangan/Pribadi</option>
                        <option value="Badan Hukum">Badan Hukum</option>
                    </x-select>


                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="i. KTP*" name="file_ktp"
                        hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ii. NPWP*" name="file_npwp"
                        hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iii. Buku/Akta Nikah"
                        name="file_marriage" hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iv. KK*" name="file_kk"
                        hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="v. Kartu Kepesertaan BPJSS*"
                        name="file_bpjs" hidden />
                    <div class="mb-3 row d-none" id=heir_note1>
                        <label class="col-sm-5" id="heir_note">
                            Dokumen di bawah wajib diisi apabila dokumen waris
                        </label>
                    </div>
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="vi. Surat Keterangan Kematian"
                        name="file_death_statement" hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                        label="vii. Surat Keterangan Waris/Akta Waris" name="file_legal_heir" hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="viii. KTP/Ahli Waris"
                        name="file_heir_id" hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ix. NPWP Ahli Waris"
                        name="file_heir_npwp" hidden />

                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                        label="i. Akta Pendirian dan Perubahan Terakhir*" name="file_legal_corp" hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ii. SK Menkumham*"
                        name="file_sk" hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iii. KTP Direksi*"
                        name="file_director_id" hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="iv. NPWP Badan Hukum*"
                        name="file_legal_npwp" hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="v. NIB*" name="file_nib"
                        hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="vi. Izin Usaha OSS*"
                        name="file_business_permit" hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="vii. PB-UMKU OSS*"
                        name="file_pb_umku" hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="viii. Izin Lokasi/KKPR OSS*"
                        name="file_location_permit" hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="ix. Kartu Kepesertaan BPJS*"
                        name="file_npwp_card" hidden />
                    <script>
                        document.getElementById("identity_type").addEventListener("change", handleChange);

                        function handleChange() {
                            var x = document.getElementById("identity_type");
                            if (x.value === "Peorangan/Pribadi") {
                                document.getElementById("file_ktp1").classList.remove('d-none');
                                document.getElementById("file_ktp1").classList.add('d-flex');
                                document.getElementById("file_ktp").required = true;
                                document.getElementById("file_npwp1").classList.remove('d-none');
                                document.getElementById("file_npwp1").classList.add('d-flex');
                                document.getElementById("file_npwp").required = true;
                                document.getElementById("file_marriage1").classList.remove('d-none');
                                document.getElementById("file_marriage1").classList.add('d-flex');
                                document.getElementById("file_marriage").required = true;
                                document.getElementById("file_kk1").classList.remove('d-none');
                                document.getElementById("file_kk1").classList.add('d-flex');
                                document.getElementById("file_kk").required = true;
                                document.getElementById("file_bpjs1").classList.remove('d-none');
                                document.getElementById("file_bpjs1").classList.add('d-flex');
                                document.getElementById("file_bpjs").required = true;
                                document.getElementById("heir_note1").classList.remove('d-none');
                                document.getElementById("heir_note1").classList.add('d-flex');
                                document.getElementById("heir_note").required = true;
                                document.getElementById("file_death_statement1").classList.remove('d-none');
                                document.getElementById("file_death_statement1").classList.add('d-flex');
                                document.getElementById("file_death_statement").required = false;
                                document.getElementById("file_legal_heir1").classList.remove('d-none');
                                document.getElementById("file_legal_heir1").classList.add('d-flex');
                                document.getElementById("file_legal_heir").required = false;
                                document.getElementById("file_heir_id1").classList.remove('d-none');
                                document.getElementById("file_heir_id1").classList.add('d-flex');
                                document.getElementById("file_heir_id").required = false;
                                document.getElementById("file_heir_npwp1").classList.remove('d-none');
                                document.getElementById("file_heir_npwp1").classList.add('d-flex');
                                document.getElementById("file_heir_npwp").required = false;

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
                                document.getElementById("file_business_permit1").classList.remove('d-flex');
                                document.getElementById("file_business_permit1").classList.add('d-none');
                                document.getElementById("file_business_permit").required = false;
                                document.getElementById("file_pb_umku1").classList.remove('d-flex');
                                document.getElementById("file_pb_umku1").classList.add('d-none');
                                document.getElementById("file_pb_umku").required = false;
                                document.getElementById("file_location_permit1").classList.remove('d-flex');
                                document.getElementById("file_location_permit1").classList.add('d-none');
                                document.getElementById("file_location_permit").required = false;
                                document.getElementById("file_npwp_card1").classList.remove('d-flex');
                                document.getElementById("file_npwp_card1").classList.add('d-none');
                                document.getElementById("file_npwp_card").required = false;

                            } else {
                                document.getElementById("file_ktp1").classList.remove('d-flex');
                                document.getElementById("file_ktp1").classList.add('d-none');
                                document.getElementById("file_ktp").required = false;
                                document.getElementById("file_npwp1").classList.remove('d-flex');
                                document.getElementById("file_npwp1").classList.add('d-none');
                                document.getElementById("file_npwp").required = false;
                                document.getElementById("file_marriage1").classList.remove('d-flex');
                                document.getElementById("file_marriage1").classList.add('d-none');
                                document.getElementById("file_marriage").required = false;
                                document.getElementById("file_kk1").classList.remove('d-flex');
                                document.getElementById("file_kk1").classList.add('d-none');
                                document.getElementById("file_kk").required = false;
                                document.getElementById("file_bpjs1").classList.remove('d-flex');
                                document.getElementById("file_bpjs1").classList.add('d-none');
                                document.getElementById("file_bpjs").required = false;
                                document.getElementById("heir_note1").classList.remove('d-flex');
                                document.getElementById("heir_note1").classList.add('d-none');
                                document.getElementById("heir_note").required = true;
                                document.getElementById("file_death_statement1").classList.remove('d-flex');
                                document.getElementById("file_death_statement1").classList.add('d-none');
                                document.getElementById("file_death_statement").required = false;
                                document.getElementById("file_legal_heir1").classList.remove('d-flex');
                                document.getElementById("file_legal_heir1").classList.add('d-none');
                                document.getElementById("file_legal_heir").required = false;
                                document.getElementById("file_heir_id1").classList.remove('d-flex');
                                document.getElementById("file_heir_id1").classList.add('d-none');
                                document.getElementById("file_heir_id").required = false;
                                document.getElementById("file_heir_npwp1").classList.remove('d-flex');
                                document.getElementById("file_heir_npwp1").classList.add('d-none');
                                document.getElementById("file_heir_npwp").required = false;

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
                                document.getElementById("file_business_permit1").classList.remove('d-none');
                                document.getElementById("file_business_permit1").classList.add('d-flex');
                                document.getElementById("file_business_permit").required = true;
                                document.getElementById("file_pb_umku1").classList.remove('d-none');
                                document.getElementById("file_pb_umku1").classList.add('d-flex');
                                document.getElementById("file_pb_umku").required = true;
                                document.getElementById("file_location_permit1").classList.remove('d-none');
                                document.getElementById("file_location_permit1").classList.add('d-flex');
                                document.getElementById("file_location_permit").required = true;
                                document.getElementById("file_npwp_card1").classList.remove('d-none');
                                document.getElementById("file_npwp_card1").classList.add('d-flex');
                                document.getElementById("file_npwp_card").required = true;
                            }
                        }
                    </script>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
