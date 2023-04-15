@extends('layouts.user')

@section('title')
    Perpanjangan Perizinan
@endsection

@section('content')
    <x-base>
        {{-- @slot('alert')
      <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        <form class="mt-4" method="post" enctype="multipart/form-data"
            action="{{ route('headdept.permit.update', $permit->id, $permit->user_id) }}">
            @csrf
            <div class="d-flex align-items-center justify-content-between">
                <h2>Perpanjangan Perizinan</h2>
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
                    <label for="id" class="col-sm-2 col-form-label">No Pengajuan</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->id }}" name="id"
                                disabled />
                            {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                        </div>
                    </div>
                </div>
                <input type="hidden" class="form-control" value="{{ auth()->user()->id }}" name="legal_id" />
                <div class="mb-3 row">
                    <label for="permit_type" class="col-sm-2 col-form-label">Tipe Perizinan</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->permit_type }}" name="permit_type"
                                disabled />
                            {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="location" class="col-sm-2 col-form-label">Lokasi</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->location }}" name="location"
                                disabled />
                            {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                        </div>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="specification" class="col-sm-2 col-form-label">Spesifikasi</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $permit->specification }}"
                                name="specification" disabled />
                            {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                        </div>
                    </div>
                </div>
                <div class="mt-4 mb-3 row">
                    <label class="col-sm-2 col-form-label">Dokumen Pendukung :</label>
                </div>
                @foreach ($permitFile as $key => $items)
                    <div class="mb-3 row">
                        <label for="specification" class="col-sm-4 col-form-label">{{ $key + 1 }}.
                            {{ $items->field_name }}</label>
                        <div class="col-sm-8">
                            @php
                                $file = explode(',', $items->filepath);
                            @endphp
                            @foreach ($file as $key => $item)
                                <a href="{{ route('download.permit', substr($item, 7)) }}" style="font-size:24px ">
                                    <div
                                        class="col-sm-1 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                        File {{ $key + 1 }}
                                    </div>
                                </a>
                            @endforeach
                        </div>
                    </div>
                @endforeach

                <div class="col">
                    <label class="col-sm-2 col-form-label">Note</label>
                    <div class="mb-3 row">
                        <div class="col-sm-12">
                            <textarea class="form-control h-100 mt-0" name="note" placeholder="Leave a comment here" id="floatingTextarea2"
                                style="height: 200px" required></textarea>
                        </div>
                    </div>
                </div>

                <div class="mb-3 row">
                    <div class="d-flex align-items-center gap-3 justify-content-end">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-danger" name="action" value="return">Return</button>
                        </div>
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary" name="action" value="approve">Approve</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </x-base>
@endsection
