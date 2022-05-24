@extends('layouts.user')

@section('title')
    Permohoman Dokumen
@endsection

@section('content')
    <x-base>
        {{-- @slot('alert')
      <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        <form class="mt-4" method="post" enctype="multipart/form-data" action="{{  }}">
            @csrf
            <div class="d-flex align-items-center justify-content-between">
                <h2>Permohoman Dokumen</h2>
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
                    <label for="id" class="col-sm-2 col-form-label">Tanggal Permohonan</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $data->created_at }}" name="id" disabled />
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
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Alasan Permohonan Document</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="floatingTextarea2" style="height: 100px"
                            readonly>{{ $data->request_document_reason }}</textarea>
                    </div>
                </div>
                <div class="my-4">
                    <table id="dataTables4" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Dokumen</th>
                                <th>Tipe Dokumen</th>
                                {{-- <th>Aksi</th> --}}
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($file as $row)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $row->document_name }}</td>
                                    <td>{{ $row->document_type }}</td>
                                    {{-- <td>
                                    <a href="{{ route('legal.perpanjangan.detail', $row->id) }}"
                                        class="btn btn-primary">Lihat</a>
                                </td> --}}
                                </tr>
                            @endforeach
                        </tbody>

                    </table>
                </div>

                {{-- <div class="mb-3 row">
                    <label for="location" class="col-sm-2 col-form-label">Nama Dokumen</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $data->document_name }}" name="location"
                                disabled />
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="specification" class="col-sm-2 col-form-label">Tipe Document</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $data->document_type }}"
                                name="specification" disabled />
                        </div>
                    </div>
                </div> --}}



                {{-- <x-input label="Alasan Permohonan" name="application_reason" value="{{ $permit->location }}"
                    labelClass="col-sm-2" fieldClass="col-sm-10" read-only>
                </x-input> --}}
                {{-- <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Alasan Permohonan Document</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" id="floatingTextarea2" style="height: 100px"
                            readonly>{{ $data->request_document_reason }}</textarea>
                    </div>
                </div> --}}
                <label class="col-sm-2 col-form-label">Note</label>
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px"></textarea>
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
                            <button type="submit" class="btn btn-primary" name="action" value="approve">Approve</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>


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
