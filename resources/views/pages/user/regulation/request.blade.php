@extends('layouts.user')

@section('title')
    Permohonan Dokumen
@endsection

@section('content')
    <x-base>
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color:#fe1717">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('regulation.index') }}" style="color:#fe1717">Database</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Permintaan Dokumen</li>
            </ol>
        </nav>
        <div class="d-flex align-items-center justify-content-end me-4">
            <x-modal-history id="dataTables">
                @slot('header')
                    <tr>
                        <th>No</th>
                        <th>Nomor Tiket</th>
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
                            <td>
                                <a href="{{ route('regulation.request-detail', $row->id) }}" class="btn btn-primary">Lihat</a>
                            </td>
                        </tr>
                    @endforeach
                @endslot
            </x-modal-history>
        </div>

        <form class="mt-4" method="post" enctype="multipart/form-data" action="{{ route('regulation.request-post') }}">
            @csrf
            <div class="row mt-3">
                {{-- <input type="hidden" name="id"> --}}
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
                {{-- <input type="text" name="document_id" value="{{ $no_kasus }}"> --}}
                <table class="table table-borderless" id="dynamicTable">
                    {{-- <tr>
                        <th>Document</th>
                    </tr> --}}
                    <tr>
                        <td>
                            <div class="d-flex justify-content-center my-2">
                                <div class="col-sm-12">
                                    <x-input label="Nama Dokumen" name="document_name[]" labelClass="col-sm-3"
                                        fieldClass="col-sm-9">
                                    </x-input>
                                    <x-input hidden value="Soft Copy" label="Nama Dokumen" name="document_type[]"
                                        labelClass="col-sm-4" fieldClass="col-sm-8">
                                    </x-input>
                                </div>
                            </div>
                        </td>
                        {{-- <td>
                            <div class="d-flex justify-content-center my-2">
                                <div class="col-sm-12">
                                    <x-select label="Tipe Dokumen" name="document_type[]" labelClass="col-sm-6"
                                        fieldClass="col-sm-6" required>
                                        <option value="Hard Copy">Hard Copy</option>
                                        <option value="Soft Copy">Soft Copy</option>
                                    </x-select>
                                </div>
                            </div>
                        </td> --}}
                        <td>
                            <div class="d-flex justify-content-center my-2">
                                {{-- <button type="button" class="btn btn-danger me-2 remove-tr" id="remove">Remove</button> --}}
                                <button type="button" name="add" id="add"
                                    class="btn btn-success ">Tambah</button>
                            </div>
                        </td>
                    </tr>
                </table>
                {{-- <div class="px-4">
                    <div class="mb-3" id="dynamic">
                        <div class="row" id="form">
                            <h5>Document 1</h5>
                            <div class="col-sm-6">
                                <x-input label="Nama Dokumen" name="document_name" labelClass="col-sm-4"
                                    fieldClass="col-sm-8">
                                </x-input>
                            </div>
                            <div class="col-sm-6">
                                <x-select label="Tipe Dokumen" name="document_type" labelClass="col-sm-4"
                                    fieldClass="col-sm-8" required>
                                    <option value="" style="display: none" selected>-- Pilih --</option>
                                    <option value="Hard Copy">Hard Copy</option>
                                    <option value="Soft Copy">Sof Copy</option>
                                </x-select>
                            </div>
                        </div>
                    </div>
                    <div class="d-flex justify-content-end my-4">
                        <button type="button" class="btn btn-danger me-2 remove-tr" id="remove">Remove</button>
                        <button type="button" name="add" id="add" class="btn btn-success ">Add More</button>
                    </div>
                </div> --}}

                {{-- <x-input label="Kode Dokumen" name="document_code" labelClass="col-sm-2" fieldClass="col-sm-10"></x-input> --}}
                {{-- <x-input label="Kode Dokumen" name="document_code" labelClass="col-sm-2" fieldClass="col-sm-10"></x-input> --}}
                {{-- <x-input label="Alasan Permohonan" name="application_reason" labelClass="col-sm-2" fieldClass="col-sm-10">
                </x-input> --}}
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Alasan Permohonan Dokumen</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="request_document_reason" id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>
                </div>
                {{-- <div class="mt-4 mb-3 row">
                    <label class="col-sm-2 col-form-label">Dokumen Pendukung :</label>
                </div>
                <x-input label="1. Disposisi" name="file_disposition" type="file" labelClass="col-sm-4"
                    fieldClass="col-sm-8">
                </x-input>
                <x-input label="2. Dokumen 1" name="file_document1" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
                </x-input>
                <x-input label="3. Dokumen 2" name="file_document2" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
                </x-input>
                <x-input label="4. Dokumen 3" name="file_document3" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
                </x-input> --}}

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-danger btn-lg px-4 py-2 me-4" type="submit"
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
        var i = 0;

        $("#add").click(function() {

            ++i;


            $("#dynamicTable").append($("#test").html());
        });
        // var form_tags = document.getElementById('form')
        // $(document).on('click', '#remove', function() {
        //     // $(this).parents('tr').remove();
        //     if (form_tags.length > 2) {
        //         form_tags.removeChild();
        //     }
        // });
        $(document).on('click', '.remove-tr', function() {
            $(this).parents('tr').remove();
        });
    </script>
    <script type="text/html" id="test">
        <tr>
            <td>
                <div class="d-flex justify-content-center my-2">
                    <div class="col-sm-12">
                        <x-input label="Nama Dokumen" name="document_name[]" labelClass="col-sm-3" fieldClass="col-sm-9">
                        </x-input>
                        <x-input hidden value="Soft Copy" label="Nama Dokumen" name="document_type[]" labelClass="col-sm-4"
                            fieldClass="col-sm-8">
                        </x-input>
                    </div>
                </div>
            </td>
            {{-- <td>
                <div class="d-flex justify-content-center my-2">
                    <div class="col-sm-12">
                        <x-select label="Tipe Dokumen" name="document_type[]" labelClass="col-sm-6" fieldClass="col-sm-6"
                            required>
                            <option value="" style="display: none" selected>-- Pilih --</option>
                            <option value="Hard Copy">Hard Copy</option>
                            <option value="Soft Copy">Sof Copy</option>
                        </x-select>
                    </div>
                </div>

            </td> --}}
            <td>
                <div class="d-flex justify-content-center my-2">
                    <button type="button" class="btn btn-danger me-2 remove-tr" id="remove">Hapus</button>
                </div>
            </td>
        </tr>
    </script>
@endpush
