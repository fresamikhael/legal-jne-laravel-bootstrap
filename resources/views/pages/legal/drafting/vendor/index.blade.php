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
                    @foreach ($data as $row)
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
                                    <button type="button" class="btn btn-warning" disabled>USER RETURNED AGREEMENT
                                        DRAFT</button>
                                @elseif ($row->status == 'USER APPROVED AGREEMENT DRAFT')
                                    <button type="button" class="btn btn-success" disabled>USER APPROVED AGREEMENT
                                        DRAFT</button>
                                @elseif ($row->status == 'USER SEND SIGNATURED FINAL AGREEMENT')
                                    <button type="button" class="btn btn-success" disabled>USER SEND SIGNATURED FINAL
                                        AGREEMENT</button>
                                @else
                                    <button type="button" class="btn btn-danger" disabled>PENDING</button>
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
                                        class="btn btn-danger">Check</a>
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

        <form method="POST" enctype="multipart/form-data" action="{{ route('legal.drafting.legal-vendor-post') }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12">
                    <table class="table table-borderless" id="dynamicTable">
                        <tr>
                            <td>
                                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama" name="party_name" />
                                <x-address label="" name="party" />
                                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Perjanjian"
                                    prefix="Rp" name="agreement_nominal" />
                                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Vendor"
                                    name="vendor_type">
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
                                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                    label="Lampiran Pendukung" name="file_supporting_attachment" hidden />
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
                                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis" name="type">
                                    <option value="Baru">Baru</option>
                                    <option value="Perpanjangan">Perpanjangan</option>
                                    <option value="Addendum">Addendum</option>
                                    <option value="Pembaharuan">Pembaharuan</option>
                                </x-select>
                                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Addendum Ke" name="addendum_to"
                                    hidden />
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
                                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Isi Bank Garansi"
                                    name="bank_guarantee" hidden />
                                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Isi Deposit"
                                    name="deposit_guarantee" hidden />
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
                                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jangka Waktu Retensi"
                                    postfix="Bulan" name="relation_period" />
                            </td>
                            <td>
                                <div class="d-flex justify-content-center my-2">
                                    {{-- <button type="button" class="btn btn-danger me-2 remove-tr" id="remove">Remove</button> --}}
                                    <button type="button" name="add" id="add"
                                        class="btn btn-success ">+</button>
                                </div>
                            </td>
                        </tr>
                    </table>

                </div>
                {{-- <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama  (Optional)"
                        name="optional_party_name" />
                    <x-address label=" (Optional)" name="optional_party" />

                </div> --}}
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
                        name="file_deed_of_company" required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Nomor Induk Berusaha (NIB)*"
                        name="file_nib" required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Nomor Pokok Wajib Pajak (NPWP)*"
                        name="file_npwp" required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Izin Usaha*"
                        name="file_business_permit" required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Izin Lokasi OSS*"
                        name="file_oss_location" required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. KTP Direksi*"
                        name="file_director_id_card" required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Surat Kuasa" name="file_sk" option />
                    <table class="table table-borderless" id="others">
                        <tr>
                            <td>
                                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Dokumen Lainnya"
                                    name="file_other" />
                            </td>
                            <td>
                                <div class="d-flex justify-content-center my-2">
                                    {{-- <button type="button" class="btn btn-danger me-2 remove-tr" id="remove">Remove</button> --}}
                                    <button type="button" name="tambah" id="tambah"
                                        class="btn btn-success ">+</button>
                                </div>
                            </td>
                        </tr>
                    </table>
                </div>
            </div>

            <hr>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Korespondensi Vendor/Supplier :</h5>
                </div>
                <div class="col-sm-9">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama " name="correspondence_name" />
                    <x-address label="" name="correspondence" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="No Telepon "
                        name="correspondence_phone" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Email " name="correspondence_email" />
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

            <hr>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Kontak Sales/PIC :</h5>
                </div>
                <div class="col-sm-9">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama" name="sales_name" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Email" name="sales_email" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="No Telepon" name="sales_phone" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Departemen/Cabang"
                        name="sales_department" />
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
        var i = 0;

        $("#add").click(function() {

            ++i;


            $("#dynamicTable").append($("#test").html());
        });

        $("#tambah").click(function() {

            ++i;


            $("#others").append($("#other").html());
        });
        // var form_tags = document.getElementById('form')
        // $(document).on('click', '#remove', function() {
        //     // $(this).parents('tr').remove();
        //     if (form_tags.length > 2) {
        //         form_tags.removeChild();
        //     }
        // });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>

    <script type="text/html" id="test">
        <tr>
            <td>
                <div class="d-flex justify-content-center ">
                    <div class="col-sm-12">
                        <x-input name="party_name" type="text" labelClass="col-sm-5" fieldClass="col-sm-7"
                                    label="Nama (Opsional)" />
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama " name="user_id" hidden />
                    </div>
                </div>
                <div class="d-flex justify-content-center ">
                    <div class="col-sm-12">
                        <x-input label="Provinsi" name="province" labelClass="col-sm-5" fieldClass="col-sm-7"
                                    required />

                    </div>
                </div>
                <div class="d-flex justify-content-center ">
                    <div class="col-sm-12">

                                <x-input label="Kab/Kota" name="regency" labelClass="col-sm-5" fieldClass="col-sm-7"
                                    required />

                    </div>
                </div>
                <div class="d-flex justify-content-center ">
                    <div class="col-sm-12">

                                <x-input label="Kecamatan" name="district" labelClass="col-sm-5" fieldClass="col-sm-7"
                                    required />

                    </div>
                </div>
                <div class="d-flex justify-content-center ">
                    <div class="col-sm-12">

                                <x-input label="Desa/Kel" name="village" labelClass="col-sm-5" fieldClass="col-sm-7"
                                    required />
                    </div>
                </div>
                <div class="d-flex justify-content-center ">
                    <div class="col-sm-12">

                                <x-input label="Jalan" name="address" labelClass="col-sm-5" fieldClass="col-sm-7" required />
                    </div>
                </div>
                <div class="d-flex justify-content-center ">
                    <div class="col-sm-12">
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Perjanjian"
                                    prefix="Rp" name="agreement_nominal" />

                    </div>
                </div>
                <div class="d-flex justify-content-center ">
                    <div class="col-sm-12">
                        <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Vendor"
                                    name="vendor_type">
                                    <option value="Contractor Building">Contractor Building</option>
                                    <option value="Jasa Perizinan">Jasa Perizinan</option>
                                    <option value="Kendaraan">Kendaraan</option>
                                    <option value="Peralatan">Peralatan</option>
                                    <option value="KSO">KSO</option>
                                    <option value="Outsourcing">Outsourcing</option>
                                    <option value="Sistem IT">Sistem IT</option>
                                    <option value="Others">Others</option>
                                </x-select>


    </div>
    </div>

    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">
            <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis" name="type">
                <option value="Baru">Baru</option>
                <option value="Perpanjangan">Perpanjangan</option>
                <option value="Addendum">Addendum</option>
                <option value="Pembaharuan">Pembaharuan</option>
            </x-select>
        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">
            <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jaminan" name="guarantee">
                                    <option value="Bank Garansi">Bank Garansi</option>
                                    <option value="Deposit">Deposit</option>
                                    <option value="Tidak Ada">Tidak Ada</option>
                                </x-select>
        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">
            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jangka Waktu Retensi" postfix="Bulan"
                name="relation_period" />
        </div>
    </div>
    </td>
    <td>
        <div class="d-flex justify-content-center my-2">
            <button type="button" class="btn btn-danger me-2 remove-tr" id="remove">-</button>
        </div>
    </td>
    </tr>
    </script>

    <script type="text/html" id="other">
        <tr>
            <td>
                <div class="d-flex justify-content-center ">
                    <div class="col-sm-12">
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Dokumen Lainnya"
                                    name="file_other" />
                    </div>
                </div>
            </td>
            <td>
                <div class="d-flex justify-content-center my-2">
                    <button type="button" class="btn btn-danger me-2 remove-tr" id="remove">-</button>
                </div>
            </td>
        </tr>
    </script>
@endpush
