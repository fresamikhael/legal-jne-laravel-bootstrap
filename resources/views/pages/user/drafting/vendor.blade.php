@extends('layouts.user')

@section('title')
    Vendor & Supplier
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Vendor & Supplier</h2>
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
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Pihak Pertama" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Perjanjian" prefix="Rp" />
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
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Isi Form" name="form_vendor_type"
                    hidden />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Lampiran Pendukung"
                    name="supporting_attachments" hidden />
                <script>
                    document.getElementById("vendor_type").addEventListener("change", handleChange);

                    function handleChange() {
                        var x = document.getElementById("vendor_type");
                        if (x.value === "Others") {
                            document.getElementById("form_vendor_type1").style.display = "flex";
                            document.getElementById("supporting_attachments1").style.display = "flex";
                            document.getElementById("form_vendor_type").required = true;
                            document.getElementById("supporting_attachments").required = true;
                        } else {
                            document.getElementById("form_vendor_type1").style.display = "none";
                            document.getElementById("supporting_attachments1").style.display = "none";
                            document.getElementById("form_vendor_type").required = false;
                            document.getElementById("supporting_attachments").required = false;
                        }
                    }
                </script>
            </div>
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pihak (Optional)" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak (Optional)" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
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
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jaminan" name="guarantee">
                    <option value="Bank Garansi">Bank Garansi</option>
                    <option value="Deposit">Deposit</option>
                    <option value="Tidak Ada">Tidak Ada</option>
                </x-select>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Isi Bank Garansi" name="bank_guarantee"
                    hidden />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Isi Deposit" name="deposit" hidden />
                <script>
                    document.getElementById("guarantee").addEventListener("change", handleChange);

                    function handleChange() {
                        var x = document.getElementById("guarantee");
                        if (x.value === "Bank Garansi") {
                            document.getElementById("bank_guarantee1").style.display = "flex";
                            document.getElementById("bank_guarantee").required = true;
                        } else {
                            document.getElementById("bank_guarantee1").style.display = "none";
                            document.getElementById("bank_guarantee").required = false;
                        }

                        if (x.value === "Deposit") {
                            document.getElementById("deposit1").style.display = "flex";
                            document.getElementById("deposit").required = true;
                        } else {
                            document.getElementById("deposit1").style.display = "none";
                            document.getElementById("deposit").required = false;
                        }
                    }
                </script>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jangka Waktu Retensi" postfix="Bulan" />
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
                <h5>Entitas :</h5>
            </div>
            <div class="col-sm-9">
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Akta Perusahaan*" name="deed_of_company" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Nomor Induk Berusaha (NIB)*" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Nomor Pokok Wajib Pajak (NPWP)*" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Izin Usaha*" name="business_permit" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Izin Lokasi OSS*"
                    name="location_permission" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. KTP Direksi*" name="director_id" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Surat Kuasa" name="procuration" option />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Lain-lain" />
            </div>
        </div>


        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Koresponden :</h5>
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
                <h5>Dokumen :</h5>
            </div>
            <div class="col-sm-9">
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Penawaran Vendor" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. MOM Kesepakatan Para Pihak" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Disposisi" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Draft Perjanjian dalam bentuk word" />
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Entitas Customer :</h5>
            </div>
            <div class="col-sm-9">
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Akta & SK Kemenkumham" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Nomor Induk Berusaha (NIB)" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Nomor Pokok Wajib Pajak (NPWP)" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Izin Usaha & Izin Lokasi OSS" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. KTP Direksi" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Lain-lain" />
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <x-button type="submit" name="Submit" buttonClass="btn-danger" />
        </div>
    </x-base>
@endsection
