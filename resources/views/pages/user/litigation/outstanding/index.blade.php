@extends('layouts.user')

@section('title')
    Others
@endsection

@section('content')
    <x-base>
        <x-button-back />

        <div class="d-flex align-items-center justify-content-between">
            <h2>Others</h2>

            <x-modal-history id="dataTables">
                @slot('header')
                    <tr>
                        <th>No</th>
                        <th>Nomor Kasus</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                @endslot
                @slot('data')
                    @foreach ($data as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->id }}</td>
                            <td>{{ $row->status }}</td>
                            <td>
                                @if ($row->status == 'USER SEND SUBPOENA SIGNATURE')
                                    <a href="{{ route('litigation.outstanding.update', [$row->id]) }}"
                                        class="btn btn-primary">Lihat</a>
                                @elseif ($row->status == 'PROGRESS SENT BY LEGAL')
                                    <a href="{{ route('litigation.outstanding.update', [$row->id]) }}"
                                        class="btn btn-primary">Check</a>
                                @else
                                    <a href="{{ route('litigation.outstanding.show', $row->id) }}"
                                        class="btn btn-primary">Lihat</a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @endslot
            </x-modal-history>
        </div>

        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif

        <form action="{{ route('litigation.outstanding.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row mt-3">
                <div class="col-sm-12">
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Penggugat" name="company_name"
                        type="text" required />
                    <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Tergugat" name="person_responsible"
                        required />

                    <hr>

                    <div class="col-sm-3">
                        <h4>Alamat Penggugat/Tergugat :</h4>
                    </div>
                    <x-address label="Penggugat/Tergugat" name="agent" />




                </div>
            </div>

            <hr>

            <div class="row">
                <div class="col-sm-12">
                    <x-textarea label="Kronologis Singkat Kejadian:" name="incident_chronology" required />
                </div>
            </div>

            <hr>

            <div class="row mt-3">
                <div class="col-sm-3">
                    <h5>Upload Dokumen :</h5>
                </div>
                <div class="col-sm-9">
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Disposisi Management*"
                        name="file_management_disposition" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Akta Pendirian dan Perubahan Terakhir"
                        name="file_deed_of_incoporation" option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. SK Menkumham" name="file_sk_menkumham"
                        option />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. KTP Direksi*"
                        name="file_director_id_card" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. NPWP*" name="file_npwp" />
                    <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. NIB" name="file_nib" option />
                    <div>
                        <input type="text" class="col-sm-5">
                        <input type="file" class="col-sm-7">
                    </div>

                </div>
            </div>

            <hr>

            <x-input fieldClass="col-sm-12" name="outstanding_packing_list" placeholder="Masukkan link gdrive"
                type="text" />

            <div class="d-flex justify-content-end">
                <x-button type="submit" name="Submit" buttonClass="btn-danger" />
            </div>
        </form>
    </x-base>
@endsection
