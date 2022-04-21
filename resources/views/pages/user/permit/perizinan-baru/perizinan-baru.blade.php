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
                <x-modal-history id="dataTables">
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
                {{-- <input type="hidden" name="id"> --}}
                <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
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
                {{-- <x-input label="Alasan Permohonan" name="application_reason" labelClass="col-sm-2" fieldClass="col-sm-10">
                </x-input> --}}
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Alasan Permohonan</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="application_reason" placeholder="Leave a comment here" id="floatingTextarea2"
                            style="height: 100px"></textarea>
                    </div>
                </div>
                <div class="mt-4 mb-3 row">
                    <label class="col-sm-2 col-form-label">Dokumen Pendukung :</label>
                </div>
                <x-input label="1. Disposisi" name="file_disposition" type="file" labelClass="col-sm-4"
                    fieldClass="col-sm-8">
                </x-input>
                <x-input label="2. Dokumen 1" name="file_document1" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
                </x-input>
                <x-input label="3. Dokumen 2" name="file_document2" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
                </x-input>
                <x-input label="4. Dokumen 3" name="file_document3" type="file" labelClass="col-sm-4" fieldClass="col-sm-8">
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

@push('addon-script')
    <script type="text/javascript">
        $(function() {
            var table = $('#dataTables').DataTable({
                paging: false,
                searching: false,
                retrieve: true,
                processing: true,
                serverSide: true,
                ordering: true,
                ajax: "{{ route('permit.newpermit') }}",
                columns: [{
                        data: 'id',
                        name: 'id',
                        "className": "text-center"
                    },
                    {
                        data: 'id',
                        name: 'id',
                        "className": "text-center"
                    },
                    {
                        data: 'action',
                        name: 'action',
                        "className": "text-center",
                        orderable: true,
                        searchable: true
                    },
                ]
            });

        });
    </script>
@endpush
