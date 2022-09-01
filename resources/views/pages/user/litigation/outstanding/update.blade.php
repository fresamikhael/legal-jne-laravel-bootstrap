@extends('layouts.user')

@section('title')
    Customer Dispute
@endsection

@section('content')
    <x-base>
        <x-button-back />

        <div class="d-flex align-items-center justify-content-between">
            <h2>Outstanding</h2>

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
                    @foreach ($table as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                <a href="{{ route('litigation.customer-dispute.show', $row->id) }}"
                                    class="btn btn-primary">Lihat</a>
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

        <form action="{{ route('litigation.outstanding.update-post', $data->id) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Perusahaan" name="company_name"
                        type="text" value="{{ $data->company_name }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Penanggung Jawab" name="person_responsible"
                        value="{{ $data->person_responsible }}" disabled />

                    <hr>

                    <div class="col-sm-3">
                        <h4>Alamat Penggugat/Tergugat :</h4>
                    </div>
                    @php
                        $province = DB::table('provinces')
                            ->where('id', $data->agent_province)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Provinsi Penggugat/Tergugat"
                        value="{{ ucwords(strtolower($province->name)) }}" disabled />
                    @php
                        $regency = DB::table('regencies')
                            ->where('id', $data->agent_regency)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kab/Kota Penggugat/Tergugat"
                        value="{{ ucwords(strtolower($regency->name)) }}" disabled />
                    @php
                        $district = DB::table('districts')
                            ->where('id', $data->agent_district)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kecamatan Penggugat/Tergugat"
                        value="{{ ucwords(strtolower($district->name)) }}" disabled />
                    @php
                        $village = DB::table('villages')
                            ->where('id', $data->agent_village)
                            ->first();
                    @endphp
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kelurahan Penggugat/Tergugat"
                        value="{{ ucwords(strtolower($village->name)) }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Kode Pos Penggugat/Tergugat"
                        value="{{ $data->agent_zip_code }}" disabled />
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Alamat Penggugat/Tergugat" disabled>
                        {{ $data->agent_address }}
                    </x-textarea>

                    <hr>

                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Outstanding" name="total_outstanding"
                        value="{{ $data->total_outstanding }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Outstanding" name="total_outstanding"
                        value="{{ $data->outstanding_type }}" disabled />

                    @if ($data->outstanding_types == 'Penjualan')
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Outstanding Penjualan"
                            name="outstanding_sales" prefix="Rp" value="{{ $data->outstanding_sales }}" disabled />
                    @elseif ($data->outstanding_types == 'COD')
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Outstanding COD" name="outstanding_cod"
                            prefix="Rp" value="{{ $data->outstanding_cod }}" disabled />
                    @elseif ($data->outstanding_types == 'Keduanya')
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Outstanding Penjualan"
                            name="outstanding_sales" prefix="Rp" value="{{ $data->outstanding_sales }}" disabled />
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Outstanding COD" name="outstanding_cod"
                            prefix="Rp" value="{{ $data->outstanding_cod }}" disabled />
                    @endif

                    <hr>

                    <div class="col-sm-3">
                        <h4>Periode Outstanding :</h4>
                    </div>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Sejak Kapan" name="outstanding_start"
                        type="date" value="{{ $data->outstanding_start }}" disabled />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Sampai Kapan" name="outstanding_end"
                        type="date" value="{{ $data->outstanding_end }}" disabled />
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-sm-12">
                    <x-textarea label="Kronologis Singkat Kejadian:" name="incident_chronology" disabled>
                        {{ $data->incident_chronology }}
                    </x-textarea>
                </div>
            </div>

            <hr>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Upload Dokumen :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Disposisi Management*"
                        name="file_management_disposition" type="download"
                        path="{{ route('download.litigation', [substr($data->file_management_disposition, 11)]) }}">Unduh
                        <i class="fa fa-download"></i>
                    </x-file>
                    @if ($data->file_deed_of_incoporation)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="2. Akta Pendirian dan Perubahan Terakhir" name="file_deed_of_incoporation"
                            type="download"
                            path="{{ route('download.litigation', [substr($data->file_deed_of_incoporation, 11)]) }}">
                            Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @else
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7"
                            label="2. Akta Pendirian dan Perubahan Terakhir" value="Tidak Ada" readOnly />
                    @endif
                    @if ($data->file_sk_menkumham)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. SK Menkumham"
                            name="file_sk_menkumham" type="download"
                            path="{{ route('download.litigation', [substr($data->file_sk_menkumham, 11)]) }}">
                            Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @else
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="3. SK Menkumham" value="Tidak Ada"
                            readOnly />
                    @endif
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. KTP Direksi*"
                        name="file_director_id_card" type="download"
                        path="{{ route('download.litigation', [substr($data->file_director_id_card, 11)]) }}">Unduh
                        <i class="fa fa-download"></i>
                    </x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. NPWP*" name="file_npwp"
                        type="download" path="{{ route('download.litigation', [substr($data->file_npwp, 11)]) }}">Unduh
                        <i class="fa fa-download"></i>
                    </x-file>
                    @if ($data->file_nib)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. NIB" name="file_nib"
                            type="download" path="{{ route('download.litigation', [substr($data->file_nib, 11)]) }}">
                            Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @else
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="6. NIB" value="Tidak Ada"
                            readOnly />
                    @endif
                    @if ($data->file_business_permit)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Izin Usaha/OSS"
                            name="file_business_permit" type="download"
                            path="{{ route('download.litigation', [substr($data->file_business_permit, 11)]) }}">
                            Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @else
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Izin Usaha/OSS" value="Tidak Ada"
                            readOnly />
                    @endif
                    @if ($data->file_location_permit)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Izin Lokasi/OSS"
                            name="file_location_permit" type="download"
                            path="{{ route('download.litigation', [substr($data->file_location_permit, 11)]) }}">
                            Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @else
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Izin Lokasi/OSS"
                            value="Tidak Ada" readOnly />
                    @endif
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Rekapan Outstanding*" type="download"
                        name="file_outstanding_recap"
                        path="{{ route('download.litigation', [substr($data->file_outstanding_recap, 11)]) }}">Unduh
                        <i class="fa fa-download"></i>
                    </x-file>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="10. Scan Surat Penagihan*"
                        name="file_billing_letter" type="download"
                        path="{{ route('download.litigation', [substr($data->file_billing_letter, 11)]) }}">Unduh
                        <i class="fa fa-download"></i>
                    </x-file>
                    @if ($data->file_internal_memo)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="11. Internal Memo Kurang Dokumen"
                            name="file_internal_memo" type="download"
                            path="{{ route('download.litigation', [substr($data->file_internal_memo, 11)]) }}">
                            Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @else
                        <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="11. Internal Memo Kurang Dokumen"
                            value="Tidak Ada" readOnly />
                    @endif
                </div>
            </div>

            <hr>

            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Packing List Outstanding"
                name="outstanding_packing_list" value="{{ $data->outstanding_packing_list }}" type="text" disabled />

            <hr>

            <div class="row">
                <div class="col-sm-3">
                    <h5>Catatan Dari Legal :</h5>
                </div>
                <div class="col-sm-9">
                    @if ($data->file_subpoena_draft)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. File Draft Somasi"
                            name="file_subpoena_draft" type="download"
                            path="{{ route('download.litigation', [substr($data->file_subpoena_draft, 11)]) }}">
                            Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @endif
                    <x-textarea label="Advice untuk User:" name="legal_advice" disabled>{{ $data->legal_advice }}
                    </x-textarea>
                    @if ($data->file_subpoena_signature)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Scan Somasi yang Ditandatangani"
                            name="file_subpoena_signature" type="download"
                            path="{{ route('download.litigation', [substr($data->file_subpoena_signature, 11)]) }}">
                            Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @endif
                    @if ($data->file_subpoena_2)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="a. File Somasi II"
                            name="file_subpoena_2" type="download"
                            path="{{ route('download.litigation', [substr($data->file_subpoena_2, 11)]) }}">
                            Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @endif
                    @if ($data->file_agreement_draft)
                        <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="b. File Draft Kesepakatan"
                            name="file_agreement_draft" type="download"
                            path="{{ route('download.litigation', [substr($data->file_agreement_draft, 11)]) }}">
                            Unduh
                            <i class="fa fa-download"></i>
                        </x-file>
                    @endif
                </div>
            </div>

            <hr>

            <p>Apabila belum selesai isi tab dibawah ini dan klik kirim</p>

            <div class="row">
                <div class="col-sm-3">
                    <h5>Update User :</h5>
                </div>
                <div class="col-sm-9">
                    <x-textarea label="Update dari User:" name="user_update" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Tanggapan Somasi Agen"
                        name="file_subpoena_agent_response" option />
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Selesai" value="Selesai" buttonClass="btn-primary me-3" />
                <x-button type="submit" name="Kirim" value="Kirim" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
