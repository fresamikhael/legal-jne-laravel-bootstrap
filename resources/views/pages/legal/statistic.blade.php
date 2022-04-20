@extends ('layouts.user')

@section('title')
    Regulasi
@endsection

@section('content')
    <div class="container" style="margin-top: 140px">
        <div class="d-flex">
            <div class="col-lg-3 me-3">
                <x-card-no-button style="margin-top: 300px" total="2">Jumlah Pengajuan Customer</x-card-no-button>
            </div>
            <div class="col-lg-3 me-3">
                <x-card-no-button style="margin-top: 300px" total="3">Jumlah Pengajuan Vendor & Supplier</x-card-no-button>
            </div>
            <div class="col-lg-3 me-3">
                <x-card-no-button style="margin-top: 300px" total="0">Jumlah Pengajuan Lease</x-card-no-button>
            </div>
            <div class="col-lg-3 me-3">
                <x-card-no-button style="margin-top: 300px" total="4">Jumlah Pengajuan Customer Dispute</x-card-no-button>
            </div>
        </div>
        <div class="d-flex mt-3">
            <div class="col-lg-3 me-3">
                <x-card-no-button style="margin-top: 300px" total="5">Jumlah Pengajuan Fraud</x-card-no-button>
            </div>
            <div class="col-lg-3 me-3">
                <x-card-no-button style="margin-top: 300px" total="1">Jumlah Pengajuan Outstanding</x-card-no-button>
            </div>
            <div class="col-lg-3 me-3">
                <x-card-no-button style="margin-top: 300px" total="7">Jumlah Pengajuan Vendor & Supplier</x-card-no-button>
            </div>
            <div class="col-lg-3 me-3">
                <x-card-no-button style="margin-top: 300px" total="9">Jumlah Pengajuan Permit</x-card-no-button>
            </div>
        </div>
    </div>
@endsection
