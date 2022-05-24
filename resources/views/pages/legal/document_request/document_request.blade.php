@extends('layouts.user')

@section('title')
    Permohoman Dokumen
@endsection

@section('content')
    <x-base>
        {{-- @slot('alert')
      <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        <h2>Permintaan Dokumen</h2>
        <table id="dataTables" class="table table-striped table-bordered" style="width:100%">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Nomor Kasus</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->id }}</td>
                        <td>{{ $row->status }}</td>
                        <td>
                            @if ($row->status == 'PENDING')
                                <a href="{{ route('legal.document_request.check', $row->id) }}"
                                    class="btn btn-primary">Check</a>
                            @else
                                <a href="{{ route('legal.document_request.detail', $row->id) }}"
                                    class="btn btn-primary">Lihat</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>No</th>
                    <th>Nomor Kasus</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </tfoot>
        </table>


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
                // ajax: "{{ route('permit.newpermit') }}",
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
