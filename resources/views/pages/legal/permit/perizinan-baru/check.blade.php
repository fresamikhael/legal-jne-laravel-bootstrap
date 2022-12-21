@extends('layouts.user')

@section('title')
    Perizinan baru
@endsection

@section('content')
    <x-base>
        {{-- @slot('alert')
      <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        <form class="mt-4" method="post" enctype="multipart/form-data"
            action="{{ route('legal.permit.check-post', $permit->id, $permit->user_id) }}">
            @csrf
            <div class="d-flex align-items-center justify-content-between">
                <h2>Perizinan Baru</h2>
                {{-- <x-modal-history>
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
                </x-modal-history> --}}
            </div>
            <div class="row mt-3">

                <div class="mb-3 row">
                    <label for="id" class="col-sm-2 col-form-label">No Kasus</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->id }}" name="id"
                                disabled />
                            {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                        </div>
                    </div>
                </div>
                <input type="hidden" class="form-control" value="{{ auth()->user()->id }}" name="legal_id" />
                <div class="mb-3 row">
                    <label for="permit_type" class="col-sm-2 col-form-label">Tipe Perizinan</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->permit_type }}" name="permit_type"
                                disabled />
                            {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="location" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->location }}" name="location"
                                disabled />
                            {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="specification" class="col-sm-2 col-form-label">Spesifikasi</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->specification }}"
                                name="specification" disabled />
                            {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                        </div>
                    </div>
                </div>



                {{-- <x-input label="Alasan Permohonan" name="application_reason" value="{{ $permit->location }}"
                    labelClass="col-sm-2" fieldClass="col-sm-10" read-only>
                </x-input> --}}
                <div class="mt-4 mb-3 row">
                    <label class="col-sm-2 col-form-label">Dokumen Pendukung :</label>
                </div>
                @php
                    $no = 0;
                @endphp
                @if ($permit->file_disposition != null)
                    <div class="mb-3 row">
                        @php
                            $no += 1;
                        @endphp
                        <label for="specification" class="col-sm-4 col-form-label"><?= $no ?>. Disposisi</label>

                        <div class="col-sm-8">
                            <a href="{{ route('download.permit', substr($permit->file_disposition, 7)) }}"
                                style="font-size:24px ">
                                <div
                                    class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Unduh
                                    <i class="fa fa-download"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif

                @if ($permit->file_me != null)
                    @php
                        $no += 1;
                    @endphp
                    <div class="mb-3 row">
                        <label for="specification" class="col-sm-4 col-form-label"><?= $no ?>. Gambar ME</label>

                        <div class="col-sm-8">
                            <a href="{{ route('download.permit', substr($permit->file_me, 7)) }}" style="font-size:24px ">
                                <div
                                    class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Unduh
                                    <i class="fa fa-download"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif

                @if ($permit->file_architect != null)
                    @php
                        $no += 1;
                    @endphp
                    <div class="mb-3 row">
                        <label for="specification" class="col-sm-4 col-form-label"><?= $no ?>. Gambar Arsitek</label>

                        <div class="col-sm-8">
                            <a href="{{ route('download.permit', substr($permit->file_architect, 7)) }}"
                                style="font-size:24px ">
                                <div
                                    class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Unduh
                                    <i class="fa fa-download"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif

                @if ($permit->file_technical != null)
                    @php
                        $no += 1;
                    @endphp
                    <div class="mb-3 row">
                        <label for="specification" class="col-sm-4 col-form-label"><?= $no ?>. Gambar Teknis</label>

                        <div class="col-sm-8">
                            <a href="{{ route('download.permit', substr($permit->file_technical, 7)) }}"
                                style="font-size:24px ">
                                <div
                                    class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Unduh
                                    <i class="fa fa-download"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif

                @if ($permit->file_building_photo != null)
                    @php
                        $no += 1;
                    @endphp
                    <div class="mb-3 row">
                        <label for="specification" class="col-sm-4 col-form-label"><?= $no ?>. Foto Gedung</label>

                        <div class="col-sm-8">
                            <a href="{{ route('download.permit', substr($permit->file_building_photo, 7)) }}"
                                style="font-size:24px ">
                                <div
                                    class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Unduh
                                    <i class="fa fa-download"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif

                @if ($permit->file_other != null)
                    @php
                        $no += 1;
                    @endphp
                    <div class="mb-3 row">
                        <label for="specification" class="col-sm-4 col-form-label"><?= $no ?>. Dokumen Pendukung
                            Lainnya</label>

                        <div class="col-sm-8">
                            <a href="{{ route('download.permit', substr($permit->file_other, 7)) }}"
                                style="font-size:24px ">
                                <div
                                    class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Unduh
                                    <i class="fa fa-download"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif

                @if ($permit->file_ads_photo != null)
                    @php
                        $no += 1;
                    @endphp
                    <div class="mb-3 row">
                        <label for="specification" class="col-sm-4 col-form-label"><?= $no ?>. Foto Reklame</label>

                        <div class="col-sm-8">
                            <a href="{{ route('download.permit', substr($permit->file_ads_photo, 7)) }}"
                                style="font-size:24px ">
                                <div
                                    class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Unduh
                                    <i class="fa fa-download"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif

                @if ($permit->file_statement_letter != null)
                    @php
                        $no += 1;
                    @endphp
                    <div class="mb-3 row">
                        <label for="specification" class="col-sm-4 col-form-label"><?= $no ?>. Surat Pernyataan
                            Reklame</label>

                        <div class="col-sm-8">
                            <a href="{{ route('download.permit', substr($permit->file_statement_letter, 7)) }}"
                                style="font-size:24px ">
                                <div
                                    class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Unduh
                                    <i class="fa fa-download"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif

                @if ($permit->file_building_ownership != null)
                    @php
                        $no += 1;
                    @endphp
                    <div class="mb-3 row">
                        <label for="specification" class="col-sm-4 col-form-label"><?= $no ?>. Dokumen Kepemilikan
                            Gedung</label>

                        <div class="col-sm-8">
                            <a href="{{ route('download.permit', substr($permit->file_building_ownership, 7)) }}"
                                style="font-size:24px ">
                                <div
                                    class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Unduh
                                    <i class="fa fa-download"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif

                @if ($permit->file_pbb != null)
                    @php
                        $no += 1;
                    @endphp
                    <div class="mb-3 row">
                        <label for="specification" class="col-sm-4 col-form-label"><?= $no ?>. PBB Terbaru</label>

                        <div class="col-sm-8">
                            <a href="{{ route('download.permit', substr($permit->file_pbb, 7)) }}"
                                style="font-size:24px ">
                                <div
                                    class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Unduh
                                    <i class="fa fa-download"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif

                @if ($permit->file_ownership_statement != null)
                    @php
                        $no += 1;
                    @endphp
                    <div class="mb-3 row">
                        <label for="specification" class="col-sm-4 col-form-label"><?= $no ?>. Surat Pernyataan Pemilik
                            Sewa
                            Gedung</label>

                        <div class="col-sm-8">
                            <a href="{{ route('download.permit', substr($permit->file_ownership_statement, 7)) }}"
                                style="font-size:24px ">
                                <div
                                    class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Unduh
                                    <i class="fa fa-download"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif

                @if ($permit->file_tlbbr != null)
                    @php
                        $no += 1;
                    @endphp
                    <div class="mb-3 row">
                        <label for="specification" class="col-sm-4 col-form-label"><?= $no ?>. TLBBR, IMBRR, IPR</label>

                        <div class="col-sm-8">
                            <a href="{{ route('download.permit', substr($permit->file_tlbbr, 7)) }}"
                                style="font-size:24px ">
                                <div
                                    class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Unduh
                                    <i class="fa fa-download"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif

                @if ($permit->file_location_polygon != null)
                    @php
                        $no += 1;
                    @endphp
                    <div class="mb-3 row">
                        <label for="specification" class="col-sm-4 col-form-label"><?= $no ?>. Gambar Lokasi Dalam Bentuk
                            Polygon</label>

                        <div class="col-sm-8">
                            <a href="{{ route('download.permit', substr($permit->file_location_polygon, 7)) }}"
                                style="font-size:24px ">
                                <div
                                    class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Unduh
                                    <i class="fa fa-download"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif

                @if ($permit->file_oss_form != null)
                    @php
                        $no += 1;
                    @endphp
                    <div class="mb-3 row">
                        <label for="specification" class="col-sm-4 col-form-label"><?= $no ?>. Form Pengajuan Pembuatan
                            Izin
                            Melalui OSS</label>

                        <div class="col-sm-8">
                            <a href="{{ route('download.permit', substr($permit->file_oss_form, 7)) }}"
                                style="font-size:24px ">
                                <div
                                    class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                    Unduh
                                    <i class="fa fa-download"></i>
                                </div>
                            </a>

                        </div>
                    </div>
                @endif

                <label class="col-sm-2 col-form-label">Note</label>
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px" required></textarea>
                    </div>
                </div>
                {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button value="return" name="action" class="btn btn-danger btn-lg px-4 py-2" type="submit"
                        style="background-color:#fe3f40">return</button>
                    <button value="approve" name="action" class="btn btn-danger btn-lg px-4 py-2" type="submit"
                        style="background-color:#fe3f40">approve</button>
                </div> --}}

                <div class="mb-3 row">
                    <div class="d-flex align-items-center gap-3 justify-content-end">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-danger" name="action" value="return">Return</button>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" name="action"
                                value="approve">Approve</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


        {{-- <x-input label="Lokasi"></x-input> --}}
    </x-base>
@endsection
