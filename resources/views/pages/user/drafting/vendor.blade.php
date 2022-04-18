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
            </div>
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pihak (Optional)" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak (Optional)" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pihak" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jaminan" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jangka Waktu Retensi" />
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
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Akta Perusahaan" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Nomor Induk Berusaha (NIB)*" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Nomor Pokok Wajib Pajak (NPWP)*" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Izin Usaha" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Izin Lokasi OSS" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. KTP Direksi" />
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Surat Kuasa*" />
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
