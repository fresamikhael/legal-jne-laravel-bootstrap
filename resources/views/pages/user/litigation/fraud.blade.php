@extends('layouts.user')

@section('title')
    Fraud
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Fraud</h2>
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
        
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success"/>
            @endslot
        @endif

        <div class="row mt-3">
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal" type="date" name="date"/>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Kasus" name="case_type">
                    <option value="Penggelapan">Penggelapan</option>    
                    <option value="Pencurian">Pencurian</option>    
                    <option value="Pemalsuan">Pemalsuan</option>    
                    <option value="Penipuan">Penipuan</option>    
                    <option value="Perusakan Barang">Perusakan Barang</option>    
                    <option value="Penganiayaan">Penganiayaan</option>    
                    <option value="Konflik Kepentingan">Konflik Kepentingan</option>    
                    <option value="Pemberian Ilegal">Pemberian Ilegal</option>    
                    <option value="Cyber Crime">Cyber Crime</option>    
                    <option value="Lain-Lain">Lain-Lain</option>    
                </x-select>   
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab" name="causative_factor">
                    <option value="Keserakahan">Keserakahan</option>
                    <option value="Kesempatan">Kesempatan</option>
                    <option value="Kebutuhan">Kebutuhan</option>
                    <option value="Tekanan">Tekanan</option>
                    <option value="Pembenaran">Pembenaran</option>
                </x-select>
            </div>
            <div class="col-sm-6">
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Pelaku" name="perpetrator">
                    <option value="Internal">Internal</option>
                    <option value="External">External</option>
                </x-select>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Unit/Departemen/Divisi" name="unit"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Kerugian" prefix="Rp" name="total_loss"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Kejadian" type="date" name="incident_date"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tempat Kejadian" name="incedent_scane"/>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <x-textarea
                    label="Kronologis Singkat Kejadian:" name="incident_chronology"/>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Klasifikasi Fraud :</h5>
            </div>
            <div class="col-sm-9">
                <x-select fieldClass="col-sm-12" name="fraud_classification">
                    <option value="Kecurangan Laporan Keuangan">Kecurangan Laporan Keuangan</option>
                    <option value="Penyalahgunaan Aset">Penyalahgunaan Aset</option>
                    <option value="Kecurangan Berkaitan Dengan Komputer">Kecurangan Berkaitan Dengan Komputer</option>
                </x-select>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Bukti :</h5>
            </div>
            <div class="col-sm-9">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Saksi 1" name="witness1"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Departemen/Unit" name="witness1_departement"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="3. Saksi 2" name="witness2"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Departemen/Unit" name="witness2_departement"/>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Bukti Dokumen Surat" name="file_document_proof"/>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Keterangan Pelaku" name="file_prepetrator_statement"/>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Keterangan Saksi" name="file_witness_statement"/>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Lain-Lain" name="file_other"/>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Dokumen Barang Bukti" name="file_evidence_documentation"/>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="10. Dokumen Investigasi" name="file_investigation_document"/>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="11. Bukti Lainnya" name="file_other_evidence"/>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <x-button type="submit" name="Submit" buttonClass="btn-danger" />
        </div>
    </x-base>
@endsection
