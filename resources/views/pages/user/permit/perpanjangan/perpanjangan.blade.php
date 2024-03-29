@extends ('layouts.user')

@section('title')
    Perpanjangan Perizinan
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
        <form class="mt-4" method="post" enctype="multipart/form-data" action="{{ route('permit.perpanjangan-post') }}">
            @csrf
            <div class="d-flex align-items-center justify-content-between">
                <h2>Perpanjangan</h2>
                <div class="row">
                    <div class="col-5">
                        <x-modal-history id="dataTables">
                            @slot('header')
                                <tr>
                                    <th>No</th>
                                    <th>Nomor Pengajuan</th>
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
                                        <td><a href="{{ route('perpanjangan.detail', $row->id) }}"
                                                class="btn btn-primary">Detail</a>
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


                <x-extend-type>
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
                                <x-input label="1. Disposisi" name="file_disposition" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="2. Gambar ME" name="file_me" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" accept="application/pdf" />
                                <x-input label="3. Gambar Arsitek" name="file_architect" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="4. Gambar Teknis" name="file_technical" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="5. Foto Gedung" name="file_building_photo" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" accept="application/pdf" />
                                <x-input label="6. IMB" name="file_imb" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="7. Dokumen SLF Lama" name="file_old_slf" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" accept="application/pdf" />
                                <x-input label="8. Dokumen Pendukung Lainnya" name="file_other[]" type="file"
                                    labelClass="col-sm-4" fieldClass="col-sm-8" required multiple accept="application/pdf" />
                            </div>
                        </div>
                    @endslot

                    @slot('reklame')
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Pemilik Reklame" name="owner_name" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
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
                                <x-input label="Ketinggian Reklame" name="ads_height" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <x-input label="Jangka Waktu Pemasangan" name="ads_period" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" required />
                                <label>Dokumen Pendukung :</label>
                                <x-input label="1. Foto Reklame" name="file_ads_photo" type="file" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="2. Jika Luas Reklame > 10M2 (Menyertakan TLBBR, IMBBR, IPR)" name="file_tlbbr"
                                    type="file" labelClass="col-sm-4" fieldClass="col-sm-8" required
                                    accept="application/pdf" />
                                <x-input label="3. Bukti Pembayaran Tahun Lalu" name="file_payment_proof" type="file"
                                    labelClass="col-sm-4" fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="4. SKPD Tahun Lalu" name="file_old_skpd" type="file"
                                    labelClass="col-sm-4" fieldClass="col-sm-8" required accept="application/pdf" />
                                <x-input label="5. Dokumen Pendukung Lainnya" name="file_other[]" type="file"
                                    labelClass="col-sm-4" fieldClass="col-sm-8" required multiple accept="application/pdf" />
                            </div>
                        </div>
                    @endslot
                </x-extend-type>

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
            var table = $('#dataTable').DataTable({
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: "{{ route('perpanjangan.prolongation') }}",
                columns: [

                    {
                        data: 'id',
                        name: 'id',
                        "className": "text-center"
                    },
                    {
                        data: 'status',
                        name: 'status',
                        "className": "text-center"
                    },
                    {
                        data: 'aksi',
                        name: 'aksi',
                        "className": "text-center",
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endpush
