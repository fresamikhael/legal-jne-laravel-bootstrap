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
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                @if ($row->status == 'IN PROGRESS')
                                    <a href="{{ route('legal.drafting.legal-lease-update', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @elseif ($row->status == 'USER SEND AGREEMENT DRAFT')
                                    <a href="{{ route('legal.drafting.legal-lease-process', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @elseif ($row->status == 'USER APPROVED AGREEMENT DRAFT')
                                    <a href="{{ route('legal.drafting.legal-lease-process', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @elseif ($row->status == 'LEGAL SEND AGREEMENT DRAFT')
                                    <a href="{{ route('legal.drafting.legal-lease-process', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @else
                                    <a href="{{ route('legal.drafting.legal-lease-check', [$row->id]) }}"
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

        <form method="POST" enctype="multipart/form-data" action="{{ route('legal.drafting.legal-lease-post') }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12">
                    <table class="table table-borderless" id="dynamicTable">
                        <tr>
                            <td>
                                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Landlord"
                                    name="landlord_name" required />
                                <x-address label="Landlord" name="landlord" />
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
                                            document.getElementById("addendum_to1").classList.add('d-flex');
                                            document.getElementById("addendum_to").required = false;
                                        }
                                    }
                                </script>
                                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Regional" name="regional">
                                    <option value="Jakarta">Jakarta</option>
                                    <option value="Bodetabekarcil">Bodetabekarcil</option>
                                    <option value="Jawa Barat">Jawa Barat</option>
                                    <option value="Jawa Tengah & DIY">Jawa Tengah & DIY</option>
                                    <option value="JTBNN">JTBNN</option>
                                    <option value="Sumatera Bagian Utara">Sumatera Bagian Utara</option>
                                    <option value="Sumatera Bagian Selatan">Sumatera Bagian Selatan</option>
                                    <option value="Kalimantan">Kalimantan</option>
                                    <option value="Sulampapua">Sulampapua</option>
                                </x-select>
                                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nilai Sewa" prefix="Rp"
                                    name="rental_value" />
                                <x-address label="Objek Sewa" name="rental_object" />
                                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jangka Waktu" postfix="Bulan"
                                    name="period_of_time" />
                                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Deposit" prefix="Rp"
                                    name="guarantee_nominal" />
                                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Cabang Utama"
                                    name="main_branch" />
                            </td>
                            <td>
                                <div class="d-flex justify-content-center my-2">
                                    {{-- <button type="button" class="btn btn-danger me-2 remove-tr" id="remove">Remove</button> --}}
                                    <button type="button" name="add" id="add" class="btn btn-success ">+</button>
                                </div>
                            </td>
                        </tr>

                    </table>

                </div>
                {{-- <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Landlord (Optional)"
                        name="optional_landlord_name" />
                    <x-address label="Landlord (Optional)" name="optional_landlord" />
                </div> --}}
            </div>

            <div class="row">
                <div class="col-sm-12">
                    <x-textarea name="other_point"
                        label="Poin-Poin Khusus Lainnya Yang Dicantumkan Dalam Perjanjian Sesuai Kesepakatan Para Pihak:" />
                </div>
            </div>

            <x-lease-type>
                @slot('individual')
                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <h5>Dokumen :</h5>
                        </div>
                        <div class="col-sm-9">
                            <x-input type="file" name="file_director_disposition" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="1. Fotocopy Disposisi Direksi*" required />
                            <x-input name="file_internal_memo" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="2. Asli Internal Memo Pengajuan Sewa*" required />
                            <x-input name="file_lease_application_form" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="3. Asli Lease Drafting Application Form*" required />
                            <x-input name="file_right_owner_id_card" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="4. Fotocopy Kartu Identitas Pemilik Hak*" required />
                            <x-input name="file_npwp_individual" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="5. Copy NPWP*" required />
                            <x-input name="file_family_card" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="6. Copy Kartu Keluarga*" required />
                            <x-input name="file_marriage_certificate" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="7. Copy Akta Nikah" />
                            <x-input name="file_death_certificate" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="8. Copy Akta Kematian" />
                            <x-input name="file_heir_certificate" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="9. Copy Surat Keterangan Ahli Waris" />
                            <x-input name="file_certificate" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="10. Fotocopy Sertifikat/Girik*" required />
                            <x-input name="file_imb" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="11. Fotocopy IMB*" required />
                            <x-input name="file_sppt" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="12. Fotocopy SPPT & STTS (PBB)*" required />
                            <x-input name="file_dp_receipt" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="13. Fotocopy Kuitansi DP*" required />
                            <x-input name="file_payment_imb" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="14. Fotocopy Kuitansi Pelunasan*" required />
                            <x-input name="file_procuration" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="15. Asli Surat Kuasa*" required />
                            <x-input name="file_previous_agreement" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="16. Perjanjian Sewa Sebelumnya*" required />
                            <x-input name="file_director_procuration" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="17. Surat Kuasa Direksi*" required />
                            <x-input name="file_lease_application" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="18. Form Pengajuan Sewa*" required />
                            <x-input name="file_lease_eligibility" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="19. Form Kelayakan Sewa*" required />
                            <p>*Wajib diisi</p>
                        </div>
                    </div>
                @endslot

                @slot('legal_entity')
                    <div class="row mt-3">
                        <div class="col-sm-3">
                            <h5>Dokumen :</h5>
                        </div>
                        <div class="col-sm-9">
                            <x-input name="file_director_disposition" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="1. Fotocopy Disposisi Direksi*" required />
                            <x-input name="file_internal_memo" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="2. Asli Internal Memo Pengajuan Sewa*" required />
                            <x-input name="file_lease_application_form" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="3. Asli Lease Drafting Application Form*" required />
                            <x-input name="file_director_id_card" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="4. Fotocopy KTP Direksi*" required />
                            <x-input name="file_deed_of_incorporation" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="5. Fotocopy Akta Pendirian dan Perubahan Terakhir*" required />
                            <x-input name="file_sk_menkumham" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="6. Fotocopy SK MENKUM-HAM*" required />
                            {{-- <x-input name="file_siup" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="7. Fotocopy SIUP" />
                            <x-input name="file_tdp" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="8. Fotocopy TDP" /> --}}
                            <x-input name="file_npwp_legal_entity" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="7. Fotocopy NPWP*" required />
                            <x-input name="file_nib" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="8. NIB*" required />
                            {{-- <x-input name="file_skd" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="10. Fotocopy SKD" />
                            <x-input name="file_skdu" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="11. Fotocopy SKDU" /> --}}
                            <x-input name="file_certificate" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="9. Fotocopy Sertifikat/Girik*" required />
                            <x-input name="file_imb" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="10. Fotocopy IMB*" required />
                            <x-input name="file_sppt" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="11. Fotocopy SPPT & STTS (PBB)*" required />
                            <x-input name="file_dp_receipt" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="12. Fotocopy Kuitansi DP*" required />
                            <x-input name="file_payment_imb" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="13. Fotocopy Kuitansi Pelunasan*" required />
                            <x-input name="file_procuration" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                                label="14. Asli Surat Kuasa*" required />
                            <x-input name="file_previous_agreement" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="15. Perjanjian Sewa Sebelumnya*" required />
                            <x-input name="file_director_procuration" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="16. Surat Kuasa Direksi*" required />
                            <x-input name="file_lease_application" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="17. Form Pengajuan Sewa*" required />
                            <x-input name="file_lease_eligibility" type="file" labelClass="col-sm-5"
                                fieldClass="col-sm-7" label="18. Form Kelayakan Sewa*" required />
                            <p>*Wajib diisi</p>
                        </div>
                    </div>
                @endslot
            </x-lease-type>

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-primary" />
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
    </script>

    <script type="text/html" id="test">
        <tr>
            <td>


    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">
            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Landlord (Opsional)" name="landlord_name" required />
            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama " name="user_id" hidden />
        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">
            <x-input label="Provinsi" name="province" labelClass="col-sm-5" fieldClass="col-sm-7" required />

        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">

            <x-input label="Kab/Kota" name="regency" labelClass="col-sm-5" fieldClass="col-sm-7" required />

        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">

            <x-input label="Kecamatan" name="district" labelClass="col-sm-5" fieldClass="col-sm-7" required />

        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">

            <x-input label="Desa/Kel" name="village" labelClass="col-sm-5" fieldClass="col-sm-7" required />
        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">

            <x-input label="Jalan" name="address" labelClass="col-sm-5" fieldClass="col-sm-7" required />
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
            <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Regional" name="regional">
        <option value="Jakarta">Jakarta</option>
        <option value="Bodetabekarcil">Bodetabekarcil</option>
        <option value="Jawa Barat">Jawa Barat</option>
        <option value="Jawa Tengah & DIY">Jawa Tengah & DIY</option>
        <option value="JTBNN">JTBNN</option>
        <option value="Sumatera Bagian Utara">Sumatera Bagian Utara</option>
        <option value="Sumatera Bagian Selatan">Sumatera Bagian Selatan</option>
        <option value="Kalimantan">Kalimantan</option>
        <option value="Sulampapua">Sulampapua</option>
    </x-select>

        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">
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


        </div>
    </div>

    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">
            <x-input label="Provinsi" name="province" labelClass="col-sm-5" fieldClass="col-sm-7" required />

        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">

            <x-input label="Kab/Kota" name="regency" labelClass="col-sm-5" fieldClass="col-sm-7" required />

        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">

            <x-input label="Kecamatan" name="district" labelClass="col-sm-5" fieldClass="col-sm-7" required />

        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">

            <x-input label="Desa/Kel" name="village" labelClass="col-sm-5" fieldClass="col-sm-7" required />
        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">

            <x-input label="Jalan" name="address" labelClass="col-sm-5" fieldClass="col-sm-7" required />
        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jangka Waktu" postfix="Bulan" name="period_of_time" />

        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">

            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Deposit" prefix="Rp" name="guarantee_nominal" />
        </div>
    </div>
    <div class="d-flex justify-content-center ">
        <div class="col-sm-12">

            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Cabang Utama" name="main_branch" />
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
