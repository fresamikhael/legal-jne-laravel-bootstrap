@extends ('layouts.legal')

@section('title')
    Statistik Pekerjaan
@endsection

@section('content')
    <div class="container" style="margin-top: 140px">
        <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{ route('home') }}" style="color:#fe1717">Home</a></li>
                <li class="breadcrumb-item"><a href="{{ route('statistic') }}" style="color:#fe1717">Statistik Pekerjaan</a>
                </li>
                <li class="breadcrumb-item active" aria-current="page">
                    Permit</li>
            </ol>
        </nav>
        <h2>Statistik Grafik</h2>
        <div id="chart" style="height: 300px;"></div>
        <hr>
        <h2>Statistik Data</h2>
        <x-table id="dataTables">
            @slot('header')
                <tr>
                    <th>No</th>
                    <th>Nomor Tiket</th>
                    <th>Nama Kasus</th>
                    <th>Status Terakhir</th>
                </tr>
            @endslot
            @slot('data')
                @foreach ($data as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td><a href="{{ route('legal.regulation.request-check', [$row->id]) }}">{{ $row->id }}</a></td>
                        @php
                            $startDate = $row->created_at;
                            $endDate = $row->created_at->addDays(7);
                            // $interval = $endDate->diff($startDate);
                            // $days = $interval->format('%a');
                            // $invoices = Invoice::whereBetween('due_date', [$startDate, $endDate])->get();
                        @endphp
                        <td>
                            @if ($row->permit_model == 'permohonan')
                                Permohonan Baru
                            @elseif ($row->permit_model == 'perpanjangan')
                                Perpanjangan
                            @else
                                Other
                            @endif
                        </td>
                        {{-- <td>{{ $days }}</td> --}}
                        <td>{{ $row->status }}</td>
                    </tr>
                @endforeach
            @endslot
        </x-table>
    </div>

    <script>
        const chart = new Chartisan({
            el: '#chart',
            url: "@chart('permit_chart')",
        });
    </script>
@endsection
