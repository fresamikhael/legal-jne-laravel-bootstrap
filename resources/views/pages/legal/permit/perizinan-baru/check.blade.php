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
            action="{{ route('permit.newpermit-post') }}">
            @csrf
            <div class="d-flex align-items-center justify-content-between">
                <h2>Perizinan Baru</h2>
                <x-modal-history>
                    @slot('data')
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <a href="" class="btn btn-primary">Lihat</a>
                            </td>
                        </tr>
                    @endslot
                </x-modal-history>
            </div>
            <div class="row mt-3">
                <x-input label="No Kasus" name="id" value="asd" labelClass="col-sm-2" fieldClass="col-sm-10" read-only>
                </x-input>

                <x-input label="Tipe Perizinan" name="permit_type" labelClass="col-sm-2" fieldClass="col-sm-10" read-only>
                </x-input>

                <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10" read-only></x-input>
                <x-input label="Spesifikasi" name="specification" labelClass="col-sm-2" fieldClass="col-sm-10" read-only>
                </x-input>
                <x-input label="Alasan Permohonan" name="application_reason" labelClass="col-sm-2" fieldClass="col-sm-10"
                    read-only>
                </x-input>
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Alasan Permohonan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2" style="height: 100px"
                            readonly></textarea>
                    </div>
                </div>
                <div class="mt-4 mb-3 row">
                    <label class="col-sm-2 col-form-label">Dokumen Pendukung :</label>
                </div>
                <x-input label="Disposisi" name="file_disposition" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
                </x-input>
                <x-input label="Dokumen 1" name="file_document1" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
                </x-input>
                <x-input label="Dokumen 2" name="file_document2" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
                </x-input>
                <x-input label="Dokumen 3" name="file_document3" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
                </x-input>

                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button class="btn btn-danger btn-lg px-4 py-2" type="submit"
                        style="background-color:#fe3f40">Button</button>
                </div>
            </div>
        </form>


        {{-- <x-input label="Lokasi"></x-input> --}}
    </x-base>
@endsection
