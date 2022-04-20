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
        
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success"/>
            @endslot
        @endif
        
        <form action="{{ route('litigation.customer-dispute.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Kasus" name="id" required/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Pengiriman" name="shipping_date" type="date" required/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pengirim" name="sender_name" required/>
                    <x-address label="Pengirim" name="seender"/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Pengirim" required/>
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Kasus" name="case_type" required>
                        <option value="Terlambat">Terlambat</option>
                        <option value="Hilang">Hilang</option>
                        <option value="Rusak">Rusak</option>
                    </x-select>
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab" name="causative_factor" required>
                        <option value="Alamat Tidak Jelas">Alamat Tidak Jelas</option>
                        <option value="Penerima Tidak Tepat">Penerima Tidak Tepat</option>
                        <option value="Kendala Pihak Ketiga">Kendala Pihak Ketiga</option>
                        <option value="Pencurian">Pencurian</option>
                        <option value="Kecelakaan">Kecelakaan</option>
                        <option value="Force Majeur">Force Majeur</option>
                        <option value="Lain-Lain">Lain-Lain</option>
                    </x-select>
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab (Lain-Lain)" name="causative_factor_other" hidden/>
                    
                    <script>
                        document.getElementById("causative_factor").addEventListener("change", handleChange);
                
                        function handleChange() {
                            var x = document.getElementById("causative_factor");
                            if (x.value === "Lain-Lain" ) {
                                document.getElementById("causative_factor_other1").style.display = "flex";
                                document.getElementById("causative_factor_other").required = true;
                            } else {
                                document.getElementById("causative_factor_other1").style.display = "none";
                                document.getElementById("causative_factor_other").required = false;
                            }
                        }
                    </script>
                </div>
                <div class="col-sm-6">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Penerima" name="receiver_name" required/>
                    <x-address label="Penerima" name="receiver"/>                
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Penerima" name="receiver_phone_number"/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Kerugian/Klaim" prefix="Rp" name="total_loss"/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Barang" prefix="Rp" name="item_nominal"/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Connote/Perjanjian" name="connote"/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Customer" name="customer"/>
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Pengiriman" name="shipping_type">
                        <option value="Hight Value Service">Hight Value Service</option>
                        <option value="Non HVS">Non HVS</option>
                        <option value="Makanan">Makanan</option>
                        <option value="Dangerous Goods">Dangerous Goods</option>
                    </x-select>
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi" name="assurance">
                        <option value="yes">Ada</option>
                        <option value="no">Tidak</option>
                    </x-select>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi Nominal" name="assurance_nominal" prefix="Rp" hidden/>
                    <script>
                        document.getElementById("assurance").addEventListener("change", handleChange);
                
                        function handleChange() {
                            var x = document.getElementById("assurance");
                            if (x.value === "yes" ) {
                                document.getElementById("assurance_nominal1").classList.remove('d-none');
                                document.getElementById("assurance_nominal1").classList.add('d-flex');
                                document.getElementById("assurance_nominal").required = true;
                            } else {
                                document.getElementById("assurance_nominal1").classList.remove('d-flex');
                                document.getElementById("assurance_nominal1").classList.add('d-none');
                                document.getElementById("assurance_nominal").required = false;
                            }
                        }
                    </script>
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
                    <x-select fieldClass="col-sm-12" name="shipping_form">
                        <option value="Dokumen">Dokumen</option>
                        <option value="KTP">KTP</option>
                        <option value="Paspor">Paspor</option>
                        <option value="STNK/BPKB">STNK/BPKB</option>
                        <option value="Pakaian">Pakaian</option>
                        <option value="Elektronik">Elektronik</option>
                        <option value="Makanan">Makanan</option>
                        <option value="Tumbuhan">Tumbuhan</option>
                        <option value="Aksesoris">Aksesoris</option>
                        <option value="Lain-Lain">Lain-Lain</option>
                    </x-select>
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
        </form>
    </x-base>
@endsection
