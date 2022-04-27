@extends('layouts.user')

@section('title')
    Vendor & Supplier
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Vendor & Supplier</h2>
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
                                @if ($row->status == 'APPROVED BY CONTRACT BUSINESS')
                                    <button type="button" class="btn btn-success" disabled>APPROVED BY CONTRACT BUSINESS</button>
                                @elseif ($row->status == 'RETURNED BY USER')
                                    <button type="button" class="btn btn-warning" disabled>RETURNED BY USER</button>
                                @elseif ($row->status == 'RETURNED BY CONTRACT BUSINESS')
                                    <button type="button" class="btn btn-warning" disabled>RETURNED BY CONTRACT BUSINESS</button>
                                @elseif ($row->status == 'CONTRACT BUSINESS SEND AGREEMENT DRAFT')
                                    <button type="button" class="btn btn-success" disabled>CONTRACT BUSINESS SEND AGREEMENT
                                        DRAFT</button>
                                @elseif ($row->status == 'CONTRACT BUSINESS SEND AGREEMENT SIGNATURE')
                                    <button type="button" class="btn btn-success" disabled>CONTRACT BUSINESS SEND AGREEMENT
                                        SIGNATURE</button>
                                @else
                                    <button type="button" class="btn btn-danger" disabled>Pengajuan Ditolak</button>
                                @endif
                            </td>
                            <td>
                                @if ($row->status == 'APPROVED BY CONTRACT BUSINESS')
                                    <a href="{{ route('drafting.vendor-update', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @elseif ($row->status == 'CONTRACT BUSINESS SEND AGREEMENT DRAFT')
                                    <a href="{{ route('drafting.vendor-update', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @elseif ($row->status == 'CONTRACT BUSINESS SEND AGREEMENT SIGNATURE')
                                    <a href="{{ route('drafting.vendor-process', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @else
                                    <a href="{{ route('drafting.vendor-check', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
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

        <form method="POST" enctype="multipart/form-data" action="{{ route('drafting.vendor-post') }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Pihak Pertama" name="party_name" />
                    <x-address label="Pihak" name="party" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Perjanjian" prefix="Rp"
                        name="agreement_nominal" />
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Vendor" name="vendor_type">
                        <option value="Contractor Building">Contractor Building</option>
                        <option value="Jasa Perizinan">Jasa Perizinan</option>
                        <option value="Kendaraan">Kendaraan</option>
                        <option value="Peralatan">Peralatan</option>
                        <option value="KSO">KSO</option>
                        <option value="Outsourcing">Outsourcing</option>
                        <option value="Sistem IT">Sistem IT</option>
                        <option value="Others">Others</option>
                    </x-select>
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Isi Form"
                        name="file_form_vendor" hidden />
                    <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Lampiran Pendukung"
                        name="file_supporting_attachment" hidden />
                    <script>
                        document.getElementById("vendor_type").addEventListener("change", handleChange);

                        function handleChange() {
                            var x = document.getElementById("vendor_type");
                            if (x.value === "Others") {
                                document.getElementById("file_form_vendor1").classList.remove('d-none');
                                document.getElementById("file_form_vendor1").classList.add('d-flex');
                                document.getElementById("file_form_vendor").required = true;
                                document.getElementById("file_supporting_attachment1").classList.remove('d-none');
                                document.getElementById("file_form_vendor1").classList.add('d-flex');
                                document.getElementById("file_supporting_attachment").required = true;
                            } else {
                                document.getElementById("file_form_vendor1").classList.remove('d-flex');
                                document.getElementById("file_form_vendor1").classList.add('d-none');
                                document.getElementById("file_form_vendor").required = false;
                                document.getElementById("file_supporting_attachment1").classList.remove('d-flex');
                                document.getElementById("file_supporting_attachment1").classList.add('d-none');
                                document.getElementById("file_supporting_attachment").required = false;
                            }
                        }
                    </script>
                </div>
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pihak (Optional)"
                        name="optional_party_name" />
                    <x-address label="Pihak (Optional)" name="optional_party" />
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis" name="type">
                        <option value="Baru">Baru</option>
                        <option value="Perpanjangan">Perpanjangan</option>
                        <option value="Addendum">Addendum</option>
                        <option value="Pembaharuan">Pembaharuan</option>
                    </x-select>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Addendum Ke" name="addendum_to" hidden />
                    <script>
                        document.getElementById("type").addEventListener("change", handleChange);

                        function handleChange() {
                            var x = document.getElementById("type");
                            if (x.value === "Addendum") {
                                document.getElementById("addendum_to1").classList.remove('d-none');
                                document.getElementById("addendum_to1").classList.add('d-flex');
                                document.getElementById("addendum_to").required = true;
                            } else {
                                document.getElementById("addendum_to1").classList.remove('d-flex');
                                document.getElementById("addendum_to1").classList.add('d-none');
                                document.getElementById("addendum_to").required = false;
                            }
                        }
                    </script>
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jaminan" name="guarantee">
                        <option value="Bank Garansi">Bank Garansi</option>
                        <option value="Deposit">Deposit</option>
                        <option value="Tidak Ada">Tidak Ada</option>
                    </x-select>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Isi Bank Garansi" name="bank_guarantee"
                        hidden />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Isi Deposit" name="deposit_guarantee"
                        hidden />
                    <script>
                        document.getElementById("guarantee").addEventListener("change", handleChange);

                        function handleChange() {
                            var x = document.getElementById("guarantee");
                            if (x.value === "Bank Garansi") {
                                document.getElementById("bank_guarantee1").classList.remove('d-none');
                                document.getElementById("bank_guarantee1").classList.add('d-flex');
                                document.getElementById("bank_guarantee").required = true;
                            } else {
                                document.getElementById("bank_guarantee1").classList.remove('d-flex');
                                document.getElementById("bank_guarantee1").classList.add('d-none');
                                document.getElementById("bank_guarantee").required = false;
                            }

                            if (x.value === "Deposit") {
                                document.getElementById("deposit_guarantee1").classList.remove('d-none');
                                document.getElementById("deposit_guarantee1").classList.add('d-flex');
                                document.getElementById("deposit_guarantee").required = true;
                            } else {
                                document.getElementById("deposit_guarantee1").classList.remove('d-flex');
                                document.getElementById("deposit_guarantee1").classList.add('d-none');
                                document.getElementById("deposit_guarantee").required = false;
                            }
                        }
                    </script>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jangka Waktu Retensi" postfix="Bulan"
                        name="relation_period" />
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <x-textarea name="other_point"
                        label="Poin-Poin Khusus Lainnya Yang Dicantumkan Dalam Perjanjian Sesuai Kesepakatan Para Pihak:" />
                </div>
            </div>

            <hr>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Entitas :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Akta Perusahaan*"
                        name="file_deed_of_company" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Nomor Induk Berusaha (NIB)*"
                        name="file_nib" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Nomor Pokok Wajib Pajak (NPWP)*"
                        name="file_npwp" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Izin Usaha*"
                        name="file_business_permit" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Izin Lokasi OSS*"
                        name="file_oss_location" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. KTP Direksi*"
                        name="file_director_id_card" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Surat Kuasa" name="file_sk" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Lain-lain" name="file_other" />
                </div>
            </div>

            <hr>

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

            <hr>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Dokumen :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Penawaran Vendor"
                        name="file_vendor_offer" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. MOM Kesepakatan Para Pihak"
                        name="file_mom" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Disposisi" name="file_dispotition" />
                </div>
            </div>
            {{-- <hr>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Entitas Customer :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Akta & SK Kemenkumham"
                        name="file_sk_menkumham" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Nomor Induk Berusaha (NIB)"
                        name="file_nib2" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Nomor Pokok Wajib Pajak (NPWP)"
                        name="file_npwp2" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Izin Usaha & Izin Lokasi OSS"
                        name="file_business_permit2" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. KTP Direksi"
                        name="file_director_id_card2" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Lain-lain" name="file_other2" />
                </div>
            </div> --}}

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
