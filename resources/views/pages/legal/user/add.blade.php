@extends('layouts.legal')

@section('title')
    Tambah User Baru
@endsection

@section('content')
    <style>
        .close {
            display: none;
        }
    </style>
    <x-base>
        <div class="row">
            <div class="col-sm-12">
                <div class="col px-3 py-3" style="background-color: rgb(239, 236, 236); border-radius: 10px;">
                    <nav style="--bs-breadcrumb-divider: '>'; margin-top: -5px; margin-bottom: -18px" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('legal-home') }}" style="color:#fe1717">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('legal.user.index') }}"
                                    style="color:#fe1717">User</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Tambah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @if (Session::get('message_fails'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_fails') }}" type="danger" />
            @endslot
        @endif

        {{-- <!-- Button trigger modal -->
        <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
            Launch static backdrop modal
        </button> --}}

        {{-- <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
            aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Diri terlebih dahulu sebelum mengakses
                            database</h5>
                        <button data-dismiss="modal" class="close" type="button">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nama Lengkap:</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nomor Induk Kewarganegaraan
                                    (NIK):</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Lokasi Pekerjaan:</label>
                                <input type="text" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Submit Data</button>
                    </div>
                </div>
            </div>
        </div> --}}
        {{-- <button data-keyboard="false" type="button" class="btn btn-primary" data-bs-toggle="modal"
            data-bs-target="#exampleModal" data-backdrop="static" data-bs-whatever="@mdo">Open modal for @mdo</button>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-fullscreen">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Masukkan Data Diri terlebih dahulu sebelum mengakses
                            database</h5>
                        <button data-dismiss="modal" class="close" type="button">
                            <span aria-hidden="true">×</span>
                            <span class="sr-only">Close</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <form>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nama Lengkap:</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Nomor Induk Kewarganegaraan
                                    (NIK):</label>
                                <input type="text" class="form-control">
                            </div>
                            <div class="mb-3">
                                <label for="recipient-name" class="col-form-label">Lokasi Pekerjaan:</label>
                                <input type="text" class="form-control">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </div>
        </div> --}}

        <form method="POST" enctype="multipart/form-data" action="{{ route('legal.user.store') }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Lengkap" name="name" required />
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis User" name="role" required>
                        <option value="USER">User Non-Legal</option>
                        <option value="LEGAL">Legal</option>
                        <option value="CS">CS</option>
                        <option value="LITI1">Legal Litigasi 1</option>
                        <option value="LITI2">Legal Litigasi 2</option>
                        <option value="CD">Contract Business</option>
                        <option value="HEADLEGAL">Kepala Legal</option>
                    </x-select>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Induk Kewarganegaraan(NIK)"
                        name="nik" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Email" name="email" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Password" name="password" required />
                </div>
            </div>

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>

    <script type="text/javascript">
        $(window).on('load', function() {
            $('#exampleModal').modal('show');
        });
    </script>
@endsection
