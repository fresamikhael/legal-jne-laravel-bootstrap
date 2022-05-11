@extends('layouts.user')

@section('title')
    Permohoman Dokumen
@endsection

@section('content')
    <x-base>
        {{-- @slot('alert')
      <x-alert message="test" type="danger"></x-alert>
    @endslot --}}

        <div class="d-flex align-items-center justify-content-between">
            <h2>Permohoman Dokumen</h2>
            {{-- <x-modal-history>
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
                </x-modal-history> --}}
        </div>
        <div class="row mt-3">

            <div class="mb-3 row">
                <label for="id" class="col-sm-2 col-form-label">Tanggal Permohonan</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $data->created_at->format('m/d/Y') }}"
                            name="id" disabled />
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="permit_type" class="col-sm-2 col-form-label">Nama Pemohon</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $user->name }}" name="permit_type" disabled />

                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="location" class="col-sm-2 col-form-label">Nama Dokumen</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $data->document_name }}" name="location"
                            disabled />
                        {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="specification" class="col-sm-2 col-form-label">Tipe Document</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $data->document_type }}" name="specification"
                            disabled />
                        {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                    </div>
                </div>
            </div>



            {{-- <x-input label="Alasan Permohonan" name="application_reason" value="{{ $permit->location }}"
                    labelClass="col-sm-2" fieldClass="col-sm-10" read-only>
                </x-input> --}}
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Alasan Permohonan Document</label>
                <div class="col-sm-10">
                    <textarea class="form-control" id="floatingTextarea2" style="height: 100px"
                        readonly>{{ $data->request_document_reason }}</textarea>
                </div>
            </div>


            @if ($data->note == null)
                <label class="col-sm-2 col-form-label">Note</label>
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px" disabled>Tidak ada</textarea>
                    </div>
                </div>
            @else
                <label class="col-sm-2 col-form-label">Note</label>
                <div class="mb-3 row">
                    <div class="col-sm-12">
                        <textarea class="form-control" name="note" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px" disabled>{{ $data->note }}</textarea>
                    </div>
                </div>
            @endif


            <label for="id" class="col-sm-2 col-form-label">Status</label>
            <div class="mb-3 row">
                <div class="col-sm-12">
                    <div class="input-group">
                        <input type="text" class="form-control" value="{{ $data->status }}" name="id" disabled />
                        {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                    </div>
                </div>
            </div>
            {{-- @if ($data->status == 'RETURN')
                <div class="mb-3 row">
                    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                        <a href="{{ route('permit.edit', $permit->id) }}" class="btn btn-danger btn-lg px-4 py-2"
                            style="background-color:#fe3f40">Edit</a>
                    </div>
                </div>
            @endif --}}



            {{-- <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <button value="return" name="action" class="btn btn-danger btn-lg px-4 py-2" type="submit"
                        style="background-color:#fe3f40">return</button>
                    <button value="approve" name="action" class="btn btn-danger btn-lg px-4 py-2" type="submit"
                        style="background-color:#fe3f40">approve</button>
                </div> --}}
        </div>




        {{-- <x-input label="Lokasi"></x-input> --}}
    </x-base>
@endsection
