@extends('layouts.legal')

@section('title')
    Detail Database
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
                    <table class="table table-bordered">
                        @if ($database->privilege == 'ALL')
                            <tr class="">
                                <th scope="row" style="width: 30%;" class="text-end">Nama Peraturan</th>
                                <td>{{ Str::limit($database->title, 40, '...') }}
                                </td>
                            </tr>
                        @else
                            <tr class="">
                                <th scope="row" style="width: 30%;" class="text-end">Nama Dokumen</th>
                                <td>{{ Str::limit($database->title, 40, '...') }}
                                </td>
                            </tr>
                        @endif
                        @if ($database->code)
                            <tr class="">
                                <th scope="row" class="text-end">Kode Dokumen</th>
                                <td>{{ $database->code }}</td>
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
                        {{-- @if ($database->agency)
                            @if ($database->privilege == 'ALL')
                                <tr>
                                    <th scope="row" class="text-end">Direktorat/Divisi/Departement</th>
                                    <td>{{ $database->agency }}</td>
                                </tr>
                            @else
                                @if ($database->type != 'Perjanjian')
                                    <tr>
                                        <th scope="row" class="text-end">Dikeluarkan/Mitra</th>
                                        <td>{{ $database->agency }}</td>
                                    </tr>
                                @endif
                            @endif
                        @endif --}}
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
                                <th scope="row" class="text-end">Tanggal Penerbitan</th>
                                <td>{{ date('d/m/Y', strtotime($database->date)) }}</td>
                            </tr>
                        @endif
                        @if ($database->name)
                            @if ($database->unit == 'Sertifikat Saham')
                                <tr class="">
                                    <th scope="row" class="text-end">Nama Pemegang Saham</th>
                                    <td>{{ $database->name }} </td>
                                </tr>
                            @endif
                        @endif
                        @if ($database->about)
                            <tr class="">
                                <th scope="row" class="text-end">Tentang</th>
                                @if (
                                    $database->unit == 'Identitas Direksi' ||
                                        $database->unit == 'Identitas Dewan Komisaris' ||
                                        $database->unit == 'Identitas Pemegang Saham')
                                    <td> {{ $database->about }}</td>
                                @else
                                    <td>{{ $database->about }}</td>
                                @endif
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
                        @if ($database->share_amount_value)
                            <tr>
                                <th scope="row" class="text-end">Nilai Nominal Saham</th>
                                <td>Rp. {{ $database->share_amount_value }}</td>
                            </tr>
                        @endif
                        @if ($database->authorized_person)
                            <tr>
                                <th scope="row" class="text-end">Penerima Kuasa</th>
                                <td>{{ $database->authorized_person }}</td>
                            </tr>
                        @endif
                        @if ($database->province)
                            <tr>
                                <th scope="row" class="text-end">Provinsi</th>
                                @php
                                    $province = DB::table('provinces')
                                        ->where('id', $database->province)
                                        ->first();
                                @endphp
                                <td>{{ $province->name }}</td>
                            </tr>
                        @endif
                        @if ($database->regency)
                            <tr>
                                <th scope="row" class="text-end">Kab/Kota</th>
                                @php
                                    $regency = DB::table('regencies')
                                        ->where('id', $database->regency)
                                        ->first();
                                @endphp
                                <td>{{ $regency->name }}</td>
                            </tr>
                        @endif
                        @if ($database->district)
                            <tr>
                                <th scope="row" class="text-end">Kecamatan</th>
                                @php
                                    $district = DB::table('districts')
                                        ->where('id', $database->district)
                                        ->first();
                                @endphp
                                <td>{{ $district->name }}</td>
                            </tr>
                        @endif
                        @if ($database->village)
                            <tr>
                                <th scope="row" class="text-end">Kelurahan</th>
                                @php
                                    $village = DB::table('villages')
                                        ->where('id', $database->village)
                                        ->first();
                                @endphp
                                <td>{{ $village->name }}</td>
                            </tr>
                        @endif
                        @if ($database->address)
                            <tr>
                                <th scope="row" class="text-end">Alamat</th>
                                <td>{{ $database->address }}</td>
                            </tr>
                        @endif
                        @if ($database->zip_code)
                            <tr>
                                <th scope="row" class="text-end">Kode Pos</th>
                                <td>{{ $database->zip_code }}</td>
                            </tr>
                        @endif
                        @if ($database->size)
                            <tr>
                                <th scope="row" class="text-end">Ukuran</th>
                                <td>{{ $database->size }}</td>
                            </tr>
                        @endif
                        @if ($database->date_awal)
                            <tr>
                                <th scope="row" class="text-end">Jangka Waktu Awal</th>
                                <td>{{ date('d/m/Y', strtotime($database->date_awal)) }}</td>
                            </tr>
                        @endif
                        @if ($database->date_akhir)
                            <tr>
                                <th scope="row" class="text-end">Jangka Waktu Akhir</th>
                                <td>{{ date('d/m/Y', strtotime($database->date_akhir)) }}</td>
                            </tr>
                        @endif
                        @if ($database->legal_name)
                            <tr>
                                <th scope="row" class="text-end">Badan Hukum</th>
                                <td>{{ $database->legal_name }}</td>
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
                        @if ($database->landlord)
                            <tr>
                                <th scope="row" class="text-end">Landlord</th>
                                <td>{{ $database->landlord }}</td>
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
                                <th scope="row" class="text-end">Isi Akta</th>
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
                        @if ($database->modal_dasar)
                            <tr>
                                <th scope="row" class="text-end">Modal Dasar</th>
                                <td>Rp. {{ number_format($database->modal_dasar, 0, ',', '.') }}</td>
                            </tr>
                        @endif
                        @if ($database->modal_disetor)
                            <tr>
                                <th scope="row" class="text-end">Modal Disetor</th>
                                <td>Rp. {{ number_format($database->modal_disetor, 0, ',', '.') }}</td>
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
                        @if ($database->pic_no)
                            <tr>
                                <th scope="row" class="text-end">Nomor PIC</th>
                                <td>{{ $database->pic_no }}</td>
                            </tr>
                        @endif
                        @if ($database->pic_email)
                            <tr>
                                <th scope="row" class="text-end">Email PIC</th>
                                <td>{{ $database->pic_email }}</td>
                            </tr>
                        @endif
                    </table>
                    @if (count($dataTopLevel) > 0)
                        <label for=""> <strong>Identitas Pengurus Perseroan</strong></label>
                        <table class="table table-bordered table-striped table-responsive">
                            <thead>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Negara Asal</th>
                                <th>Jabatan</th>
                                <th>Masa Jabatan</th>
                                <th>Jumlah Saham</th>
                            </thead>
                            <tbody>
                                @foreach ($dataTopLevel as $item)
                                    <tr>
                                        <td>{{ $dataTopLevel->firstItem() + $loop->index }}</td>
                                        <td>{{ $item->name }}</td>
                                        <td>{{ $item->country }}</td>
                                        <td>{{ $item->position }}</td>
                                        <td>{{ date('d-m-Y', strtotime($item->date_awal)) }} s/d
                                            {{ date('d-m-Y', strtotime($item->date_akhir)) }}
                                        </td>
                                        <td>{{ $item->share_amount }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{ $dataTopLevel->links('vendor.pagination.custom') }}
                    @endif
                    @if ($database->type == 'Litigasi' && $database->category == 'Customer Dispute')
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <th>Tanggal Pengiriman </th>
                                <td>{{ $dataLitigation->shipping_date }} </td>
                                <th>Nama Penerima</th>
                                <td>{{ $dataLitigation->receiver_name }}</td>
                            </tr>
                            <tr>
                                <th>Nama Pengirim </th>
                                <td>{{ $dataLitigation->sender_name }}</td>
                                <th>Provinsi Penerima</th>
                                <td>@php
                                    $province = DB::table('provinces')
                                        ->where('id', $dataLitigation->receiver_province)
                                        ->first();
                                @endphp
                                    {{ $province->name }}
                                </td>
                            </tr>
                            <tr>
                                <th>Provinsi Pengirim </th>
                                <td>@php
                                    $province = DB::table('provinces')
                                        ->where('id', $dataLitigation->sender_province)
                                        ->first();
                                @endphp
                                    {{ $province->name }}</td>
                                <th>Kab/Kota Penerima</th>
                                <td>@php
                                    $regency = DB::table('regencies')
                                        ->where('id', $dataLitigation->receiver_regency)
                                        ->first();
                                @endphp
                                    {{ $regency->name }}</td>
                            </tr>
                            <tr>
                                <th>Kab/Kota Pengirim </th>
                                <td>@php
                                    $regency = DB::table('regencies')
                                        ->where('id', $dataLitigation->sender_regency)
                                        ->first();
                                @endphp
                                    {{ $regency->name }}</td>
                                <th>Kecamatan Penerima</th>
                                <td>@php
                                    $district = DB::table('districts')
                                        ->where('id', $dataLitigation->receiver_district)
                                        ->first();
                                @endphp
                                    {{ $district->name }}</td>
                            </tr>
                            <tr>
                                <th>Kecamatan Pengirim </th>
                                <td>@php
                                    $district = DB::table('districts')
                                        ->where('id', $dataLitigation->sender_district)
                                        ->first();
                                @endphp
                                    {{ $district->name }}</td>
                                <th>Kelurahan Penerima</th>
                                <td>@php
                                    $village = DB::table('villages')
                                        ->where('id', $dataLitigation->receiver_village)
                                        ->first();
                                @endphp
                                    {{ $village->name }}</td>
                            </tr>
                            <tr>
                                <th>Kelurahan Pengirim </th>
                                <td>@php
                                    $village = DB::table('villages')
                                        ->where('id', $dataLitigation->sender_village)
                                        ->first();
                                @endphp
                                    {{ $village->name }}</td>
                                <th>Kode Pos Penerima</th>
                                <td>{{ $dataLitigation->receiver_zip_code }}</td>
                            </tr>
                            <tr>
                                <th>Kode Pos Pengirim </th>
                                <td>{{ $dataLitigation->sender_zip_code }}</td>
                                <th>Alamat Penerima</th>
                                <td>{{ $dataLitigation->receiver_address }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Pengirim </th>
                                <td>{{ $dataLitigation->sender_address }}</td>
                                <th>Nomor Telpon Penerima</th>
                                <td>{{ $dataLitigation->receiver_phone_number }}</td>
                            </tr>
                            <tr>
                                <th>Nomor Telpon Pengirim </th>
                                <td>{{ $dataLitigation->sender_phone_number }}</td>
                                <th>Total Kerugian/Klaim</th>
                                <td>Rp. {{ number_format($dataLitigation->total_loss, 0, ',', '.') }} </td>
                            </tr>
                            <tr>
                                <th>Jenis Kasus </th>
                                <td>{{ $dataLitigation->case_type }}</td>
                                <th>Nominal Barang</th>
                                <td>Rp. {{ number_format($dataLitigation->item_nominal, 0, ',', '.') }}</td>
                            </tr>
                            <tr>
                                <th>Faktor Penyebab </th>
                                @if ($dataLitigation->causative_factor == 'Lainnya')
                                    <td>{{ $dataLitigation->causative_factor }}
                                        {{ $dataLitigation->causative_factor_others }}</td>
                                @else
                                    <td>{{ $dataLitigation->causative_factor }}</td>
                                @endif
                                <th>Connote/Perjanjian</th>
                                <td>{{ $dataLitigation->connote }}</td>
                            </tr>
                            <tr>
                                <th>Kronologis Singkat </th>
                                <td>{{ $dataLitigation->incident_chronology }}</td>
                                <th>Jenis Pengiriman</th>
                                <td>{{ $dataLitigation->shipping_type }}</td>
                            </tr>
                            <tr>
                                <th>Bentuk Kiriman </th>
                                @if ($dataLitigation->shipping_form == 'Lain-Lain')
                                    <td>{{ $dataLitigation->shipping_form }}
                                        {{ $dataLitigation->detail_shipping_form }}</td>
                                @else
                                    <td>{{ $dataLitigation->shipping_form }}</td>
                                @endif
                                <th>Asuransi</th>
                                @if ($dataLitigation->assurance == 'Ada')
                                    <td>{{ $dataLitigation->assurance }}
                                        Rp. {{ number_format($dataLitigation->assurance_nominal, 0, ',', '.') }}</td>
                                @else
                                    <td>{{ $dataLitigation->assurance }}</td>
                                @endif
                            </tr>
                        </table>
                    @endif
                    @if ($database->type == 'Litigasi' && $database->category == 'Others')
                        <table class="table table-bordered table-responsive">
                            <tr>
                                <th>Nama Penggugat </th>
                                <td>{{ $dataLitigation->sender_name }} </td>
                            </tr>
                            <tr>
                                <th>Nama Tergugat </th>
                                <td>{{ $dataLitigation->receiver_name }}</td>
                            </tr>
                            <tr>
                                <th>Provinsi Penggugat/Tergugat </th>
                                <td>@php
                                    $province = DB::table('provinces')
                                        ->where('id', $dataLitigation->sender_province)
                                        ->first();
                                @endphp
                                    {{ $province->name }}</td>
                            <tr>
                                <th>Kab/Kota Penggugat/Tergugat </th>
                                <td>@php
                                    $regency = DB::table('regencies')
                                        ->where('id', $dataLitigation->sender_regency)
                                        ->first();
                                @endphp
                                    {{ $regency->name }}</td>
                            </tr>
                            <tr>
                                <th>Kecamatan Penggugat/Tergugat </th>
                                <td>@php
                                    $district = DB::table('districts')
                                        ->where('id', $dataLitigation->sender_district)
                                        ->first();
                                @endphp
                                    {{ $district->name }}</td>
                            </tr>
                            <tr>
                                <th>Kelurahan Penggugat/Tergugat </th>
                                <td>@php
                                    $village = DB::table('villages')
                                        ->where('id', $dataLitigation->sender_village)
                                        ->first();
                                @endphp
                                    {{ $village->name }}</td>
                            </tr>
                            <tr>
                                <th>Kode Pos Penggugat/Tergugat </th>
                                <td>{{ $dataLitigation->sender_zip_code }}</td>
                            </tr>
                            <tr>
                                <th>Alamat Penggugat/Tergugat </th>
                                <td>{{ $dataLitigation->sender_address }}</td>
                            </tr>
                            <tr>
                                <th>Kronologis Singkat </th>
                                <td>{{ $dataLitigation->incident_chronology }}</td>
                            </tr>
                        </table>
                    @endif
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
                        @foreach ($dataFile as $file)
                            <div class="row">
                                <a href="{{ asset($file->filepath) }}" style="color: #fe1717" target="_blank">
                                    <i class="fa fa-file-pdf" style="font-size: 100px;"></i>
                                </a>
                                @if ($database->type == 'Litigasi')
                                    <p style="word-break: break-all">{{ $file->name . ' ' }}
                                        {{ Str::substr($file->filepath, 11) }}</p>
                                @else
                                    <p style="word-break: break-all">{{ Str::substr($file->filepath, 11) }}</p>
                                @endif
                            </div>
                        @endforeach
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
