@extends('layouts.legal')

@section('title')
    Detail Peraturan
@endsection

@section('content')
    <x-base>
        <div class="row">
            <div class="col-sm-12">
                <div class="col px-3 py-3" style="background-color: rgb(239, 236, 236); border-radius: 10px;">
                    <nav style="--bs-breadcrumb-divider: '>'; margin-top: -5px; margin-bottom: -18px" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('legal-home') }}" style="color:#fe1717">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('legal.regulation.index') }}"
                                    style="color:#fe1717">Database</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Detail</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif

        <div class="row mt-3">
            <div class="col-sm-8">
                <div style="background-color:#fe3f40">
                    <div class="col px-4 py-3" style="color: white">
                        <i class="fa-solid fa-align-left"></i>
                        <span>Detail Dokumen</span>
                    </div>
                </div>
                <div class="p-3 border bg-white">
                    <div class="border rounded">
                        <table class="table table-bordered">
                            @if ($database->privilege == 'ALL')
                                <tr class="">
                                    <th scope="row" style="width: 30%;" class="text-end">Nama Peraturan</th>
                                    <td>{{ Str::limit($database->type, 40, '...') }}
                                        No {{ $database->number }} Tahun
                                        {{ date('Y', strtotime($database->date)) }}
                                    </td>
                                </tr>
                            @else
                                <tr class="">
                                    <th scope="row" style="width: 30%;" class="text-end">Nama Dokumen</th>
                                    <td>{{ Str::limit($database->type, 40, '...') }}
                                        No {{ $database->number }} Tahun
                                        {{ date('Y', strtotime($database->date)) }}
                                    </td>
                                </tr>
                            @endif
                            @if ($database->type)
                                <tr class="">
                                    <th scope="row" class="text-end">Tipe Dokumen</th>
                                    <td>{{ $database->type }}</td>
                                </tr>
                            @endif
                            @if ($database->unit)
                                <tr class="">
                                    <th scope="row" class="text-end">Unit</th>
                                    <td>{{ $database->unit }}</td>
                                </tr>
                            @endif
                            @if ($database->agency)
                                @if ($database->privilege == 'ALL')
                                    <tr>
                                        <th scope="row" class="text-end">Direktorat/Divisi/Departement</th>
                                        <td>{{ $database->agency }}</td>
                                    </tr>
                                @else
                                    <tr>
                                        <th scope="row" class="text-end">Dikeluarkan/Mitra</th>
                                        <td>{{ $database->agency }}</td>
                                    </tr>
                                @endif
                            @endif
                            @if ($database->number)
                                @if ($database->privilege == 'ALL')
                                    <tr class="">
                                        <th scope="row" class="text-end">Nomor Peraturan</th>
                                        <td>{{ $database->number }}</td>
                                    </tr>
                                @else
                                    <tr class="">
                                        <th scope="row" class="text-end">Nomor Dokumen</th>
                                        <td>{{ $database->number }}</td>
                                    </tr>
                                @endif
                            @endif
                            @if ($database->date)
                                <tr>
                                    <th scope="row" class="text-end">Tanggal</th>
                                    <td>{{ $database->date }}</td>
                                </tr>
                            @endif
                            @if ($database->about)
                                <tr class="">
                                    <th scope="row" class="text-end">Tentang</th>
                                    <td>{{ $database->about }}</td>
                                </tr>
                            @endif
                            @if ($database->set_date)
                                <tr>
                                    <th scope="row" class="text-end">Tgl Ditetapkan</th>
                                    <td>{{ $database->set_date }}</td>
                                </tr>
                            @endif
                            @if ($database->historical_id)
                                <tr>
                                    <th scope="row" class="text-end">Dokumen Sebelumnya</th>
                                    <td><a style="color: brown"
                                            href="{{ route('legal.regulation.detail', [$database->historical_id]) }}">Klik
                                            Disini Untuk Melihat Peraturan</a></td>
                                </tr>
                            @else
                            @endif
                            @if ($database->share_amount)
                                <tr>
                                    <th scope="row" class="text-end">Jumlah Saham</th>
                                    <td>{{ $database->share_amount }}</td>
                                </tr>
                            @endif
                            @if ($database->authorized_person)
                                <tr>
                                    <th scope="row" class="text-end">Penerima Kuasa</th>
                                    <td>{{ $database->authorized_person }}</td>
                                </tr>
                            @endif
                            @if ($database->validity_period)
                                <tr>
                                    <th scope="row" class="text-end">Masa Berlaku</th>
                                    <td>{{ $database->validity_period }}</td>
                                </tr>
                            @endif
                            @if ($database->province)
                                <tr>
                                    <th scope="row" class="text-end">Provinsi</th>
                                    <td>{{ $database->province }}</td>
                                </tr>
                            @endif
                            @if ($database->regency)
                                <tr>
                                    <th scope="row" class="text-end">Kab/Kota</th>
                                    <td>{{ $database->regency }}</td>
                                </tr>
                            @endif
                            @if ($database->district)
                                <tr>
                                    <th scope="row" class="text-end">Kecamatan</th>
                                    <td>{{ $database->district }}</td>
                                </tr>
                            @endif
                            @if ($database->village)
                                <tr>
                                    <th scope="row" class="text-end">Kelurahan</th>
                                    <td>{{ $database->village }}</td>
                                </tr>
                            @endif
                            @if ($database->address)
                                <tr>
                                    <th scope="row" class="text-end">Alamat</th>
                                    <td>{{ $database->address }}</td>
                                </tr>
                            @endif
                            @if ($database->size)
                                <tr>
                                    <th scope="row" class="text-end">Ukuran</th>
                                    <td>{{ $database->size }}</td>
                                </tr>
                            @endif
                            @if ($database->tax_value)
                                <tr>
                                    <th scope="row" class="text-end">Nilai Pajak</th>
                                    <td>{{ $database->tax_value }}</td>
                                </tr>
                            @endif
                            @if ($database->ads_text)
                                <tr>
                                    <th scope="row" class="text-end">Teks Reklame</th>
                                    <td>{{ $database->ads_text }}</td>
                                </tr>
                            @endif
                            @if ($database->periodic_report)
                                <tr>
                                    <th scope="row" class="text-end">Laporan Berkala</th>
                                    <td>{{ $database->periodic_report }}</td>
                                </tr>
                            @endif
                            @if ($database->wltk)
                                <tr>
                                    <th scope="row" class="text-end">WLTK</th>
                                    <td>{{ $database->wltk }}</td>
                                </tr>
                            @endif
                            @if ($database->bpjs)
                                <tr>
                                    <th scope="row" class="text-end">BPJS</th>
                                    <td>{{ $database->bpjs }}</td>
                                </tr>
                            @endif
                            @if ($database->pp)
                                <tr>
                                    <th scope="row" class="text-end">PP</th>
                                    <td>{{ $database->pp }}</td>
                                </tr>
                            @endif
                            @if ($database->lks)
                                <tr>
                                    <th scope="row" class="text-end">LKS</th>
                                    <td>{{ $database->lks }}</td>
                                </tr>
                            @endif
                            @if ($database->p2k3)
                                <tr>
                                    <th scope="row" class="text-end">P2K3</th>
                                    <td>{{ $database->p2k3 }}</td>
                                </tr>
                            @endif
                            @if ($database->smk3)
                                <tr>
                                    <th scope="row" class="text-end">SMK3</th>
                                    <td>{{ $database->smk3 }}</td>
                                </tr>
                            @endif
                            @if ($database->time_period)
                                <tr>
                                    <th scope="row" class="text-end">Jangka Waktu</th>
                                    <td>{{ $database->time_period }}</td>
                                </tr>
                            @endif
                            @if ($database->landlord)
                                <tr>
                                    <th scope="row" class="text-end">Landlord</th>
                                    <td>{{ $database->landlord }}</td>
                                </tr>
                            @endif
                            @if ($database->other)
                                <tr>
                                    <th scope="row" class="text-end">Others</th>
                                    <td>{{ $database->other }}</td>
                                </tr>
                            @endif
                            @if ($database->agreement_title)
                                <tr>
                                    <th scope="row" class="text-end">Judul Perjanjian</th>
                                    <td>{{ $database->agreement_title }}</td>
                                </tr>
                            @endif
                            @if ($database->body)
                                <tr>
                                    <th scope="row" class="text-end">Isi</th>
                                    <td>{{ $database->body }}</td>
                                </tr>
                            @endif
                            @if ($database->agreement_type)
                                <tr>
                                    <th scope="row" class="text-end">Jenis Perjanjian</th>
                                    <td>{{ $database->agreement_type }}</td>
                                </tr>
                            @endif
                            @if ($database->user)
                                <tr>
                                    <th scope="row" class="text-end">User</th>
                                    <td>{{ $database->user }}</td>
                                </tr>
                            @endif
                            @if ($database->rental_value)
                                <tr>
                                    <th scope="row" class="text-end">Nilai Sewa</th>
                                    <td>{{ $database->rental_value }}</td>
                                </tr>
                            @endif
                            @if ($database->agent_type)
                                <tr>
                                    <th scope="row" class="text-end">Tipe Agen</th>
                                    <td>{{ $database->agent_type }}</td>
                                </tr>
                            @endif
                            @if ($database->branch_name)
                                <tr>
                                    <th scope="row" class="text-end">Nama Cabang Utama</th>
                                    <td>{{ $database->branch_name }}</td>
                                </tr>
                            @endif
                            @if ($database->partner_name)
                                <tr>
                                    <th scope="row" class="text-end">Nama Mitra</th>
                                    <td>{{ $database->partner_name }}</td>
                                </tr>
                            @endif
                            @if ($database->working_area)
                                <tr>
                                    <th scope="row" class="text-end">Wilayah Kerja</th>
                                    <td>{{ $database->working_area }}</td>
                                </tr>
                            @endif
                            @if ($database->title_deed)
                                <tr>
                                    <th scope="row" class="text-end">Judul Akta</th>
                                    <td>{{ $database->title_deed }}</td>
                                </tr>
                            @endif
                            @if ($database->notary_name)
                                <tr>
                                    <th scope="row" class="text-end">Notaris</th>
                                    <td>{{ $database->notary_name }}</td>
                                </tr>
                            @endif
                            @if ($database->director_name)
                                <tr>
                                    <th scope="row" class="text-end">Nama Direksi</th>
                                    <td>{{ $database->director_name }}</td>
                                </tr>
                            @endif
                            @if ($database->director_name1)
                                <tr>
                                    <th scope="row" class="text-end">Nama Direksi</th>
                                    <td>{{ $database->director_name1 }}</td>
                                </tr>
                            @endif
                            @if ($database->director_name2)
                                <tr>
                                    <th scope="row" class="text-end">Nama Direksi</th>
                                    <td>{{ $database->director_name2 }}</td>
                                </tr>
                            @endif
                            @if ($database->director_name3)
                                <tr>
                                    <th scope="row" class="text-end">Nama Direksi</th>
                                    <td>{{ $database->director_name3 }}</td>
                                </tr>
                            @endif
                            @if ($database->comms_term_arr)
                                <tr>
                                    <th scope="row" class="text-end">Masa Jabatan Direksi</th>
                                    <td>{{ $database->comms_term_arr }} ({{ $database->comms_term_arr_share }})</td>
                                </tr>
                            @endif
                            @if ($database->comms_term_arr1)
                                <tr>
                                    <th scope="row" class="text-end">Masa Jabatan Direksi</th>
                                    <td>{{ $database->comms_term_arr1 }} ({{ $database->comms_term_arr_share1 }})</td>
                                </tr>
                            @endif
                            @if ($database->comms_term_arr2)
                                <tr>
                                    <th scope="row" class="text-end">Masa Jabatan Direksi</th>
                                    <td>{{ $database->comms_term_arr2 }} ({{ $database->comms_term_arr_share2 }})</td>
                                </tr>
                            @endif
                            @if ($database->comms_term_arr3)
                                <tr>
                                    <th scope="row" class="text-end">Masa Jabatan Direksi</th>
                                    <td>{{ $database->comms_term_arr3 }} ({{ $database->comms_term_arr_share3 }})</td>
                                </tr>
                            @endif
                            @if ($database->comms_name)
                                <tr>
                                    <th scope="row" class="text-end">Nama Komisaris</th>
                                    <td>{{ $database->comms_name }} ({{ $database->comms_name_share }})</td>
                                </tr>
                            @endif
                            @if ($database->comms_name1)
                                <tr>
                                    <th scope="row" class="text-end">Nama Komisaris</th>
                                    <td>{{ $database->comms_name1 }} ({{ $database->comms_name_share1 }})</td>
                                </tr>
                            @endif
                            @if ($database->comms_name2)
                                <tr>
                                    <th scope="row" class="text-end">Nama Komisaris</th>
                                    <td>{{ $database->comms_name2 }} ({{ $database->comms_name_share2 }})</td>
                                </tr>
                            @endif
                            @if ($database->comms_name3)
                                <tr>
                                    <th scope="row" class="text-end">Nama Komisaris</th>
                                    <td>{{ $database->comms_name3 }} ({{ $database->comms_name_share3 }})</td>
                                </tr>
                            @endif
                            @if ($database->comms_term)
                                <tr>
                                    <th scope="row" class="text-end">Masa Jabatan Komisaris</th>
                                    <td>{{ $database->comms_term }} ({{ $database->comms_term_share }})</td>
                                </tr>
                            @endif
                            @if ($database->comms_term1)
                                <tr>
                                    <th scope="row" class="text-end">Masa Jabatan Komisaris</th>
                                    <td>{{ $database->comms_term1 }} ({{ $database->comms_term_share1 }})</td>
                                </tr>
                            @endif
                            @if ($database->comms_term2)
                                <tr>
                                    <th scope="row" class="text-end">Masa Jabatan Komisaris</th>
                                    <td>{{ $database->comms_term2 }} ({{ $database->comms_term_share2 }})</td>
                                </tr>
                            @endif
                            @if ($database->comms_term3)
                                <tr>
                                    <th scope="row" class="text-end">Masa Jabatan Komisaris</th>
                                    <td>{{ $database->comms_term3 }} ({{ $database->comms_term_share3 }})</td>
                                </tr>
                            @endif
                            @if ($database->comms_arr)
                                <tr>
                                    <th scope="row" class="text-end">Susunan Pemegang Saham</th>
                                    <td>{{ $database->comms_arr }} ({{ $database->comms_arr_share }})</td>
                                </tr>
                            @endif
                            @if ($database->comms_arr1)
                                <tr>
                                    <th scope="row" class="text-end">Susunan Pemegang Saham</th>
                                    <td>{{ $database->comms_arr1 }} ({{ $database->comms_arr_share1 }})</td>
                                </tr>
                            @endif
                            @if ($database->comms_arr2)
                                <tr>
                                    <th scope="row" class="text-end">Susunan Pemegang Saham</th>
                                    <td>{{ $database->comms_arr2 }} ({{ $database->comms_arr_share2 }})</td>
                                </tr>
                            @endif
                            @if ($database->comms_arr3)
                                <tr>
                                    <th scope="row" class="text-end">Susunan Pemegang Saham</th>
                                    <td>{{ $database->comms_arr3 }} ({{ $database->comms_arr_share3 }})</td>
                                </tr>
                            @endif
                            @if ($database->sk_type)
                                <tr>
                                    <th scope="row" class="text-end">Jenis SK</th>
                                    <td>{{ $database->sk_type }}</td>
                                </tr>
                            @endif
                            @if ($database->ktp)
                                <tr>
                                    <th scope="row" class="text-end">KTP</th>
                                    <td>{{ $database->ktp }}</td>
                                </tr>
                            @endif
                            @if ($database->npwp)
                                <tr>
                                    <th scope="row" class="text-end">NPWP</th>
                                    <td>{{ $database->npwp }}</td>
                                </tr>
                            @endif
                            @if ($database->kk)
                                <tr>
                                    <th scope="row" class="text-end">KK</th>
                                    <td>{{ $database->kk }}</td>
                                </tr>
                            @endif
                            @if ($database->passport)
                                <tr>
                                    <th scope="row" class="text-end">Passport</th>
                                    <td>{{ $database->passport }}</td>
                                </tr>
                            @endif
                            @if ($database->kbli)
                                <tr>
                                    <th scope="row" class="text-end">KBLI</th>
                                    <td>{{ $database->kbli }}</td>
                                </tr>
                            @endif
                            @if ($database->ttl)
                                <tr>
                                    <th scope="row" class="text-end">Tempat, Tanggal Lahir</th>
                                    <td>{{ $database->ttl }}</td>
                                </tr>
                            @endif
                            @if ($database->surface_area)
                                <tr>
                                    <th scope="row" class="text-end">Luas Tanah</th>
                                    <td>{{ $database->surface_area }}</td>
                                </tr>
                            @endif
                            @if ($database->measure_number)
                                <tr>
                                    <th scope="row" class="text-end">Nomor Surat Ukur</th>
                                    <td>{{ $database->measure_number }}</td>
                                </tr>
                            @endif
                            @if ($database->nop)
                                <tr>
                                    <th scope="row" class="text-end">NOP</th>
                                    <td>{{ $database->nop }}</td>
                                </tr>
                            @endif
                            @if ($database->njop)
                                <tr>
                                    <th scope="row" class="text-end">NJOP</th>
                                    <td>{{ $database->njop }}</td>
                                </tr>
                            @endif
                            @if ($database->pbb)
                                <tr>
                                    <th scope="row" class="text-end">PBB</th>
                                    <td>{{ $database->pbb }}</td>
                                </tr>
                            @endif
                            @if ($database->retribution)
                                <tr>
                                    <th scope="row" class="text-end">Retribusi</th>
                                    <td>{{ $database->retribution }}</td>
                                </tr>
                            @endif
                            @if ($database->location)
                                <tr>
                                    <th scope="row" class="text-end">Lokasi</th>
                                    <td>{{ $database->location }}</td>
                                </tr>
                            @endif
                            @if ($database->transaction_value)
                                <tr>
                                    <th scope="row" class="text-end">Nilai Transaksi</th>
                                    <td>{{ $database->transaction_value }}</td>
                                </tr>
                            @endif
                            @if ($database->ppat)
                                <tr>
                                    <th scope="row" class="text-end">PPAT</th>
                                    <td>{{ $database->ppat }}</td>
                                </tr>
                            @endif
                            @if ($database->seller_name)
                                <tr>
                                    <th scope="row" class="text-end">Nama Penjual</th>
                                    <td>{{ $database->seller_name }}</td>
                                </tr>
                            @endif
                            @if ($database->nopol)
                                <tr>
                                    <th scope="row" class="text-end">Nomor Polisi</th>
                                    <td>{{ $database->nopol }}</td>
                                </tr>
                            @endif
                            @if ($database->nobpkb)
                                <tr>
                                    <th scope="row" class="text-end">Nomor BPKB</th>
                                    <td>{{ $database->nobpkb }}</td>
                                </tr>
                            @endif
                            @if ($database->nomes)
                                <tr>
                                    <th scope="row" class="text-end">Nomor Mesin</th>
                                    <td>{{ $database->nomes }}</td>
                                </tr>
                            @endif
                            @if ($database->vehicle_type)
                                <tr>
                                    <th scope="row" class="text-end">Jenis Kendaraan</th>
                                    <td>{{ $database->vehicle_type }}</td>
                                </tr>
                            @endif
                            @if ($database->nostnk)
                                <tr>
                                    <th scope="row" class="text-end">Nomor STNK</th>
                                    <td>{{ $database->nostnk }}</td>
                                </tr>
                            @endif
                            @if ($database->content)
                                <tr>
                                    <th scope="row" class="text-end">Isi Ciptaan</th>
                                    <td>{{ $database->content }}</td>
                                </tr>
                            @endif
                            @if ($database->design_type)
                                <tr>
                                    <th scope="row" class="text-end">Jenis Desain</th>
                                    <td>{{ $database->design_type }}</td>
                                </tr>
                            @endif
                            @if ($database->building_area)
                                <tr>
                                    <th scope="row" class="text-end">Luas Bangunan</th>
                                    <td>{{ $database->building_area }}</td>
                                </tr>
                            @endif
                            @if ($database->norangka)
                                <tr>
                                    <th scope="row" class="text-end">Nomor Rangka</th>
                                    <td>{{ $database->norangka }}</td>
                                </tr>
                            @endif
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div style="background-color:#fe3f40">
                    <div class="col px-4 py-3" style="color: white">
                        <i class="fa-solid fa-align-left"></i>
                        <span>Dokumen</span>
                    </div>
                </div>
                <div class="p-3 border bg-white">
                    <div class="border rounded p-3"
                        style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                        {{-- @dd($database->data) --}}
                        @foreach ($database->data as $file)
                            <div class="row">
                                <a href="{{ asset($file->name) }}" style="color: #fe1717" target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($file->name, 11) }}</p>
                            </div>
                        @endforeach
                        @if ($database->ads_photo)
                            <div class="row">
                                <a href="{{ asset($database->ads_photo) }}" style="color: #fe1717" target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($database->ads_photo, 11) }}</p>
                            </div>
                        @endif
                        @if ($database->photo)
                            <div class="row">
                                <a href="{{ asset($database->photo) }}" style="color: #fe1717" target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($database->photo, 11) }}</p>
                            </div>
                        @endif
                        @if ($database->ktp_photo)
                            <div class="row">
                                <a href="{{ asset($database->ktp_photo) }}" style="color: #fe1717" target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($database->ktp_photo, 11) }}</p>
                            </div>
                        @endif
                        @if ($database->npwp_photo)
                            <div class="row">
                                <a href="{{ asset($database->npwp_photo) }}" style="color: #fe1717" target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($database->npwp_photo, 11) }}</p>
                            </div>
                        @endif
                        @if ($database->kk_photo)
                            <div class="row">
                                <a href="{{ asset($database->kk_photo) }}" style="color: #fe1717" target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($database->kk_photo, 11) }}</p>
                            </div>
                        @endif
                        @if ($database->passport_photo)
                            <div class="row">
                                <a href="{{ asset($database->passport_photo) }}" style="color: #fe1717"
                                    target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($database->passport_photo, 11) }}</p>
                            </div>
                        @endif
                        @if ($database->pas_photo)
                            <div class="row">
                                <a href="{{ asset($database->pas_photo) }}" style="color: #fe1717" target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($database->pas_photo, 11) }}</p>
                            </div>
                        @endif
                        @if ($database->comms_name_file)
                            <div class="row">
                                <a href="{{ asset($database->comms_name_file) }}" style="color: #fe1717"
                                    target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($database->comms_name_file, 11) }}</p>
                            </div>
                        @endif
                        @if ($database->comms_term_file)
                            <div class="row">
                                <a href="{{ asset($database->comms_term_file) }}" style="color: #fe1717"
                                    target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($database->comms_term_file, 11) }}</p>
                            </div>
                        @endif
                        @if ($database->comms_arr_file)
                            <div class="row">
                                <a href="{{ asset($database->comms_arr_file) }}" style="color: #fe1717"
                                    target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($database->comms_arr_file, 11) }}</p>
                            </div>
                        @endif
                        @if ($database->comms_term_arr_file)
                            <div class="row">
                                <a href="{{ asset($database->comms_term_arr_file) }}" style="color: #fe1717"
                                    target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($database->comms_term_arr_file, 11) }}</p>
                            </div>
                        @endif
                        @if ($database->logo_file)
                            <div class="row">
                                <a href="{{ asset($database->logo_file) }}" style="color: #fe1717" target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($database->logo_file, 11) }}</p>
                            </div>
                        @endif
                        @if ($database->file)
                            <div class="row">
                                <a href="{{ asset($database->file) }}" style="color: #fe1717" target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($database->file, 11) }}</p>
                            </div>
                        @endif
                        @if ($database->other_file)
                            <div class="row">
                                <a href="{{ asset($database->other_file) }}" style="color: #fe1717" target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                <p>{{ Str::substr($database->other_file, 11) }}</p>
                            </div>
                        @endif
                        {{-- @foreach ($database->file as $file)
                            <a href="{{ asset($database->file) }}" style="color: #fe1717" target="_blank">
                                <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                            </a>
                        @endforeach --}}
                        {{-- @if (is_array($database->file) || is_object($database->file))
                            {
                            @foreach ($database->file as $file)
                                {
                                <a href="{{ asset($database->file) }}" style="color: #fe1717" target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                }
                            @endforeach
                            }
                        @endif --}}
                    </div>
                </div>
            </div>
            @if ($database->note)
                <div class="col-sm-8 mt-4">
                    <div style="background-color:#fe3f40">
                        <div class="col px-4 py-3" style="color: white">
                            <i class="fa-solid fa-align-left"></i>
                            <span>Note Terkait Peraturan</span>
                        </div>
                    </div>
                    <div class="p-3 border bg-white">
                        <div class="border rounded p-3"
                            style="display: grid; grid-template-columns: repeat(3, 1fr); gap: 20px;">
                            <ul class="row-3">
                                {!! $database->note ?? '' !!}
                            </ul>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </x-base>
@endsection
