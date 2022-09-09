@extends ('layouts.legal')

@section('title')
    Jual Beli Tanah & Bangunan
@endsection

@section('content')
    <x-base>
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif
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
                                        <button type="button" class="btn btn-warning" disabled>APPROVED BY LEGAL
                                            CORPORATES</button>
                                    @elseif ($row->status == 'SENT BY LEGAL CORPORATES')
                                        <button type="button" class="btn btn-warning" disabled>SENT BY LEGAL
                                            CORPORATES</button>
                                    @else
                                        <button type="button" class="btn btn-warning" disabled>Pengajuan Diproses</button>
                                    @endif
                                </td>
                                <td>
                                    @if ($row->status == 'APPROVED BY LEGAL CORPORATES')
                                        <a href="{{ route('headlegal.legalcorporate.landsell-check', [$row->id]) }}"
                                            class="btn btn-danger">Update</a>
                                    @elseif ($row->status == 'SENT BY LEGAL CORPORATES')
                                        <a href="{{ route('headlegal.legalcorporate.landsell-check', [$row->id]) }}"
                                            class="btn btn-danger">Update</a>
                                    @else
                                        <a href="{{ route('headlegal.legalcorporate.landsell-check', [$row->id]) }}"
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
