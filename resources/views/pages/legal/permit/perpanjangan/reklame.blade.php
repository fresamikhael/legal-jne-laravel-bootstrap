@extends('layouts.legal')

@section('title')
    Perpanjangan
@endsection

@section('content')
    <x-base>
        {{-- @slot('alert')
      <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        <form class="mt-4" method="post" enctype="multipart/form-data"
            action="{{ route('legal.permit.perpanjangan-post') }}">
            @csrf
            <div class="d-flex align-items-center justify-content-between">
                <h2>Perpanjangan</h2>
                <div class="row">
                    <div class="col-5">
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
                </div>


            </div>
            <div class="row mt-3">
                {{-- <input type="hidden" name="id"> --}}
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                <input type="hidden" name="permit_model" value="perpanjangan">

                <div class="row mt-3">
                    <div class="col-sm-12">
                        <x-input label="Nama Pemilik Reklame" name="owner_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required />
                        <x-select labelClass="col-sm-2" fieldClass="col-sm-10" label="Status Gedung" name="ads_type">
                            <option value="Sewa">Sewa</option>
                            <option value="Milik Pribadi">Milik Pribadi</option>
                        </x-select>
                        <x-input label="Alamat Pemasangan" name="address" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required />
                        <x-input label="Judul Reklame" name="ads_title" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required />
                        <x-input label="Ukuran Reklame" name="ads_size" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required />
                        <x-input label="Ketinggian Reklame" name="ads_height" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required />
                        <x-input label="Jangka Waktu Pemasangan" name="ads_period" labelClass="col-sm-2"
                            fieldClass="col-sm-10" required />
                        <label>Dokumen Pendukung :</label>
                        <x-input label="1. Foto Reklame" name="file_ads_photo" type="file" labelClass="col-sm-4"
                            fieldClass="col-sm-8" required />
                        <x-input label="2. Jika Luas Reklame > 10M2 (Menyertakan TLBBR, IMBBR, IPR)" name="file_tlbbr"
                            type="file" labelClass="col-sm-4" fieldClass="col-sm-8" required />
                        <x-input label="3. Bukti Pembayaran Tahun Lalu" name="file_payment_proof" type="file"
                            labelClass="col-sm-4" fieldClass="col-sm-8" required />
                        <x-input label="4. SKPD Tahun Lalu" name="file_old_skpd" type="file" labelClass="col-sm-4"
                            fieldClass="col-sm-8" required />
                    </div>
                </div>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-danger btn-lg px-4 py-2" type="submit"
                        style="background-color:#fe3f40">Submit</button>
                </div>
            </div>
        </form>


        {{-- <x-input label="Lokasi"></x-input> --}}
    </x-base>
@endsection
