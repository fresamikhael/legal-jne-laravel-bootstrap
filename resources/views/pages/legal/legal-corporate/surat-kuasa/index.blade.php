@extends ('layouts.user')

@section('title')
    Surat Kuasa
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
                                    @elseif ($row->status == 'RETURNED BY USER')
                                        <button type="button" class="btn btn-warning" disabled>RETURNED BY USER</button>
                                    @elseif ($row->status == 'RETURNED BY LEGAL CORPORATES')
                                        <button type="button" class="btn btn-warning" disabled>RETURNED BY LEGAL
                                            CORPORATES</button>
                                    @elseif ($row->status == 'APPROVED BY HEAD OF LEGAL DIVISION')
                                        <button type="button" class="btn btn-warning" disabled>APPROVED BY HEAD OF LEGAL
                                            DIVISION</button>
                                    @elseif ($row->status == 'REJECTED BY HEAD OF LEGAL DIVISION')
                                        <button type="button" class="btn btn-danger" disabled>REJECTED BY HEAD OF LEGAL
                                            DIVISION</button>
                                    @elseif ($row->status == 'APPROVED WITH SCANNED DOCUMENT SENT')
                                        <button type="button" class="btn btn-success" disabled>APPROVED WITH SCANNED DOCUMENT
                                            SENT</button>
                                    @else
                                        <button type="button" class="btn btn-warning" disabled>Pengajuan Diproses</button>
                                    @endif
                                </td>
                                <td>
                                    @if ($row->status == 'APPROVED BY LEGAL CORPORATES')
                                        <a href="{{ route('legal.legalcorporate.powerattorney-check', [$row->id]) }}"
                                            class="btn btn-danger">Update</a>
                                    @elseif ($row->status == 'APPROVED BY HEAD OF LEGAL DIVISION')
                                        <a href="{{ route('legal.legalcorporate.powerattorney-update', [$row->id]) }}"
                                            class="btn btn-danger">Update</a>
                                    @elseif ($row->status == 'REJECTED BY HEAD OF LEGAL DIVISION')
                                        <a href="{{ route('legal.legalcorporate.powerattorney-final', [$row->id]) }}"
                                            class="btn btn-primary">Lihat</a>
                                    @elseif ($row->status == 'APPROVED WITH SCANNED DOCUMENT SENT')
                                        <a href="{{ route('legal.legalcorporate.powerattorney-final', [$row->id]) }}"
                                            class="btn btn-primary">Lihat</a>
                                    @else
                                        <a href="{{ route('legal.legalcorporate.powerattorney-check', [$row->id]) }}"
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
