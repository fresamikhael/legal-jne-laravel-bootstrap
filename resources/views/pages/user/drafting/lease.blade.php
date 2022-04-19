@extends('layouts.user')

@section('title')
    Lease
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Lease</h2>
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
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Landlord" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Landlord" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Landlord" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Landlord" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Landlord" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Landlord" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Landlord" />
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
                            document.getElementById("addendum_to1").style.display = "flex";
                            document.getElementById("addendum_to").required = true;
                        } else {
                            document.getElementById("addendum_to1").style.display = "none";
                            document.getElementById("addendum_to").required = false;
                        }
                    }
                </script>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Regional">
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
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nilai Sewa" prefix="Rp" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Objek Sewa" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Objek Sewa" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Objek Sewa" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Objek Sewa" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Objek Sewa" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Objek Sewa" />
            </div>
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Landlord (Optional)" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Landlord (Optional)" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Landlord" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Landlord" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Landlord" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Landlord" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Landlord" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jangka Waktu" postfix="Hari" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Jaminan" prefix="Rp" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Cabang Utama" />
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <x-textarea
                    label="Poin-Poin Khusus Lainnya Yang Dicantumkan Dalam Perjanjian Sesuai Kesepakatan Para Pihak:" />
            </div>
        </div>

        <div class="row mt-3">
            <x-select labelClass="col-sm-3" fieldClass="col-sm-9" label="Tipe Landlord">
                <option value="Perorangan">Perorangan</option>
                <option value="Badan Hukum">Badan Hukum</option>
            </x-select>
        </div>

        <div class="d-flex justify-content-end">
            <x-button type="submit" name="Submit" buttonClass="btn-primary" />
        </div>
    </x-base>
@endsection
