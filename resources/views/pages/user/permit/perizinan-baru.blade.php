@extends('layouts.user')

@section('title')
    Perizinan baru
@endsection

@section('content')
    <x-base>
        {{-- @slot('alert')
      <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        <h1 class="mb-4 text-black capitalize font-medium">Perizinan Baru</h1>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Tipe Perizinan</label>
            <div class="col-sm-10">
                <select name="permit_type" class="form-control" aria-label="Default select example">
                    <option value='' style="display: none" selected disabled>-- Pilih --</option>
                    <option value="Perizinan Reklame">Perizinan Reklame</option>
                    <option value="Perizinan IMB">Perizinan IMB</option>
                    <option value="Perizinan SLF">Perizinan SLF</option>
                    <option value="Perizinan TDG">Perizinan TDG</option>
                    <option value="OSS">OSS</option>
                    {{-- <option>Perizinan Reklame</option>
        <option>Perizinan IMB</option>
        <option>Perizinan SLF</option>
        <option>Perizinan TDG</option> --}}
                </select>
            </div>

        </div>
        <x-input label="Lokasi"></x-input>
        <x-input label="Spesifikasi"></x-input>
        <x-input label="Alasan Permohonan"></x-input>
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Tipe Perizinan</label>
            <div class="col-sm-10">
                <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                    style="height: 100px"></textarea>
            </div>
        </div>
        <div class="mt-4 mb-3 row">
            <label class="col-sm-2 col-form-label">Dokumen Pendukung :</label>
        </div>
        <x-input label="Disposisi" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
        </x-input>
        <x-input label="Dokumen 1" type="file" labelClass="col-sm-4" fieldClass="col-sm-8"></x-input>
        <x-input label="Dokumen 2" type="file" labelClass="col-sm-4" fieldClass="col-sm-8"></x-input>
        <x-input label="Dokumen 3" type="file" labelClass="col-sm-4" fieldClass="col-sm-8"></x-input>

        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button class="btn btn-danger btn-lg px-4 py-2" type="submit" style="background-color:#fe3f40">Button</button>
        </div>

        {{-- <x-input label="Lokasi"></x-input> --}}
    </x-base>
@endsection
