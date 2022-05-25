@extends('layouts.legal')

@section('title')
    Customer Dispute
@endsection

@section('content')
    <x-base>
        <x-button-back/>
        <h2>Customer Dispute</h2>
        
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success"/>
            @endslot
        @endif
        <div class="row mt-3">
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Kasus" value="{{ $data->id }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Pengiriman" value="{{ date('j F Y', strtotime($data->shipping_date)) }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pengirim" value="{{ $data->sender_name }}" readOnly/>
                @php
                    $province = DB::table('provinces')
                        ->where('id', $data->sender_province)
                        ->first();
                @endphp
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Pengirim" value="{{ ucwords(strtolower($province->name)) }}" readOnly/>
                @php
                    $regency = DB::table('regencies')
                        ->where('id', $data->sender_regency)
                        ->first();
                @endphp
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Pengirim" value="{{ ucwords(strtolower($regency->name)) }}" readOnly/>
                @php
                    $district = DB::table('districts')
                        ->where('id', $data->sender_district)
                        ->first();
                @endphp
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Pengirim" value="{{ ucwords(strtolower($district->name)) }}" readOnly/>
                @php
                    $village = DB::table('villages')
                        ->where('id', $data->sender_village)
                        ->first();
                @endphp
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Pengirim" value="{{ ucwords(strtolower($village->name)) }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Pengirim" value="{{ $data->sender_zip_code }}" readOnly/>
                <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Pengirim" readOnly>
                    {{ $data->sender_address }}
                </x-textarea>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Pengirim" value="{{ $data->sender_phone_number }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Kasus" value="{{ $data->case_type }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab" value="{{ $data->causative_factor }}" readOnly/>
                @if ($data->causative_factor == "Lain-Lain")
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab (Lain-Lain)" readOnly>    
                        {{ $data->causative_factor_others }}
                    </x-textarea>
                @endif
            </div>
            <div class="col-sm-6">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Penerima" value="{{ $data->receiver_name }}" readOnly/>
                @php
                    $province = DB::table('provinces')
                        ->where('id', $data->receiver_province)
                        ->first();
                @endphp    
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Penerima" value="{{ ucwords(strtolower($province->name)) }}" readOnly/>
                @php
                    $regency = DB::table('regencies')
                        ->where('id', $data->receiver_regency)
                        ->first();
                @endphp
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Penerima" value="{{ ucwords(strtolower($regency->name)) }}" readOnly/>
                @php
                    $district = DB::table('districts')
                        ->where('id', $data->receiver_district)
                        ->first();
                @endphp
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Penerima" value="{{ ucwords(strtolower($district->name)) }}" readOnly/>
                @php
                    $village = DB::table('villages')
                        ->where('id', $data->receiver_village)
                        ->first();
                @endphp
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Penerima" value="{{ ucwords(strtolower($village->name)) }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Penerima" value="{{ $data->receiver_zip_code }}" readOnly/>
                <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Penerima" readOnly>
                    {{ $data->receiver_address }}
                </x-textarea>               
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Penerima" value="{{ $data->receiver_phone_number }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Kerugian/Klaim" prefix="Rp" value="{{ number_format($data->total_loss) }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Barang" prefix="Rp" value="{{ number_format($data->item_nominal) }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Connote/Perjanjian" value="{{ $data->connote }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Customer" value="{{ $data->customer }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Pengiriman" value="{{ $data->shipping_type }}" readOnly/>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi" value="{{ $data->assurance }}" readOnly/>
                @if ($data->assurance == "Ada")
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi Nominal" value="{{ number_format($data->assurance_nominal) }}" prefix="Rp" readOnly/>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12">
                <x-textarea
                    label="Kronologis Singkat Kejadian:" readOnly>
                    {{ $data->incident_chronology }}
                </x-textarea>
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Bentuk Kiriman :</h5>
            </div>
            <div class="col-sm-9">
                <x-input fieldClass="col-sm-12" value="{{ $data->shipping_form }}" readOnly/>
                @if ($data->shipping_form == "Lain-Lain")
                    <x-textarea fieldClass="col-sm-12" readOnly>
                        {{ $data->detail_shipping_form }}
                    </x-textarea>
                @endif
            </div>
        </div>

        <div class="row mt-3">
            <div class="col-sm-3">
                <h5>Bukti :</h5>
            </div>
            <div class="col-sm-9">
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Connote*" name="file_connote" type="download" path="{{ route('download.litigation', [substr($data->file_connote, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Orion*" name="file_orion" type="download" path="{{ route('download.litigation', [substr($data->file_orion, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @if ($data->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. POD*" name="file_pod" type="download" path="{{ route('download.litigation', [substr($data->file_pod, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="3. POD*" value="Tidak Ada" readOnly/>
                @endif
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Form Kasus Sengketa Konsumen" name="file_customer_case_form" type="download" path="{{ route('download.litigation', [substr($data->file_customer_case_form, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @if ($data->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Kronologis Destinasi" name="file_destination_chronology" type="download" path="{{ route('download.litigation', [substr($data->file_destination_chronology, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Kronologis Destinasi" value="Tidak Ada" readOnly/>
                @endif
                @if ($data->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Kronologis Origin" name="file_orion_chronology" type="download" path="{{ route('download.litigation', [substr($data->file_orion_chronology, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Kronologis Origin" value="Tidak Ada" readOnly/>
                @endif
                @if ($data->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Kronologis CS" name="file_cs_chronology" type="download" path="{{ route('download.litigation', [substr($data->file_cs_chronology, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Kronologis CS" value="Tidak Ada" readOnly/>
                @endif
                @if ($data->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Surat Customer atau Somasi" name="file_subpoena" type="download" path="{{ route('download.litigation', [substr($data->file_subpoena, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Surat Customer atau Somasi" value="Tidak Ada" readOnly/>
                @endif
                @if ($data->file_pod)
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Surat Kuasa" name="file_procuration" type="download" path="{{ route('download.litigation', [substr($data->file_procuration, 11)]) }}">Unduh <i class="fa fa-download"></i></x-file>
                @else
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Surat Kuasa" value="Tidak Ada" readOnly/>
                @endif
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Status" value="{{ $data->status }}" readOnly/>
            </div>
        </div>
        @if ($data->status === "UPDATE BY CS")
            <form action="{{ route('legal.litigation.customer-dispute.finish', [$data->id]) }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row mt-3">
                    <div class="col-sm-3">
                        <h5>Berkas Penutupan Kasus :</h5>
                    </div>
                    <div class="col-sm-9">
                        <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Status Kasus" name="status" required>
                            <option value="" disabled>Kasus Selesai</option>
                            <option value="Kasus selesai penggantian">Kasus selesai penggantian</option>
                            <option value="Perdamaian">Perdamaian</option>
                            <option value="Lewat > 3 Bulan">Lewat > 3 Bulan</option>
                            
                            <option value="" disabled>Kasus Berlanjut</option>
                            <option value="Somasi">Somasi</option>
                            <option value="Gugatan Pengadilan">Gugatan Pengadilan</option>
                            <option value="Gugatan BPSK">Gugatan BPSK</option>
                        </x-select>
                        <div id="s1" class="d-none">
                            <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Surat Tanggapan Penerimaan" name="file_acceptance_letter"/>
                            <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Laporan Penyelesaian Kasus" name="file_case_report"/>
                        </div>
                        <div id="s2" class="d-none">
                            <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Surat Kesepakatan Perdamaian " name="file_peace_agreement"/>
                            <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Laporan Penyelesaian Kasus" name="file_case_report"/>
                        </div>
                        <div id="s3" class="d-none">
                            <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alasan Kasus Ditutup Sementara " name="reason_case_temporary_close"/>
                            <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Somasi II  " name="file_somasi_2"/>
                            <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Dokumen tanggapan customer" name="file_customer_response_document"/>
                        </div>
                        <div id="e1" class="d-none">
                            <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Somasi II  " name="file_somasi_2"/>
                            <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Dokumen tanggapan customer" name="file_customer_response_document"/>
                            <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Laporan Perkembangan Kasus" name="file_case_progress_report"/>
                        </div>
                        <div id="e2" class="d-none">
                            <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Gugatan Pengadilan" name="file_court_lawsuit" />
                        </div>
                        <div id="e3" class="d-none">
                            <x-input type="file" labelClass="col-sm-5" fieldClass="col-sm-7" label="Gugatan BPSK" name="file_court_bpsk" />
                        </div>
                        <script>
                            document.getElementById("status").addEventListener("change", handleChange);
                    
                            function handleChange() {
                                var x = document.getElementById("status");
                                if (x.value === "Kasus selesai penggantian") {
                                    document.getElementById("e1").classList.remove('d-flex');
                                    document.getElementById("e1").classList.add('d-none');
                                    
                                    document.getElementById("e2").classList.remove('d-flex');
                                    document.getElementById("e2").classList.add('d-none');
                                    
                                    document.getElementById("e3").classList.remove('d-flex');
                                    document.getElementById("e3").classList.add('d-none');

                                    document.getElementById("s2").classList.remove('d-flex');
                                    document.getElementById("s2").classList.add('d-none');
                                    
                                    document.getElementById("s3").classList.remove('d-flex');
                                    document.getElementById("s3").classList.add('d-none');
                                    
                                    document.getElementById("s1").classList.remove('d-none');
                                    document.getElementById("s1").classList.add('d-block');
                                } else if (x.value === "Perdamaian") {
                                    document.getElementById("e1").classList.remove('d-flex');
                                    document.getElementById("e1").classList.add('d-none');
                                    
                                    document.getElementById("e2").classList.remove('d-flex');
                                    document.getElementById("e2").classList.add('d-none');
                                    
                                    document.getElementById("e3").classList.remove('d-flex');
                                    document.getElementById("e3").classList.add('d-none');

                                    document.getElementById("s1").classList.remove('d-flex');
                                    document.getElementById("s1").classList.add('d-none');
                                    
                                    document.getElementById("s3").classList.remove('d-flex');
                                    document.getElementById("s3").classList.add('d-none');
                                    
                                    document.getElementById("s2").classList.remove('d-none');
                                    document.getElementById("s2").classList.add('d-block');
                                } else if (x.value === "Lewat > 3 Bulan") {
                                    document.getElementById("e1").classList.remove('d-flex');
                                    document.getElementById("e1").classList.add('d-none');
                                    
                                    document.getElementById("e2").classList.remove('d-flex');
                                    document.getElementById("e2").classList.add('d-none');
                                    
                                    document.getElementById("e3").classList.remove('d-flex');
                                    document.getElementById("e3").classList.add('d-none');

                                    document.getElementById("s1").classList.remove('d-flex');
                                    document.getElementById("s1").classList.add('d-none');
                                    
                                    document.getElementById("s2").classList.remove('d-flex');
                                    document.getElementById("s2").classList.add('d-none');
                                    
                                    document.getElementById("s3").classList.remove('d-none');
                                    document.getElementById("s3").classList.add('d-block');
                                } else if (x.value === "Somasi") {
                                    document.getElementById("s1").classList.remove('d-flex');
                                    document.getElementById("s1").classList.add('d-none');
                                    
                                    document.getElementById("s2").classList.remove('d-flex');
                                    document.getElementById("s2").classList.add('d-none');
                                    
                                    document.getElementById("s3").classList.remove('d-flex');
                                    document.getElementById("s3").classList.add('d-none');

                                    document.getElementById("e2").classList.remove('d-flex');
                                    document.getElementById("e2").classList.add('d-none');
                                    
                                    document.getElementById("e3").classList.remove('d-flex');
                                    document.getElementById("e3").classList.add('d-none');
                                    
                                    document.getElementById("e1").classList.remove('d-none');
                                    document.getElementById("e1").classList.add('d-block');
                                } else if (x.value === "Gugatan Pengadilan") {  
                                    document.getElementById("s1").classList.remove('d-flex');
                                    document.getElementById("s1").classList.add('d-none');
                                    
                                    document.getElementById("s2").classList.remove('d-flex');
                                    document.getElementById("s2").classList.add('d-none');
                                    
                                    document.getElementById("s3").classList.remove('d-flex');
                                    document.getElementById("s3").classList.add('d-none');
                                    
                                    document.getElementById("e1").classList.remove('d-flex');
                                    document.getElementById("e1").classList.add('d-none');
                                    
                                    document.getElementById("e3").classList.remove('d-flex');
                                    document.getElementById("e3").classList.add('d-none');
                                    
                                    document.getElementById("e2").classList.remove('d-none');
                                    document.getElementById("e2").classList.add('d-block');
                                } else if (x.value === "Gugatan BPSK") {
                                    document.getElementById("s1").classList.remove('d-flex');
                                    document.getElementById("s1").classList.add('d-none');
                                    
                                    document.getElementById("s2").classList.remove('d-flex');
                                    document.getElementById("s2").classList.add('d-none');
                                    
                                    document.getElementById("s3").classList.remove('d-flex');
                                    document.getElementById("s3").classList.add('d-none');

                                    document.getElementById("e1").classList.remove('d-flex');
                                    document.getElementById("e1").classList.add('d-none');
                                    
                                    document.getElementById("e2").classList.remove('d-flex');
                                    document.getElementById("e2").classList.add('d-none');
                                    
                                    document.getElementById("e3").classList.remove('d-none');
                                    document.getElementById("e3").classList.add('d-block');
                                } else {
                                    document.getElementById("s1").classList.remove('d-flex');
                                    document.getElementById("s1").classList.add('d-none');
                                    
                                    document.getElementById("s2").classList.remove('d-flex');
                                    document.getElementById("s2").classList.add('d-none');
                                    
                                    document.getElementById("s3").classList.remove('d-flex');
                                    document.getElementById("s3").classList.add('d-none');

                                    document.getElementById("e1").classList.remove('d-flex');
                                    document.getElementById("e1").classList.add('d-none');
                                    
                                    document.getElementById("e2").classList.remove('d-flex');
                                    document.getElementById("e2").classList.add('d-none');
                                    
                                    document.getElementById("e3").classList.remove('d-flex');
                                    document.getElementById("e3").classList.add('d-none');
                                }
                            }
                        </script>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    <x-button type="submit" name="Submit" buttonClass="btn-danger" />
                </div>
            </form>
        @endif
    </x-base>
@endsection
