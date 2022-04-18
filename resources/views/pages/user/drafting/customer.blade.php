@extends('layouts.user')

@section('title')
    Customer
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Customer</h2>
            <x-modal-history>
                @slot('data')
                    <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td>
                            <a href="" class="btn btn-primary">Lihat</a>
                        </td>
                    </tr>
                @endslot
            </x-modal-history>
        </div>

        <div class="row mt-3">
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
            </div>
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pihak (Optional)" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak (Optional)" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Draft Perjanjian" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis" name="addendum">
                    <option value="Baru">Baru</option>
                    <option value="Perpanjangan">Perpanjangan</option>
                    <option value="Addendum">Addendum</option>
                    <option value="Pembaharuan">Pembaharuan</option>
                </x-select>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Addendum Ke" name="addendum_to" hidden />
                <script>
                    document.getElementById("addendum").addEventListener("change", handleChange);

                    function handleChange() {
                        var x = document.getElementById("addendum");
                        if (x.value === "Addendum") {
                            document.getElementById("addendum_to1").style.display = "flex";
                            document.getElementById("addendum_to").required = true;
                        } else {
                            document.getElementById("addendum_to1").style.display = "none";
                            document.getElementById("addendum_to").required = false;
                        }
                    }
                </script>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Discount" prefix="%" />
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <x-textarea
                    label="Poin-Poin Khusus Lainnya Yang Dicantumkan Dalam Perjanjian Sesuai Kesepakatan Para Pihak:" />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Dokumen :</h5>
            </div>
            <div class="col-sm-9">
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. MOM/Penawaran Kesepakatan Para Pihak" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Draft Perjanjian dalam bentuk word" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Form Pengajuan PKS*" />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Korespondensi :</h5>
            </div>
            <div class="col-sm-9">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama PIC" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat PIC" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat PIC" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat PIC" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat PIC" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat PIC" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat PIC" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="No Telepon PIC" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Email PIC" />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Entitas :</h5>
            </div>
            <div class="col-sm-9">
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Akta Perusahaan" name="deed_of_company"
                    option />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Nomor Induk Berusaha (NIB)*" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Nomor Pokok Wajib Pajak (NPWP)*" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Izin Usaha" name="business_permit" option />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Izin Lokasi OSS" name="location_permission"
                    option />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. KTP Direksi" name="director_id" option />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Surat Kuasa" name="procuration" option />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Lain-lain" />
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <x-button type="submit" name="Submit" buttonClass="btn-danger" />
        </div>
    </x-base>
@endsection
