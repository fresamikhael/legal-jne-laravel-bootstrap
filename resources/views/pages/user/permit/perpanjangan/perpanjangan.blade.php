@extends ('layouts.user')

@section('title')
    Perpanjangan Perizinan
@endsection

@section('content')
    <x-base>
        <div class="card-body">
            <div class="table-responsive">
                <div class="d-flex align-items-center justify-content-between">
                    <h2> Perpanjangan Perizinan</h2>
                </div>

                {{-- <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Kasus</th>
                            <th>Status</th>
                            <th style="width: 20%">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>$loop->iteration</td>
                        </tr>
                    </tbody>
                </table> --}}
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
                                    @if ($row->extend != null)
                                        <a href="{{ route('perpanjangan.detail', $row->id) }}"
                                            class="btn btn-primary">Lihat</a>
                                    @else
                                        <a href="{{ route('perpanjangan.prolongation-check', $row->id) }}"
                                            class="btn btn-primary">Check</a>
                                    @endif
                                    {{-- <a href="{{ route('perpanjangan.detail', $row->id) }}"
                                        class="btn btn-primary">Lihat</a> --}}
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
            </div>
        </div>
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
