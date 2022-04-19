@extends('layouts.user')

@section('title')
    Tambah Database Baru
@endsection

@section('content')
    <x-base>
        <div class="d-flex align-items-center justify-content-between">
            <h2>Tambah Database Baru</h2>
        </div>
        
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success"/>
            @endslot
        @endif

        <form method="POST" enctype="multipart/form-data" action="{{ route('database.store') }}">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Peraturan" name="name" required/>
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Tipe Peraturan" name="type" required>
                        <option value="UU">UU</option>
                        <option value="PERPU">PERPU</option>
                        <option value="PP">PP</option>
                        <option value="PERPRES">PERPRES</option>
                    </x-select>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Entitas" name="entity" required/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Peraturan" name="number" required/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tahun Peraturan" name="year" required/>
                    <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Tentang" name="title" required/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Ditetapkan" type="date" name="set_date" required/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Diundangkan" type="date" name="promulgated_date" required/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Berlaku" type="date" name="valid_date" required/>
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Sumber" name="source" required/>
                    <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Status Peraturan" name="status" required>
                        <option value="Aktif">Aktif</option>
                        <option value="Tidak Aktif">Tidak Aktif</option>
                    </x-select>
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Upload File" name="file_database[]" multiple/>
                </div>
            </div>
    
            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
