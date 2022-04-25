@extends('layouts.user')

@section('title')
    Perizinan baru
@endsection

@section('content')
    <x-base>
        {{-- @slot('alert')
      <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        <form class="mt-4" method="post" enctype="multipart/form-data"
            action="{{ route('legal.permit.update', $data->id) }}">
            @csrf
            <div class="d-flex align-items-center justify-content-between">
                <h2>Perizinan Baru</h2>


            </div>


            <div class="mt-4 mb-3 row">
                <label class="col-sm-2 col-form-label">Dokumen Pendukung :</label>
            </div>
            <x-input label="1. SKPD" name="latest_skpd" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
            </x-input>


            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-danger btn-lg px-4 py-2" type="submit"
                    style="background-color:#fe3f40">Submit</button>
            </div>

        </form>


        {{-- <x-input label="Lokasi"></x-input> --}}
    </x-base>
@endsection
