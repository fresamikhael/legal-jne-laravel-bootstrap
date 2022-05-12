@extends('layouts.user')

@section('title')
    Perpanjangan Perizinan
@endsection

@section('content')
    <x-base>
        {{-- @slot('alert')
      <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        {{-- <form class="mt-4" method="post" enctype="multipart/form-data" x
            action="{{ route('perpanjangan.perpanjangan-check-update', $permit->id) }}">
            @csrf --}}
        <div class="d-flex align-items-center justify-content-between">
            <h2>Perpanjangan Perizinan</h2>
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
                        <input type="text" class="form-control" value="{{ $permit->id }}" name="id" disabled />
                        {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
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
                            {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
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
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Alasan Permohonan</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="floatingTextarea2" style="height: 100px"
                        readonly>{{ $permit->application_reason }}</textarea>
                </div>
            </div>
            <div class="mt-4 mb-3 row">
                <label class="col-sm-2 col-form-label">Dokumen Pendukung :</label>
            </div>
            <div class="mb-3 row">
                <label for="specification" class="col-sm-2 col-form-label">1. Disposisi</label>

                <div class="col-sm-10">
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

            <div class="mb-3 row">
                <label for="specification" class="col-sm-2 col-form-label">2. Dokumen 1</label>
                <div class="col-sm-10">
                    <a href="{{ route('download.permit', substr($permit->file_document1, 7)) }}" style="font-size:24px ">
                        <div
                            class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Unduh
                            <i class="fa fa-download"></i>
                        </div>
                    </a>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="specification" class="col-sm-2 col-form-label">3. Dokumen 2</label>
                <div class="col-sm-10">
                    <a href="{{ route('download.permit', substr($permit->file_document2, 7)) }}" style="font-size:24px ">
                        <div
                            class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Unduh
                            <i class="fa fa-download"></i>
                        </div>
                    </a>

                </div>
            </div>

            <div class="mb-3 row">
                <label for="specification" class="col-sm-2 col-form-label">4. Dokumen 3</label>
                <div class="col-sm-10">
                    <a href="{{ route('download.permit', substr($permit->file_document3, 7)) }}" style="font-size:24px ">
                        <div
                            class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                            Unduh
                            <i class="fa fa-download"></i>
                        </div>
                    </a>

                </div>
            </div>
            @if ($permit->latest_skpd != null)
                <div class="mb-3 row">
                    <label for="specification" class="col-sm-2 col-form-label">5. SKPD Terupdate</label>
                    <div class="col-sm-10">
                        <a href="{{ route('download.permit', substr($permit->latest_skpd, 7)) }}"
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
            @if ($permit->proof_of_payment != null)
                <div class="mb-3 row">
                    <label for="specification" class="col-sm-2 col-form-label">6. Bukti Pembayaran</label>
                    <div class="col-sm-10">
                        <a href="{{ route('download.permit', substr($permit->proof_of_payment, 7)) }}"
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

            @if ($permit->note == null)
                <label class="col-sm-2 col-form-label">Note</label>
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px" disabled>Tidak ada</textarea>
                    </div>
                </div>
            @else
                <label class="col-sm-2 col-form-label">Note</label>
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px" disabled>{{ $permit->note }}</textarea>
                    </div>
                </div>
            @endif




            <label for="id" class="col-sm-2 col-form-label">Status</label>
            <div class="mb-3 row">
                <div class="col-sm-12">
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $permit->status }}" name="id" disabled />
                        {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                    </div>
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
                        <a onclick="myFunction()" class="btn btn-danger" name="action" value="unextended">Tidak
                            diperpanjang</a>
                    </div>
                    <div class="d-flex justify-content-end">
                        <a onclick="myFunction2()" type="submit" class="btn btn-primary" name="action"
                            value="Extend">Perpanjang</a>
                    </div>
                </div>
            </div>

            <div id="myDIV" style="display:none">
                <div class="flex flex-col">
                    <div class="w-full">
                        <form class="mt-4" method="post" enctype="multipart/form-data"
                            action="{{ route('perpanjangan.perpanjangan-check-update', $permit->id) }}">
                            @csrf
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>Tidak diperpanjang</h2>
                            </div>

                            <label class="col-sm-2 col-form-label">Note</label>
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="note" id="floatingTextarea2" style="height: 100px" required></textarea>
                                </div>
                            </div>


                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-danger btn-lg px-4 py-2" type="submit" name="action"
                                    value="Unextended" style="background-color:#fe3f40">Submit</button>


                            </div>

                        </form>

                    </div>
                </div>
            </div>
            <div id="myDIV2" style="display:none">
                <div class="flex flex-col">
                    <div class="w-full">
                        <form class="mt-4" method="post" enctype="multipart/form-data"
                            action="{{ route('perpanjangan.perpanjangan-check-update', $permit->id) }}">
                            @csrf
                            <div class="d-flex align-items-center justify-content-between">
                                <h2>Perpanjang</h2>
                            </div>
                            <x-input label="Foto Terupdate" name="update_photo" type="file" labelClass="col-sm-4"
                                fieldClass="col-sm-8" required>
                            </x-input>

                            <label class="col-sm-2 col-form-label">Note</label>
                            <div class="mb-3 row">
                                <div class="col-sm-12">
                                    <textarea class="form-control" name="note" id="floatingTextarea2" style="height: 100px" required></textarea>
                                </div>
                            </div>


                            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                                <button class="btn btn-danger btn-lg px-4 py-2" type="submit" name="action"
                                    value="Extended" style="background-color:#fe3f40">Submit</button>


                            </div>

                        </form>

                    </div>
                </div>
            </div>
            {{-- </form> --}}


            {{-- <x-input label="Lokasi"></x-input> --}}
    </x-base>
@endsection
@push('addon-script')
    <script type="text/javascript">
        function myFunction() {
            var x = document.getElementById("myDIV");
            var y = document.getElementById("myDIV2");

            if (x.style.display === "none") {
                x.style.display = "block";
                y.style.display = "none";

            } else {
                x.style.display = "none";
            }
        }

        function myFunction2() {
            var x = document.getElementById("myDIV");
            var y = document.getElementById("myDIV2");
            if (y.style.display === "none") {
                x.style.display = "none";
                y.style.display = "block";

            } else {
                y.style.display = "none";
            }
        }
    </script>
@endpush
