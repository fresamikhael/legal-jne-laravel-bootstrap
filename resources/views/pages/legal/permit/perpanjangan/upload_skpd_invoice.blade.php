@extends('layouts.user')

@section('title')
    Perpanjangan Perizinan
@endsection

@section('content')
    <x-base>
        {{-- @slot('alert')
      <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        <form class="mt-4" method="post" enctype="multipart/form-data"
            action="{{ route('legal.perpanjangan.update_invoice', $data->id) }}">
            @csrf
            <div class="d-flex align-items-center justify-content-between">
                <h2>Upload Bukti Pembayaran dan SKPD</h2>
            </div>


            <div class="mt-4 mb-3 row">
                <label class="col-sm-2 col-form-label">Dokumen Pendukung :</label>
            </div>
            <x-input label="Expired" name="expired" type="date" labelClass="col-sm-4" fieldClass="col-sm-8" required>
            </x-input>
            <x-input label="1. SKPD" name="latest_skpd" type="file" labelClass="col-sm-4" fieldClass="col-sm-8" required>
            </x-input>
            <x-input label="2. Bukti pembayaran" name="proof_of_payment" type="file" labelClass="col-sm-4"
                fieldClass="col-sm-8" required>
            </x-input>
            <label class="col-sm-2 col-form-label">Note</label>
            <div class="mb-3 row">
                <div class="col-sm-12">
                    <textarea class="form-control h-100 mt-0" name="note" id="floatingTextarea2" style="height: 100px"
                        required>Permohonan pengajuan reklame telah selesai, Silahkan download file SKPD sebagai arsip apabila ada pemeriksaan dari instansi berwenang</textarea>
                </div>
            </div>
            <input type="hidden" name="status" value="CLOSED">



            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-danger btn-lg px-4 py-2" type="submit"
                    style="background-color:#fe3f40">Submit</button>
            </div>

        </form>


        {{-- <x-input label="Lokasi"></x-input> --}}
    </x-base>
@endsection
