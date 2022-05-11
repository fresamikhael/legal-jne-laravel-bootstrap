@extends('layouts.cs')

@section('title')
    Customer Dispute
@endsection

@section('content')
    <x-base>
        <h2>Customer Dispute</h2>

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
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                @if ($row->status == "APPROVED BY LEGAL LITIGASI MANAGER")
                                    <a href="{{ route('cs.customer-dispute.show', [$row->id, 'action=finish']) }}" class="btn btn-primary">Update</a>
                                @else   
                                    <a href="{{ route('cs.customer-dispute.show', [$row->id]) }}" class="btn btn-primary">Lihat</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endslot
            </x-table>
        </div>
    </x-base>
@endsection
