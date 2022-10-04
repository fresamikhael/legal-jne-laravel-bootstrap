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

        <div class="row">
            <div class="card m-1" style="width: 17rem;">
                <div class="card-body">
                    <h5 class="card-title">Statistik Drafting</h5>
                    <p class="card-text">Berisi statistik pekerjaan yang berhubungan dengan menu Drafting</p>
                    <a href="{{ route('statistic-drafting') }}" class="btn btn-primary">Lihat <i class="fas fa-eye"></i></a>
                </div>
            </div>
            <div class="card m-1" style="width: 17rem;">
                <div class="card-body">
                    <h5 class="card-title">Statistik Litigasi</h5>
                    <p class="card-text">Berisi statistik pekerjaan yang berhubungan dengan menu Litigasi</p>
                    <a href="{{ route('statistic-litigation') }}" class="btn btn-primary">Lihat <i
                            class="fas fa-eye"></i></a>
                </div>
            </div>
            <div class="card m-1" style="width: 17rem;">
                <div class="card-body">
                    <h5 class="card-title">Statistik Permit</h5>
                    <p class="card-text">Berisi statistik pekerjaan yang berhubungan dengan menu Permit</p>
                    <a href="{{ route('statistic-permit') }}" class="btn btn-primary">Lihat <i class="fas fa-eye"></i></a>
                </div>
            </div>
            <div class="card m-1" style="width: 17rem;">
                <div class="card-body">
                    <h5 class="card-title">Statistik Corporate</h5>
                    <p class="card-text">Berisi statistik pekerjaan yang berhubungan dengan menu Corporate</p>
                    <a href="{{ route('statistic-corporate') }}" class="btn btn-primary">Lihat <i
                            class="fas fa-eye"></i></a>
                </div>
            </div>
            <div class="card m-1" style="width: 17rem;">
                <div class="card-body">
                    <h5 class="card-title">Statistik Pengajuan Berkas</h5>
                    <p class="card-text">Berisi statistik pekerjaan yang berhubungan dengan menu Pengajuan Berkas</p>
                    <a href="{{ route('statistic-request') }}" class="btn btn-primary">Lihat <i class="fas fa-eye"></i></a>
                </div>
            </div>
        </div>
    </div>
@endsection
