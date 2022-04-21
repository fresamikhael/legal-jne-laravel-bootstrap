@extends('layouts.legal')

@section('title')
    Customer
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Customer</h2>
            <!-- Button trigger modal -->
            <button type="button" class="btn btn-primary d-flex align-items-center gap-2" data-bs-toggle="modal"
                data-bs-target="#staticBackdrop2">
                <i class="fa fa-clock-o"></i> Riwayat
            </button>

            <!-- Modal -->
            <div class="modal fade" id="staticBackdrop2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <table id="legal-customer" class="table table-striped table-bordered" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Kasus</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>

                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th>No</th>
                                        <th>Nomor Kasus</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('legal.drafting.legal-customer-post') }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-6">
                    <x-input name="party_name" type="text" labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pihak" />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pihak" name="user_id" hidden />
                    <x-address label="Pihak" name="party" />
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
                                document.getElementById("addendum_to1").classList.add('d-flex');
                                document.getElementById("addendum_to").required = false;
                            }
                        }
                    </script>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Discount" name="discount" prefix="%" />
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <x-textarea name="other_point"
                        label="Poin-Poin Khusus Lainnya Yang Dicantumkan Dalam Perjanjian Sesuai Kesepakatan Para Pihak:" />
                </div>
            </div>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Dokumen :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. MOM/Penawaran Kesepakatan Para Pihak"
                        name="file_mom" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Draft Perjanjian dalam bentuk word"
                        name="file_agreement_draft" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Form Pengajuan PKS*"
                        name="file_claim_form" />
                </div>
            </div>

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

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Entitas :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Akta Perusahaan"
                        name="file_deed_of_company" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Nomor Induk Berusaha (NIB)*"
                        name="file_nib" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Nomor Pokok Wajib Pajak (NPWP)*"
                        name="file_npwp" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Izin Usaha" name="file_business_permit"
                        option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Izin Lokasi OSS" name="file_oss_location"
                        option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. KTP Direksi" name="file_director_id_card"
                        option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Surat Kuasa" name="file_sk" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Lain-lain" name="file_other" />
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
        $(function() {
            var table = $('#legal-customer').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: "{{ route('legal.drafting.legal-customer-table') }}",
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
