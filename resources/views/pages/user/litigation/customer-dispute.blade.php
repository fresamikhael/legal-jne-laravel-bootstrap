@extends('layouts.user')

@section('title')
    Customer Dispute
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Customer Dispute</h2>
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
        {{-- @slot('alert')
    <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        <div class="row mt-3">
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Kasus" name="id"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Pengiriman" name="shipping_date" type="date" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pengirim" name="sender_name"/>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pengirim">
                    <option value="test">test</option>
                </x-select>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Pengirim" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Kasus" name="case_type"/>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab" name="causative_factor"/>
                <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab (Lain-Lain)" name="causative_factor_other"/>
            </div>
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Penerima" name="receiver_name"/>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Penerima"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Penerima" name="receiver_phone_number"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Kerugian/Klaim" prefix="Rp" name="total_loss"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Barang" prefix="Rp" name="item_nominal"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Connote/Perjanjian" name="connote"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Customer" name="customer"/>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Pengiriman" name="shipping_type"/>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi" name="assurance"/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi Nominal" name="assurance_nominal" prefix="Rp"/>
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
                <h5>Bentuk Kiriman :</h5>
            </div>
            <div class="col-sm-9">
                <x-select fieldClass="col-sm-12" name="shipping_form"/>
                <x-textarea fieldClass="col-sm-12" name="detail_shipping_form"/>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Bukti :</h5>
            </div>
            <div class="col-sm-9">
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Connote*" name="connote"/>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Orion*" name="orion"/>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. POD*" name="pod" option/>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Form Kasus Sengketa Konsumen" name="file_customer_case_form"/>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Kronologis Destinasi" name="file_destination_chronology" option/>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Kronologis Origin" name="file_orion_chronology" option/>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Kronologis CS" name="file_cs_chronology" option/>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Surat Customer atau Somasi" name="file_subpoena" option/>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Surat Kuasa" name="file_procuration" option/>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <x-button type="submit" name="Submit" buttonClass="btn-danger" />
        </div>
    </x-base>
@endsection
