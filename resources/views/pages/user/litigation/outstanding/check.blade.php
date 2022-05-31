@extends('layouts.user')

@section('title')
    Customer Dispute
@endsection

@section('content')
    <x-base>
        <x-button-back />

        <div class="d-flex align-items-center justify-content-between">
            <h2>Outstanding</h2>

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
                            <td>{{ $row->status }}</td>
                            <td>
                                <a href="{{ route('litigation.customer-dispute.show', $row->id) }}"
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

        <form action="{{ route('litigation.outstanding.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Perusahaan" name="company_name"
                        type="text" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Penanggung Jawab" name="person_responsible"
                        required />

                    <hr>

                    <div class="col-sm-3">
                        <h4>Alamat Agen :</h4>
                    </div>
                    <x-address label="Agen" name="agent" />

                    <hr>

                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Outstanding" name="total_outstanding"
                        required />
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Outstanding" name="outstanding_type"
                        required>
                        <option value="Customer">Customer</option>
                        <option value="Agen">Agen</option>
                    </x-select>
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Outstanding" name="outstanding_types"
                        hidden>
                        <option value="Penjualan">Penjualan</option>
                        <option value="COD">COD</option>
                        <option value="Keduanya">Keduanya</option>
                    </x-select>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Outstanding Penjualan"
                        name="outstanding_sales" prefix="Rp" hidden />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Outstanding COD" name="outstanding_cod"
                        prefix="Rp" hidden />
                    <script>
                        document.getElementById("outstanding_type").addEventListener("change", handleChange);

                        function handleChange() {
                            var x = document.getElementById("outstanding_type");
                            if (x.value === "Agen") {
                                document.getElementById("outstanding_types1").classList.remove('d-none');
                                document.getElementById("outstanding_types1").classList.add('d-flex');
                                document.getElementById("outstanding_types").required = true;
                            } else {
                                document.getElementById("outstanding_types1").classList.remove('d-flex');
                                document.getElementById("outstanding_types1").classList.add('d-none');
                                document.getElementById("outstanding_types").required = false;
                                document.getElementById("outstanding_cod1").classList.remove('d-flex');
                                document.getElementById("outstanding_cod1").classList.add('d-none');
                                document.getElementById("outstanding_cod").required = false;
                                document.getElementById("outstanding_sales1").classList.remove('d-flex');
                                document.getElementById("outstanding_sales1").classList.add('d-none');
                                document.getElementById("outstanding_sales").required = false;
                            }
                        }
                    </script>

                    <script>
                        document.getElementById("outstanding_types").addEventListener("change", handleChange);

                        function handleChange() {
                            var x = document.getElementById("outstanding_types");
                            if (x.value === "Penjualan") {
                                document.getElementById("outstanding_sales1").classList.remove('d-none');
                                document.getElementById("outstanding_sales1").classList.add('d-flex');
                                document.getElementById("outstanding_sales").required = true;
                                document.getElementById("outstanding_cod1").classList.remove('d-flex');
                                document.getElementById("outstanding_cod1").classList.add('d-none');
                                document.getElementById("outstanding_cod").required = false;
                            } else if (x.value === "COD") {
                                document.getElementById("outstanding_cod1").classList.remove('d-none');
                                document.getElementById("outstanding_cod1").classList.add('d-flex');
                                document.getElementById("outstanding_cod").required = true;
                                document.getElementById("outstanding_sales1").classList.remove('d-flex');
                                document.getElementById("outstanding_sales1").classList.add('d-none');
                                document.getElementById("outstanding_sales").required = false;
                            } else {
                                document.getElementById("outstanding_cod1").classList.remove('d-none');
                                document.getElementById("outstanding_cod1").classList.add('d-flex');
                                document.getElementById("outstanding_cod").required = true;
                                document.getElementById("outstanding_sales1").classList.remove('d-none');
                                document.getElementById("outstanding_sales1").classList.add('d-flex');
                                document.getElementById("outstanding_sales").required = true;
                            }
                        }
                    </script>

                    <hr>

                    <div class="col-sm-3">
                        <h4>Periode Outstanding :</h4>
                    </div>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Sejak Kapan" name="outstanding_start"
                        type="date" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Sampai Kapan" name="outstanding_end"
                        type="date" required />
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-sm-12">
                    <x-textarea label="Kronologis Singkat Kejadian:" name="incident_chronology" required />
                </div>
            </div>

            <hr>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Upload Dokumen :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Disposisi Management*"
                        name="file_management_disposition" required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Akta Pendirian dan Perubahan Terakhir"
                        name="file_deed_of_incoporation" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. SK Menkumham" name="file_sk_menkumham"
                        option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. KTP Direksi*" name="file_director_id_card"
                        required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. NPWP*" name="file_npwp" required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. NIB" name="file_nib" option required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Izin Usaha/OSS"
                        name="file_business_permit" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Izin Lokasi/OSS"
                        name="file_location_permit" option required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Rekapan Outstanding*"
                        name="file_outstanding_recap" required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="10. Scan Surat Penagihan*"
                        name="file_billing_letter" required />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="11. Internal Memo Kurang Dokumen"
                        name="file_internal_memo" option required />
                </div>
            </div>

            <hr>

            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Packing List Outstanding"
                name="outstanding_packing_list" type="text" required />

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
