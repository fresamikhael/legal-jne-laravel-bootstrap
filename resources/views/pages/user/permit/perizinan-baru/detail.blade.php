@extends('layouts.user')

@section('title')
    Perizinan baru
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Perizinan Baru</h2>
        </div>
        <div class="row mt-3">

            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">No Perizinan</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $permit->id }}" name="id" disabled />
                    </div>
                </div>
            </div>
            @if ($permit->expired != null)
                <div class="mb-3 row">
                    <label for="permit_type" class="col-sm-2 col-form-label">Expired</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->expired }}" name="permit_type"
                                disabled />
                        </div>
                    </div>
                </div>
            @endif

            <div class="mb-3 row">
                <label for="permit_type" class="col-sm-2 col-form-label">Tipe Perizinan</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $permit->permit_type }}" name="permit_type"
                            disabled />
                    </div>
                </div>
            </div>

            @if ($permit->permit_type == 'IMB' || $permit->permit_type == 'SLF')
                <div class="mb-3 row">
                    <label for="location" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->location }}" name="location"
                                disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="building_area" class="col-sm-2 col-form-label">Luas Bangunan</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->building_area }}"
                                name="building_area" disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="surface_area" class="col-sm-2 col-form-label">Luas Tanah</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->surface_area }}"
                                name="surface_area" disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Alasan Permohonan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control h-100 mt-0" id="floatingTextarea2" style="height: 100px" readonly>{{ $permit->application_reason }}</textarea>
                    </div>
                </div>
            @endif

            @if ($permit->permit_type == 'Reklame')
                <div class="mb-3 row">
                    <label for="owner_name" class="col-sm-2 col-form-label">Nama Pemilik Reklame</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->owner_name }}" name="owner_name"
                                disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="ads_type" class="col-sm-2 col-form-label">Status Gedung</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->ads_type }}" name="ads_type"
                                disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="address" class="col-sm-2 col-form-label">Alamat Pemasangan</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->address }}" name="address"
                                disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="ads_title" class="col-sm-2 col-form-label">Judul Reklame</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->ads_title }}" name="ads_title"
                                disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="ads_size" class="col-sm-2 col-form-label">Ukuran Reklame</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->ads_size }}" name="ads_size"
                                disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="ads_height" class="col-sm-2 col-form-label">Ketinggian Reklame</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->ads_height }}"
                                name="ads_height" disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="ads_period" class="col-sm-2 col-form-label">Jangka Waktu Pemasangan</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->ads_period }}"
                                name="ads_period" disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="application_reason" class="col-sm-2 col-form-label">Alasan Permohonan</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->application_reason }}"
                                name="application_reason" disabled />
                        </div>
                    </div>
                </div>
            @endif

            @if ($permit->permit_type == 'OSS')
                <div class="mb-3 row">
                    <label for="branch_name" class="col-sm-2 col-form-label">Nama Cabang/Pusat</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->branch_name }}"
                                name="branch_name" disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="branch_province" class="col-sm-2 col-form-label">Provinsi</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            @php
                                $province = DB::table('provinces')
                                    ->where('id', $permit->branch_province)
                                    ->first();
                            @endphp
                            <input type="text" class="form-control" value="{{ $province->name }}"
                                name="branch_province" disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="application_reason" class="col-sm-2 col-form-label">Kab/Kota</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            @php
                                $regencies = DB::table('regencies')
                                    ->where('id', $permit->branch_regency)
                                    ->first();
                            @endphp
                            <input type="text" class="form-control" value="{{ $regencies->name }}"
                                name="application_reason" disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="branch_district" class="col-sm-2 col-form-label">Kecamatan</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            @php
                                $district = DB::table('districts')
                                    ->where('id', $permit->branch_district)
                                    ->first();
                            @endphp
                            <input type="text" class="form-control" value="{{ $district->name }}"
                                name="branch_district" disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="branch_village" class="col-sm-2 col-form-label">Kelurahan</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            @php
                                $village = DB::table('villages')
                                    ->where('id', $permit->branch_village)
                                    ->first();
                            @endphp
                            <input type="text" class="form-control" value="{{ $village->name }}"
                                name="branch_village" disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="branch_location" class="col-sm-2 col-form-label">Alamat Lokasi</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->branch_location }}"
                                name="branch_location" disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="branch_rt" class="col-sm-2 col-form-label">RT/RW</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->branch_rt }}"
                                name="branch_rt" disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="branch_postal_code" class="col-sm-2 col-form-label">Kode Pos</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->branch_postal_code }}"
                                name="branch_postal_code" disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="branch_longtitude" class="col-sm-2 col-form-label">Longitude</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->branch_longtitude }}"
                                name="branch_longtitude" disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="branch_latitude" class="col-sm-2 col-form-label">Latitude</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->branch_latitude }}"
                                name="branch_latitude" disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="application_reason" class="col-sm-2 col-form-label">Alasan Permohonan</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->application_reason }}"
                                name="application_reason" disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="permit_process" class="col-sm-2 col-form-label">Izin yang akan diurus</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->permit_process }}"
                                name="permit_process" disabled />
                            {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                        </div>
                    </div>
                </div>
            @endif

            <div class="mt-4 mb-3 row">
                <label class="col-sm-2 col-form-label">Dokumen Pendukung :</label>
            </div>
            @foreach ($permitFile as $key => $items)
                <div class="mb-3 row">
                    <label for="specification" class="col-sm-4 col-form-label">{{ $key + 1 }}.
                        {{ $items->field_name }}</label>
                    <div class="col-sm-8">
                        @php
                            $file = explode(',', $items->filepath);
                        @endphp
                        @foreach ($file as $key => $item)
                            <a href="{{ route('download.permit', substr($item, 7)) }}" style="font-size:24px ">
                                <div
                                    class="col-sm-1 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    File {{ $key + 1 }}
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach

            <div class="col">
                @if ($permit->note == null)
                    <label class="col-sm-2 col-form-label">Note</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <textarea class="form-control h-100 mt-0" name="note" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px" disabled>Tidak ada</textarea>
                        </div>
                    </div>
                @else
                    <label class="col-sm-2 col-form-label">Note</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <textarea class="form-control h-100 mt-0" name="note" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 100px" disabled>{{ $permit->note }}</textarea>
                        </div>
                    </div>
                @endif

                <label for="id" class="col-sm-2 col-form-label">Status</label>
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->status }}" name="id"
                                disabled />
                        </div>
                    </div>
                </div>
                @if ($permit->extend != null)
                    <label for="id" class="col-sm-2 col-form-label">Perpanjang</label>
                    <div class="mb-3 row">
                        <div class="col-sm-6">
                            <div class="input-group">
                                <input type="text" class="form-control" value="{{ $permit->extend }}" name="id"
                                    disabled />
                            </div>
                        </div>
                    </div>
                @endif
            </div>

            <div class="col">
                <label for="id" class="col-sm-6 col-form-label">History Perizinan Baru</label>
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <x-table id="dataTables">
                            @slot('header')
                                <tr>
                                    <th>No</th>
                                    <th>Status</th>
                                    <th>User Submited</th>
                                    <th>Notes</th>
                                    <th>Created At</th>
                                </tr>
                            @endslot
                            @slot('data')
                                @foreach ($permitHistory as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ strtoupper($row->status) }}</td>
                                        <td>{{ $row->user_submited }}</td>
                                        <td>{{ $row->notes }}</td>
                                        <td>{{ $row->created_at }}</td>
                                    </tr>
                                @endforeach
                            @endslot
                        </x-table>
                    </div>
                </div>
            </div>

            @if ($permit->status == 'RETURN')
                <div class="mb-3 row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('permit.edit', $permit->id) }}" class="btn btn-danger btn-lg px-4 py-2"
                            style="background-color:#fe3f40">Edit</a>
                    </div>
                </div>
            @endif
            @if ($permit->latest_skpd != null && $permit->cost_control == 'FALSE')
                <div class="mb-3 row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('permit.confirm_skpd', $permit->id) }}" class="btn btn-danger btn-lg px-4 py-2"
                            style="background-color:#fe3f40">konfirmasi SKPD</a>
                    </div>
                </div>
            @endif
        </div>
    </x-base>
@endsection
