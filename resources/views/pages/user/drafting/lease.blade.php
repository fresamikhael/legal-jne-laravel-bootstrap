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
            <div class="col-sm-12">
                <x-select labelClass="col-sm-3" fieldClass="col-sm-9" label="Tipe Landlord" name="landlord_type">
                    <option value="Perorangan">Perorangan</option>
                    <option value="Badan Hukum">Badan Hukum</option>
                </x-select>
            </div>
        </div>

        <div class="row mt-3" id="individual" hidden>
            <div class="col-sm-3">
                <h5>Dokumen :</h5>
            </div>
            <div class="col-sm-9">
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Fotocopy Disposisi Direksi" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                    label="2. Asli Internal Memo Pengajuan Sewa" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                    label="3. Asli Lease Drafting Application Form" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                    label="4. Fotocopy Kartu Identitas Pemilik Hak" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Copy NPWP" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Copy Kartu Keluarga" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Copy Akta Nikah" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Copy Akta Kematian" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                    label="9. Copy Surat Keterangan Ahli Waris" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="10. Fotocopy Sertifikat/Girik" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="11. Fotocopy IMB" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="12. Fotocopy SPPT & STTS (PBB)" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="13. Fotocopy Kuitansi DP" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="14. Fotocopy Kuitansi Pelunasan" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="15. Asli Surat Kuasa" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="16. Perjanjian Sewa Sebelumnya" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="17. Surat Kuasa Direksi" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="18. Form Pengajuan Sewa" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="19. Form Kelayakan Sewa" />
            </div>
        </div>

        <div class="row mt-3" id="legal_entity" hidden>
            <div class="col-sm-3">
                <h5>Dokumen :</h5>
            </div>
            <div class="col-sm-9">
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Fotocopy Disposisi Direksi" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                    label="2. Asli Internal Memo Pengajuan Sewa" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                    label="3. Asli Lease Drafting Application Form" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Fotocopy KTP Direksi" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                    label="5. Fotocopy Akta Pendirian dan Perubahan Terakhir" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Fotocopy SK MENKUM-HAM" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Fotocopy SIUP" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Fotocopy TDP" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Fotocopy NPWP" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="10. Fotocopy SKD" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="11. Fotocopy SKDU" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="12. Fotocopy Sertifikat/Girik" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="13. Fotocopy IMB" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="14. Fotocopy SPPT & STTS (PBB)" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="15. Fotocopy Kuitansi DP" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="16. Fotocopy Kuitansi Pelunasan" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="17. Asli Surat Kuasa" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="18. Perjanjian Sewa Sebelumnya" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="19. Surat Kuasa Direksi" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="20. Form Pengajuan Sewa" />
                <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="21. Form Kelayakan Sewa" />
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <x-button type="submit" name="Submit" buttonClass="btn-primary" />
        </div>
    </x-base>
@endsection
