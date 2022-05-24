@extends ('layouts.user')

@section('title')
    Jual Beli Tanah & Bangunan
@endsection

@section('content')
    <x-base>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered " id="dataTable" width="100%" cellspacing="0">
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
                                <td>
                                    @if ($row->status == 'APPROVED BY LEGAL CORPORATES')
                                        <button type="button" class="btn btn-success" disabled>APPROVED BY LEGAL
                                            CORPORATES</button>
                                    @elseif ($row->status == 'RETURNED BY USER')
                                        <button type="button" class="btn btn-warning" disabled>RETURNED BY USER</button>
                                    @elseif ($row->status == 'RETURNED BY LEGAL CORPORATES')
                                        <button type="button" class="btn btn-warning" disabled>RETURNED BY LEGAL
                                            CORPORATES</button>
                                    @elseif ($row->status == 'REJECTED')
                                        <button type="button" class="btn btn-danger" disabled>REJECTED</button>
                                    @else
                                        <button type="button" class="btn btn-warning" disabled>Pengajuan Diproses</button>
                                    @endif
                                </td>
                                <td>
                                    @if ($row->status == 'APPROVED BY LEGAL CORPORATES')
                                        <a href="{{ route('legal.legalcorporate.landsell-final', [$row->id]) }}"
                                            class="btn btn-primary">Lihat</a>
                                    @elseif ($row->status == 'REJECTED')
                                        <a href="{{ route('legal.legalcorporate.landsell-final', [$row->id]) }}"
                                            class="btn btn-primary">Lihat</a>
                                    @else
                                        <a href="{{ route('legal.legalcorporate.landsell-check', [$row->id]) }}"
                                            class="btn btn-danger">Update</a>
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
            </div>
        </div>
    </x-base>
@endsection
