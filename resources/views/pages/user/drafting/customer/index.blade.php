@extends('layouts.user')

@section('title')
    Customer
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Customer</h2>
            <x-modal-history id="dataTables">
                @slot('header')
                    <tr>
                        <th>No</th>
                        <th>Nomor</th>
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
                                    <a href="{{ route('drafting.customer-update', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @elseif ($row->status == 'CONTRACT BUSINESS SEND AGREEMENT DRAFT')
                                    <a href="{{ route('drafting.customer-update', [$row->id]) }}"
                                        class="btn btn-primary">Check</a>
                                @elseif ($row->status == 'USER APPROVED AGREEMENT DRAFT')
                                    <a href="{{ route('drafting.customer-process', [$row->id]) }}"
                                        class="btn btn-primary">Check</a>
                                @elseif ($row->status == 'CONTRACT BUSINESS SEND AGREEMENT SIGNATURE')
                                    <a href="{{ route('drafting.customer-process', [$row->id]) }}"
                                        class="btn btn-primary">Check</a>
                                @else
                                    <a href="{{ route('drafting.customer-check', [$row->id]) }}"
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

        <form method="POST" enctype="multipart/form-data" action="{{ route('drafting.customer-post') }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12">
                    <x-input name="party_name" type="text" labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama " />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama " name="user_id" hidden />
                    <x-address label="" name="party" />
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
                                document.getElementById("addendum_to1").classList.add('d-flex');
                                document.getElementById("addendum_to").required = false;
                            }
                        }
                    </script>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Discount" name="discount" prefix="%" />
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
                    <h5>Dokumen :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. MOM/Penawaran Kesepakatan Para Pihak"
                        name="file_mom" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Form Pengajuan PKS*"
                        name="file_claim_form" required />
                </div>
            </div>

            <hr>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Korespondensi Customer :</h5>
                </div>
                <div class="col-sm-9">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama " name="correspondence_name" />
                    <x-address label="" name="correspondence" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="No Telepon " name="correspondence_phone" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Email " name="correspondence_email" />
                </div>
            </div>

            <hr>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Entitas :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Akta Perusahaan"
                        name="file_deed_of_company" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Nomor Induk Berusaha (NIB)*"
                        name="file_nib" required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Nomor Pokok Wajib Pajak (NPWP)*"
                        name="file_npwp" required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Izin Usaha"
                        name="file_business_permit" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Izin Lokasi OSS"
                        name="file_oss_location" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. KTP Direksi"
                        name="file_director_id_card" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Surat Kuasa" name="file_sk" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Lain-lain" name="file_other" option />
                </div>
            </div>

            <hr>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Kontak Sales :</h5>
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
