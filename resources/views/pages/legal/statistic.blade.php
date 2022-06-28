@extends ('layouts.legal')

@section('title')
    Statistik Pekerjaan
@endsection

@section('content')
    <div class="container" style="margin-top: 140px">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color:#fe1717">Home</a></li>
                <li class="breadcrumb-item active" aria-current="page">
                    Statistik Pekerjaan</li>
            </ol>
        </nav>
        <h2>Statistik Data</h2>
        <x-table id="dataTables">
            @slot('header')
                <tr>
                    <th>No</th>
                    <th>Nomor Kasus</th>
                    <th>SLA Pengerjaan Sampai</th>
                    <th>Status Terakhir</th>
                    <th>Aksi</th>
                </tr>
            @endslot
            @slot('data')
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->id }}</td>
                        @php
                            $startDate = $row->created_at;
                            $endDate = $row->created_at->addDays(7);
                            // $interval = $endDate->diff($startDate);
                            // $days = $interval->format('%a');
                            // $invoices = Invoice::whereBetween('due_date', [$startDate, $endDate])->get();
                        @endphp
                        <td>{{ $endDate->format('d/m/Y') }}</td>
                        {{-- <td>{{ $days }}</td> --}}
                        <td>{{ $row->status }}</td>
                        <td>
                            @if ($row->status == 'PENDING')
                                <a href="{{ route('legal.regulation.request-check', [$row->id]) }}"
                                    class="btn btn-primary">Check</a>
                            @elseif ($row->status == 'RETURN')
                            @else
                                <a href="{{ route('legal.regulation.request-detail', $row->id) }}"
                                    class="btn btn-primary">Lihat</a>
                            @endif
                        </td>
                    </tr>
                @endforeach
            @endslot
        </x-table>
    </div>
@endsection
