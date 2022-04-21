@extends('layouts.user')

@section('title')
    Perizinan baru
@endsection

@section('content')
    <x-base>
        {{-- @slot('alert')
      <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        <div class="d-flex align-items-center justify-content-between">
            <h2>Perizinan Baru</h2>
            <x-modal-history>
                @slot('header')
                    <tr>
                        <th>No</th>
                        <th>Nomor Kasus</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                @endslot

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
        <form class="mt-4" method="post" enctype="multipart/form-data"
            action="{{ route('permit.newpermit-post') }}">
            @csrf
<<<<<<< HEAD:resources/views/pages/legal/permit/perizinan-baru/perizinan-baru.blade.php
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

=======
            <input type="hidden" name="id" value="{{ $no_kasus }}">
>>>>>>> 322955f346cfeccdb93254683dea70786dd87f7c:resources/views/pages/legal/permit/perizinan-baru.blade.php
            <input type="hidden" name="user_id" value="USR002">
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
            <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"></x-input>
            <x-input label="Spesifikasi" name="specification" labelClass="col-sm-2" fieldClass="col-sm-10"></x-input>
            <x-input label="Alasan Permohonan" name="application_reason" labelClass="col-sm-2" fieldClass="col-sm-10">
            </x-input>
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Alasan Permohonan</label>
                <div class="col-sm-10">
                    <textarea class="form-control" placeholder="Leave a comment here" id="floatingTextarea2"
                        style="height: 100px"></textarea>
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
        </form>

        {{-- <x-input label="Lokasi"></x-input> --}}
    </x-base>
@endsection
