@extends('layouts.user')

@section('title')
    Permohonan Baru
@endsection

@section('content')
    <x-base>
        {{-- @slot('alert')
      <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif
        <form class="mt-4" method="post" enctype="multipart/form-data" action="{{ route('permit.newpermit-post') }}">
            @csrf
            <div class="d-flex align-items-center justify-content-between">
                <h2>Permohonan Baru</h2>
                <div class="row">
                    <div class="col-5">
                        <x-modal-history id="dataTables">
                            @slot('header')
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Perizinan</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            @endslot
                            @slot('data')
                                @foreach ($data as $row)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $row->id }}</td>
                                        <td>{{ $row->status }}</td>
                                        <td><a href="{{ route('permit.detail', $row->id) }}" class="btn btn-primary">Detail</a>
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
                <x-permit-type>
                    @slot('imb')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input label="Luas Bangunan" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Luas Tanah" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Alasan Permohonan" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <label>Dokumen Pendukung :</label>
                                <x-input label="1. Disposisi" name="file[]" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="2. Gambar ME" name="file[]" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="3. Gambar Arsitek" name="file[]" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="4. Gambar Teknis" name="file[]" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="5. Foto Gedung Apabila Sudah Berdiri" name="file[]" type="file"
                                    labelClass="col-sm-4" fieldClass="col-sm-8" accept="application/pdf" />
                                <x-input label="6. Dokumen Pendukung Lainnya" name="file_other[]" type="file"
                                    labelClass="col-sm-4" fieldClass="col-sm-8" required multiple accept="application/pdf" />
                                <input type="hidden" name="fieldname[]" value="Disposisi" />
                                <input type="hidden" name="fieldname[]" value="Gambar ME" />
                                <input type="hidden" name="fieldname[]" value="Gambar Arsitek" />
                                <input type="hidden" name="fieldname[]" value="Gambar Teknis" />
                                <input type="hidden" name="fieldname[]" value="Foto Gedung Apabila Sudah Berdiri" />
                                <input type="hidden" name="fieldname[]" value="Dokumen Pendukung Lainnya" />
                            </div>
                        </div>
                    @endslot

                    @slot('slf')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                                <x-input label="Luas Bangunan" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Luas Tanah" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Alasan Permohonan" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <label>Dokumen Pendukung :</label>
                                <x-input label="1. Disposisi" name="file[]" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="2. PKS(Apabila Memakai Vendor) Gambar ME" name="file[]" type="file"
                                    labelClass="col-sm-4" fieldClass="col-sm-8" accept="application/pdf" />
                                <x-input label="3. Gambar Arsitek" name="file[]" type="file"
                                    labelClass="col-sm-4" fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="4. Gambar Teknis" name="file[]" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="5. Foto Gedung Apabila Sudah Berdiri" name="file[]"
                                    type="file" labelClass="col-sm-4" fieldClass="col-sm-8" accept="application/pdf" />
                                <x-input label="6. Dokumen Pendukung Lainnya" name="file_other[]" type="file"
                                    labelClass="col-sm-4" fieldClass="col-sm-8" required multiple accept="application/pdf" />
                                <input type="hidden" name="fieldname[]" value="Disposisi" />
                                <input type="hidden" name="fieldname[]" value="PKS(Apabila Memakai Vendor) Gambar ME" />
                                <input type="hidden" name="fieldname[]" value="Gambar Arsitek" />
                                <input type="hidden" name="fieldname[]" value="Gambar Teknis" />
                                <input type="hidden" name="fieldname[]" value="Foto Gedung Apabila Sudah Berdiri" />
                                <input type="hidden" name="fieldname[]" value="Dokumen Pendukung Lainnya" />
                            </div>
                        </div>
                    @endslot

                    @slot('reklame')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Pemilik Reklame" name="owner_name" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-select labelClass="col-sm-2" fieldClass="col-sm-10" label="Status Gedung"
                                    name="ads_type">
                                    <option value="Sewa">Sewa*</option>
                                    <option value="Milik Pribadi">Milik Pribadi</option>
                                </x-select>
                                <x-input label="Alamat Pemasangan" name="address" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Judul Reklame" name="ads_title" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Ukuran Reklame" name="ads_size" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    required />
                                <x-input label="Ketinggian Reklame" name="ads_height" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Jangka Waktu Pemasangan" name="ads_period" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Alasan Permohonan" name="application_reason" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <label>Dokumen Pendukung :</label>
                                <x-input label="1. Foto Reklame" name="file[]" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="2. Surat Pernyataan Reklame" name="file[]" type="file"
                                    labelClass="col-sm-4" fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="3. Gambar Arsitek" name="file[]" type="file"
                                    labelClass="col-sm-4" fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="4. Dokumen Kepemilikan Gedung" name="file[]" type="file"
                                    labelClass="col-sm-4" fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="5. PBB Terbaru" name="file[]" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="6. Surat Pernyataan Pemilik Sewa Gedung*" name="file[]"
                                    type="file" labelClass="col-sm-4" fieldClass="col-sm-8" accept="application/pdf" />
                                <x-input label="7. Jika Luas Reklame > 10M2 (Menyertakan TLBBR, IMBBR, IPR)" name="file[]"
                                    type="file" labelClass="col-sm-4" fieldClass="col-sm-8" required
                                    accept="application/pdf" />
                                <x-input label="8. Dokumen Pendukung Lainnya" name="file_other[]" type="file"
                                    labelClass="col-sm-4" fieldClass="col-sm-8" required multiple accept="application/pdf" />
                                <input type="hidden" name="fieldname[]" value="Foto Reklame" />
                                <input type="hidden" name="fieldname[]" value="Surat Pernyataan Reklame" />
                                <input type="hidden" name="fieldname[]" value="Gambar Arsitek" />
                                <input type="hidden" name="fieldname[]" value="Dokumen Kepemilikan Gedung" />
                                <input type="hidden" name="fieldname[]" value="PBB Terbaru" />
                                <input type="hidden" name="fieldname[]" value="Surat Pernyataan Pemilik Sewa Gedung*" />
                                <input type="hidden" name="fieldname[]"
                                    value="Jika Luas Reklame > 10M2 (Menyertakan TLBBR, IMBBR, IPR)" />
                                <input type="hidden" name="fieldname[]" value="Dokumen Pendukung Lainnya" />
                            </div>
                        </div>
                    @endslot

                    {{-- @slot('oss')
                    code on permit type component
                    @endslot --}}
                </x-permit-type>
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

@push('addon-script')
    <script type="text/javascript">
        $(function() {
            var table = $('#dataTables').DataTable({
                paging: false,
                searching: false,
                retrieve: true,
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: "{{ route('permit.newpermit') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        "className": "text-center"
                    },
                    {
                        data: 'id',
                        name: 'id',
                        "className": "text-center"
                    },
                    {
                        data: 'action',
                        name: 'action',
                        "className": "text-center",
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endpush
