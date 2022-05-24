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
            <h2>Update Permohoman Dokumen</h2>
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



            <form class="mt-4" method="post" enctype="multipart/form-data"
                action="{{ route('legal.document_request.updatedoc_out_post', $file->id) }}">
                @csrf
                <x-input label="Dokumen Keluar" name="doc_out" type="date" labelClass="col-sm-2" fieldClass="col-sm-10"
                    required>
                </x-input>

                <div class="mb-3 row">
                    <div class="d-flex align-items-center gap-3 justify-content-end">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-danger" name="action" value="return">Update</button>
                        </div>

                    </div>
                </div>
            </form>

        </div>


        {{-- <x-input label="Lokasi"></x-input> --}}
    </x-base>
@endsection
