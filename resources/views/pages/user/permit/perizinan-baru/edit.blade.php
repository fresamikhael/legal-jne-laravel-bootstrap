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
            action="{{ route('permit.update', $data->id) }}">
            @csrf
            <div class="d-flex align-items-center justify-content-between">
                <h2>Perizinan Baru</h2>


            </div>

            <div class="form-group mb-3 row">
                <label for="type" class="col-sm-2 col-form-label">Tipe Perizinan</label>

                <div class="col-sm-10">
                    <select class="form-select
                        {{-- @error('region_id') is-invalid @enderror --}}
                        "
                        id="permit_type" name="permit_type">
                        {{-- <option hidden>Choose Category</option> --}}
                        {{-- <option value="{{ $data->permit_type }}"  selected>{{ $data->permit_type }}</option> --}}
                        <option disabled>---------</option>
                        <option value="Perizinan Reklame" @if ($data->permit_type == 'Perizinan Reklame') {{ 'selected' }} @endif>
                            Perizinan Reklame</option>
                        <option value="Perizinan IMB" @if ($data->permit_type == 'Perizinan IMB') {{ 'selected' }} @endif>
                            Perizinan IMB</option>
                        <option value="Perizinan SLF" @if ($data->permit_type == 'Perizinan SLF') {{ 'selected' }} @endif>
                            Perizinan SLF</option>
                        <option value="Perizinan TDG" @if ($data->permit_type == 'Perizinan TDG') {{ 'selected' }} @endif>
                            Perizinan TDG</option>
                        <option value="OSS" @if ($data->permit_type == 'OSS') {{ 'selected' }} @endif>OSS</option>
                    </select>
                    {{-- @error('region_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror --}}
                </div>

            </div>
            <x-input value="{{ $data->location }}" label="Lokasi" name="location" labelClass="col-sm-2"
                fieldClass="col-sm-10"></x-input>
            <x-input value="{{ $data->specification }}" label="Spesifikasi" name="specification" labelClass="col-sm-2"
                fieldClass="col-sm-10"></x-input>
            {{-- <x-input label="Alasan Permohonan" name="application_reason" labelClass="col-sm-2" fieldClass="col-sm-10">
                </x-input> --}}
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Alasan Permohonan</label>
                <div class="col-sm-10">
                    <textarea class="form-control" name="application_reason" id="floatingTextarea2"
                        style="height: 100px"> {{ $data->application_reason }}</textarea>
                </div>
            </div>
            <div class="mt-4 mb-3 row">
                <label class="col-sm-2 col-form-label">Dokumen Pendukung :</label>
            </div>
            <x-input label="1. Disposisi" name="file_disposition" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
            </x-input>
            <x-input label="2. Dokumen 1" name="file_document1" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
            </x-input>
            <x-input label="3. Dokumen 2" name="file_document2" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
            </x-input>
            <x-input label="4. Dokumen 3" name="file_document3" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
            </x-input>

            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-danger btn-lg px-4 py-2" type="submit"
                    style="background-color:#fe3f40">Submit</button>
            </div>

        </form>


        {{-- <x-input label="Lokasi"></x-input> --}}
    </x-base>
@endsection
