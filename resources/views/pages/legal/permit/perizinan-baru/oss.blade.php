@extends('layouts.legal')

@section('title')
    Permohonan Baru
@endsection

@section('content')
    <x-base>
        {{-- @slot('alert')
      <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        <form class="mt-4" method="post" enctype="multipart/form-data" action="{{ route('legal.permit.newpermit-post') }}">
            @csrf
            <div class="d-flex align-items-center justify-content-between">
                <h2>Permohonan Baru</h2>
                <div class="row">
                    <div class="col-5">
                        <x-modal-history id="dataTables">
                            @slot('header')
                                <tr>
                                    <th>No</th>
                                    <th>No Pengajuan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            @endslot
                            @slot('data')
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ ucfirst(trans($row->permit_model)) }}</td>
                                        <td>
                                            @if ($row->status == 'PENDING')
                                                <a href="{{ route('legal.permit.check', $row->id) }}"
                                                    class="btn btn-primary">Check</a>
                                            @else
                                                <a href="{{ route('legal.permit.detail', $row->id) }}"
                                                    class="btn btn-primary">Lihat</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endslot
                        </x-modal-history>
                    </div>

                    {{-- <div class="col-7">
                        <x-modal-all-input id="dataTables2">
                            @slot('header')
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Kasus</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            @endslot
                            @slot('data')
                                @foreach ($data2 as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->status }}</td>
                                        <td>
                                            @if ($row->status == 'PENDING')
                                                <a href="{{ route('legal.permit.check', $row->id) }}"
                                                    class="btn btn-primary">Check</a>
                                            @else
                                                <a href="{{ route('legal.permit.detail', $row->id) }}"
                                                    class="btn btn-primary">Lihat</a>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            @endslot
                        </x-modal-all-input>
                    </div> --}}
                </div>


            </div>
            <div class="row mt-3">
                {{-- <input type="hidden" name="id"> --}}
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="permit_model" value="permohonan">
                {{-- <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Tipe Perizinan</label>
                    <div class="col-sm-10">
                        <select name="permit_type" class="form-control custom-select" aria-label="Default select example"
                            required>
                            <option value="" style="display: none" selected>-- Pilih --</option>
                            <option value="Perizinan Reklame">Perizinan Reklame</option>
                            <option value="Perizinan IMB">Perizinan IMB</option>
                            <option value="Perizinan SLF">Perizinan SLF</option>
                            <option value="Perizinan TDG">Perizinan TDG</option>
                            <option value="OSS">OSS</option>

                        </select>
                    </div>

                </div> --}}

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <x-input label="Nama Cabang/Pusat" name="branch_name" labelClass="col-sm-5" fieldClass="col-sm-7"
                            required />
                        <x-address label="" name="oss" />
                        <x-input label="Longtitude" name="branch_longtitude" labelClass="col-sm-5" fieldClass="col-sm-7"
                            required />
                        <x-input label="Latitude" name="branch_latitude" labelClass="col-sm-5" fieldClass="col-sm-7"
                            required />
                        <x-input label="Alasan Permohonan" name="application_reason" labelClass="col-sm-5"
                            fieldClass="col-sm-7" required />
                        <x-input label="Izin yang akan diurus" name="application_reason" labelClass="col-sm-5"
                            fieldClass="col-sm-7" required />
                        <label>Dokumen Pendukung :</label>
                        <x-input label="1. Gambar lokasi dalam bentuk polygon (zip) kurang dari 2 Mb"
                            name="file_location_polygon" type="file" labelClass="col-sm-5" fieldClass="col-sm-7"
                            required />
                        <x-input label="2. Form Pengajuan Pembuatan Izin Melalui OSS" name="file_oss_form" type="file"
                            labelClass="col-sm-5" fieldClass="col-sm-7" required />
                    </div>
                </div>

                {{-- <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10" required></x-input>
                <x-input label="Luas Bangunan" name="location" labelClass="col-sm-2" fieldClass="col-sm-10" required>
                </x-input>
                <x-input label="Luas Tanah" name="location" labelClass="col-sm-2" fieldClass="col-sm-10" required>
                </x-input>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Alasan Permohonan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control h-100 mt-0" name="application_reason" placeholder="" id="floatingTextarea2"
                            style="height: 100px" required></textarea>
                    </div>
                </div>
                <div class="mt-4 mb-3 row">
                    <label class="col-sm-2 col-form-label">Dokumen Pendukung :</label>
                </div>
                <x-input label="1. Disposisi" name="file_disposition" type="file" labelClass="col-sm-4"
                    fieldClass="col-sm-8" required>
                </x-input>
                <x-input label="2. Gambar ME" name="file_me" type="file" labelClass="col-sm-4" fieldClass="col-sm-8"
                    required>
                </x-input>
                <x-input label="3. Gambar Arsitek" name="file_architect" type="file" labelClass="col-sm-4"
                    fieldClass="col-sm-8" required>
                </x-input>
                <x-input label="4. Gambar Teknis" name="file_technical" type="file" labelClass="col-sm-4"
                    fieldClass="col-sm-8" required>
                </x-input>
                <x-input label="5. Foto Gedung Apabila Sudah Berdiri" name="file_building" type="file"
                    labelClass="col-sm-4" fieldClass="col-sm-8">
                </x-input>
                <x-input label="6. Dokumen Pendukung Lainnya" name="file_other" type="file" labelClass="col-sm-4"
                    fieldClass="col-sm-8" required>
                </x-input> --}}

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-danger btn-lg px-4 py-2" type="submit"
                        style="background-color:#fe3f40">Submit</button>
                </div>
            </div>
        </form>


        {{-- <x-input label="Lokasi"></x-input> --}}
    </x-base>
@endsection
