@extends('layouts.legal')

@section('title')
    Search
@endsection

@section('content')
    <x-base>
        <h2>Search</h2>

        <div class="mt-3">
            <x-table id="dataTables">
                @slot('header')
                    <tr>
                        <th>No</th>
                        <th>Nomor Kasus</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                @endslot
                @slot('data')
                    @foreach ($join as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row['name'] }}</td>
                            <td>{{ $row['status'] }}</td>
                            <td>
                                {{-- @if ($row->status == 'APPROVED BY LEGAL LITIGASI MANAGER')
                                    <a href="{{ route('cs.customer-dispute.show', [$row->id, 'action=finish']) }}"
                                        class="btn btn-primary">Update</a>
                                @else
                                    <a href="{{ route('cs.customer-dispute.show', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @endif --}}
                            </td>
                        </tr>
                    @endforeach
                @endslot
            </x-table>
        </div>
    </x-base>
@endsection
