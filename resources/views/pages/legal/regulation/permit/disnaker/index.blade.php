@extends ('layouts.legal')

@section('title')
    Add Database Khusus
@endsection

@section('content')
    <x-base>
        <div class="row">
            <div class="col-sm-12">
                <div class="col px-3 py-3" style="background-color: rgb(239, 236, 236); border-radius: 10px;">
                    <nav style="--bs-breadcrumb-divider: '>'; margin-top: -5px; margin-bottom: -18px" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('legal-home') }}" style="color:#fe1717">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('legal.regulation.index') }}"
                                    style="color:#fe1717">Database</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('legal.regulation.add') }}"
                                    style="color:#fe1717">Khusus</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Tambah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif

        <form class="mt-4" method="POST" enctype="multipart/form-data"
            action="{{ route('legal.regulation.normative-post') }}">
            @csrf
            <div class="row mt-4">
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                        <x-input value="Disnaker" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                        <x-input label="WLTK" name="wltk" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                        <x-input label="BPJS Ketenagakerjaan" name="bpjs" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required />
                        <x-input label="Peraturan Perusahaan" name="pp" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required />
                        <x-input label="LKS Bipartit" name="lks" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required />
                        <x-input label="P2K3" name="p2k3" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                        <x-input label="SMK3" name="smk3" labelClass="col-sm-2" fieldClass="col-sm-10" required />
                        <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Upload" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
