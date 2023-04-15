@extends('layouts.user')

@section('title')
    Permohonan Dokumen
@endsection

@section('content')
    <x-base>
        {{-- @slot('alert')
      <x-alert message="test" type="danger"></x-alert>
    @endslot --}}

        <div class="d-flex align-items-center justify-content-between">
            {{-- <h2>Permohoman Dokumen</h2> --}}
            <nav style="--bs-breadcrumb-divider: '>'; margin-top: -5px; margin-bottom: -18px" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color:#fe1717">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('regulation.index') }}" style="color:#fe1717">Database</a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{ route('regulation.request') }}" style="color:#fe1717">Permohonan
                            Dokumen</a>
                    </li>
                    <li class="breadcrumb-item active" aria-current="page">
                        Detail</li>
                </ol>
            </nav>
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
                <label for="id" class="col-sm-2 col-form-label">Nomor Tiket</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $data->id }}" name="id" disabled />
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">Tanggal Permohonan</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $data->created_at->format('m/d/Y') }}"
                            name="id" disabled />
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="permit_type" class="col-sm-2 col-form-label">Nama Pemohon</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $user->name }}" name="permit_type"
                            disabled />

                    </div>
                </div>
            </div>




            {{-- <x-input label="Alasan Permohonan" name="application_reason" value="{{ $permit->location }}"
                    labelClass="col-sm-2" fieldClass="col-sm-10" read-only>
                </x-input> --}}
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Alasan Permohonan Document</label>
                <div class="col-sm-10">
                    <textarea class="form-control h-100 mt-0" id="floatingTextarea2" style="height: 100px" readonly>{{ $data->request_document_reason }}</textarea>
                </div>
            </div>

            <div class="my-4">
                <table id="dataTables4" class="table table-striped table-bordered" style="width:100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Dokumen</th>
                            <th>Tipe Dokumen</th>
                            <th>Kode Dokumen</th>
                            <th>File Number</th>
                            {{-- <th>Dokumen Out</th>
                            <th>Dokumen In</th> --}}
                            <th>Action</th>
                            {{-- <th>Aksi</th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($file as $row)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $row->document_name }}</td>
                                <td>{{ $row->document_type }}</td>
                                <td>
                                    @if ($row->document_code == null)
                                        -
                                    @else
                                        {{ $row->document_code }}
                                    @endif
                                </td>
                                <td>
                                    @if ($row->file_number == null)
                                        -
                                    @else
                                        {{ $row->file_number }}
                                    @endif
                                </td>
                                {{-- <td>
                                    @if ($row->doc_out == null)
                                        -
                                    @else
                                        {{ $row->doc_out }}
                                    @endif
                                </td>
                                <td>
                                    @if ($row->doc_in == null)
                                        -
                                    @else
                                        {{ $row->doc_in }}
                                    @endif
                                </td> --}}
                                {{-- <td>
                                    @if ($row->note == null)
                                        -
                                    @else
                                        {{ $row->note }}
                                    @endif

                                </td> --}}
                                <td>
                                    @if ($row->file_id != null)
                                        @php
                                            $doc = DB::table('regulations')
                                                ->where('id', $row->file_id)
                                                ->first();
                                        @endphp
                                        {{-- <a href="{{ asset($doc->id) }}" target="_blank" style="font-size:24px ">
                                            <div
                                                class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                Lihat
                                                <i class="fa fa-download"></i>
                                            </div>
                                        </a> --}}
                                        <a href="{{ route('regulation.detail', [$doc->id]) }}" target="_blank"
                                            style="font-size:24px ">
                                            <div
                                                class="col-sm-12 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                Lihat
                                                <i class="fa fa-download"></i>
                                            </div>
                                        </a>
                                    @else
                                        -
                                    @endif
                                </td>


                                {{-- <td>
                                    <a href="{{ route('legal.perpanjangan.detail', $row->id) }}"
                                        class="btn btn-primary">Lihat</a>
                                </td> --}}
                            </tr>
                        @endforeach
                    </tbody>

                </table>
            </div>


            @if ($data->note == null)
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
                            style="height: 100px" disabled>{{ $data->note }}</textarea>
                    </div>
                </div>
            @endif


            <label for="id" class="col-sm-2 col-form-label">Status</label>
            <div class="mb-3 row">
                <div class="col-sm-12">
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $data->status }}" name="id" disabled />
                        {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                    </div>
                </div>
            </div>
            {{-- @if ($data->status == 'RETURN')
                <div class="mb-3 row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('permit.edit', $permit->id) }}" class="btn btn-danger btn-lg px-4 py-2"
                            style="background-color:#fe3f40">Edit</a>
                    </div>
                </div>
            @endif --}}



            {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button value="return" name="action" class="btn btn-danger btn-lg px-4 py-2" type="submit"
                        style="background-color:#fe3f40">return</button>
                    <button value="approve" name="action" class="btn btn-danger btn-lg px-4 py-2" type="submit"
                        style="background-color:#fe3f40">approve</button>
                </div> --}}
        </div>




        {{-- <x-input label="Lokasi"></x-input> --}}
    </x-base>
@endsection
@push('addon-script')
    <script type="text/javascript">
        $(function() {
            var table = $('#dataTable4').DataTable({
                processing: false,
                serverSide: false,
                ordering: false,
                // ajax: "{{ route('legal.perpanjangan.prolongation') }}",
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
                        orderable: false,
                        searchable: false
                    },
                ]
            });

        });
    </script>
@endpush
