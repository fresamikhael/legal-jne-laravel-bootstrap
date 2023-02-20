@extends('layouts.user')

@section('title')
    Perizinan baru
@endsection

@section('content')
    <x-base>
        {{-- @slot('alert')
      <x-alert message="test" type="danger"></x-alert>
    @endslot --}}
        <form class="mt-4" method="post" enctype="multipart/form-data" action="{{ route('permit.update', $data->id) }}">
            @csrf
            <div class="d-flex align-items-center justify-content-between">
                <h2>Perizinan Baru</h2>


            </div>

            <div class="form-group mb-3 row">
                <label for="type" class="col-sm-2 col-form-label">Tipe Perizinan</label>

                <div class="col-sm-10">
                    <select class="form-select" id="permit_type" name="permit_type">
                        <option disabled>---------</option>
                        <option disabled value="Reklame" @if ($data->permit_type == 'Reklame') {{ 'selected' }} @endif>
                            Reklame</option>
                        <option disabled value="IMB" @if ($data->permit_type == 'IMB') {{ 'selected' }} @endif>
                            IMB</option>
                        <option disabled value="SLF" @if ($data->permit_type == 'SLF') {{ 'selected' }} @endif>
                            SLF</option>
                        {{-- <option disabled value="TDG" @if ($data->permit_type == 'TDG') {{ 'selected' }} @endif>
                            TDG</option> --}}
                        <option disabled value="OSS" @if ($data->permit_type == 'OSS') {{ 'selected' }} @endif>OSS
                        </option>
                    </select>
                </div>

            </div>
            @if ($data->permit_type == 'Reklame')
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <x-input label="Nama Pemilik Reklame" name="owner_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required value="{{ $data->owner_name }}" />
                        <x-select labelClass="col-sm-2" fieldClass="col-sm-10" label="Status Gedung" name="ads_type">
                            <option value="Sewa" @if ($data->ads_type == 'Sewa') {{ 'selected' }} @endif>Sewa*
                            </option>
                            <option value="Milik Pribadi" @if ($data->ads_type == 'Milik Pribadi') {{ 'selected' }} @endif>Milik
                                Pribadi</option>
                        </x-select>
                        <x-input label="Alamat Pemasangan" name="address" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required value="{{ $data->address }}" />
                        <x-input label="Judul Reklame" name="ads_title" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required value="{{ $data->ads_title }}" />
                        <x-input label="Ukuran Reklame" name="ads_size" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required value="{{ $data->ads_size }}" />
                        <x-input label="Ketinggian Reklame" name="ads_height" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required value="{{ $data->ads_height }}" />
                        <x-input label="Jangka Waktu Pemasangan" name="ads_period" labelClass="col-sm-2"
                            fieldClass="col-sm-10" required value="{{ $data->ads_period }}" />
                        <x-input label="Alasan Permohonan" name="application_reason" labelClass="col-sm-2"
                            fieldClass="col-sm-10" required value="{{ $data->application_reason }}" />
                        <label>Dokumen Pendukung :</label>
                        <br />
                        @foreach ($dataFile as $key => $items)
                            <div class="pull-right">
                                <div class="col-sm-12">
                                    @php
                                        $file = explode(',', $items->filepath);
                                    @endphp
                                    @foreach ($file as $keys => $item)
                                        <a href="{{ route('download.permit', substr($item, 7)) }}" style="font-size:24px "
                                            class="pull-right">
                                            <div
                                                class="col-sm-11 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                <i class="fa fa-download"></i>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            @if ($items->field_name == 'Dokumen Pendukung Lainnya')
                                <x-input label="{{ $key + 1 }}. {{ $items->field_name }}" name="fileother[]"
                                    type="file" labelClass="col-sm-4" fieldClass="col-sm-8" multiple
                                    accept="application/pdf" />
                                <input type="hidden" name="fieldname[]" value="{{ $items->field_name }}" />
                            @else
                                <x-input label="{{ $key + 1 }}. {{ $items->field_name }}" name="file[]"
                                    type="file" labelClass="col-sm-4" fieldClass="col-sm-8" accept="application/pdf" />
                                <input type="hidden" name="fieldname[]" value="{{ $items->field_name }}" />
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
            @if ($data->permit_type == 'IMB')
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10" required
                            value="{{ $data->location }}" />
                        <x-input label="Luas Bangunan" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required value="{{ $data->building_area }}" />
                        <x-input label="Luas Tanah" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required value="{{ $data->surface_area }}" />
                        <x-input label="Alasan Permohonan" name="application_reason" labelClass="col-sm-2"
                            fieldClass="col-sm-10" required value="{{ $data->application_reason }}" />
                        <label>Dokumen Pendukung :</label>
                        <br />
                        @foreach ($dataFile as $key => $items)
                            <div class="pull-right">
                                <div class="col-sm-12">
                                    @php
                                        $file = explode(',', $items->filepath);
                                    @endphp
                                    @foreach ($file as $keys => $item)
                                        <a href="{{ route('download.permit', substr($item, 7)) }}"
                                            style="font-size:24px " class="pull-right">
                                            <div
                                                class="col-sm-11 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                <i class="fa fa-download"></i>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            @if ($items->field_name == 'Dokumen Pendukung Lainnya')
                                <x-input label="{{ $key + 1 }}. {{ $items->field_name }}" name="fileother[]"
                                    type="file" labelClass="col-sm-4" fieldClass="col-sm-8" multiple
                                    accept="application/pdf" />
                                <input type="hidden" name="fieldname[]" value="{{ $items->field_name }}" />
                            @else
                                <x-input label="{{ $key + 1 }}. {{ $items->field_name }}" name="file[]"
                                    type="file" labelClass="col-sm-4" fieldClass="col-sm-8"
                                    accept="application/pdf" />
                                <input type="hidden" name="fieldname[]" value="{{ $items->field_name }}" />
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
            @if ($data->permit_type == 'SLF')
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10" required
                            value="{{ $data->location }}" />
                        <x-input label="Luas Bangunan" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required value="{{ $data->building_area }}" />
                        <x-input label="Luas Tanah" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required value="{{ $data->surface_area }}" />
                        <x-input label="Alasan Permohonan" name="application_reason" labelClass="col-sm-2"
                            fieldClass="col-sm-10" required value="{{ $data->application_reason }}" />
                        <label>Dokumen Pendukung :</label>
                        <br />
                        @foreach ($dataFile as $key => $items)
                            <div class="pull-right">
                                <div class="col-sm-12">
                                    @php
                                        $file = explode(',', $items->filepath);
                                    @endphp
                                    @foreach ($file as $keys => $item)
                                        <a href="{{ route('download.permit', substr($item, 7)) }}"
                                            style="font-size:24px " class="pull-right">
                                            <div
                                                class="col-sm-11 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                <i class="fa fa-download"></i>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            @if ($items->field_name == 'Dokumen Pendukung Lainnya')
                                <x-input label="{{ $key + 1 }}. {{ $items->field_name }}" name="fileother[]"
                                    type="file" labelClass="col-sm-4" fieldClass="col-sm-8" multiple
                                    accept="application/pdf" />
                                <input type="hidden" name="fieldname[]" value="{{ $items->field_name }}" />
                            @else
                                <x-input label="{{ $key + 1 }}. {{ $items->field_name }}" name="file[]"
                                    type="file" labelClass="col-sm-4" fieldClass="col-sm-8"
                                    accept="application/pdf" />
                                <input type="hidden" name="fieldname[]" value="{{ $items->field_name }}" />
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
            @if ($data->permit_type == 'TDG')
            @endif
            @if ($data->permit_type == 'OSS')
                <div class="row mt-3">
                    <div class="col-sm-12">
                        <x-address label="" name="oss"></x-address>
                        <x-input label="Alamat Lokasi" name="branch_location" labelClass="col-sm-2"
                            fieldClass="col-sm-10" required value="{{ $data->branch_location }}" />
                        <x-input label="RT/RW" name="branch_rt" labelClass="col-sm-2" fieldClass="col-sm-10" required
                            value="{{ $data->branch_rt }}" />
                        <x-input label="Kode Pos" name="branch_postal_code" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required value="{{ $data->branch_postal_code }}" />
                        <x-input label="Longtitude" name="branch_longtitude" labelClass="col-sm-2"
                            fieldClass="col-sm-10" required value="{{ $data->branch_longitude }}" />
                        <x-input label="Latitude" name="branch_latitude" labelClass="col-sm-2" fieldClass="col-sm-10"
                            required value="{{ $data->branch_latitude }}" />
                        <x-input label="Alasan Permohonan" name="application_reason" labelClass="col-sm-2"
                            fieldClass="col-sm-10" required value="{{ $data->application_reason }}" />
                        <label>Dokumen Pendukung :</label>
                        <br />
                        @foreach ($dataFile as $key => $items)
                            <div class="pull-right">
                                <div class="col-sm-12">
                                    @php
                                        $file = explode(',', $items->filepath);
                                    @endphp
                                    @foreach ($file as $keys => $item)
                                        <a href="{{ route('download.permit', substr($item, 7)) }}"
                                            style="font-size:24px " class="pull-right">
                                            <div
                                                class="col-sm-11 col-form-label btn btn-primary justify-content-center bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                                <i class="fa fa-download"></i>
                                            </div>
                                        </a>
                                    @endforeach
                                </div>
                            </div>
                            @if ($items->field_name == 'Dokumen Pendukung Lainnya')
                                <x-input label="{{ $key + 1 }}. {{ $items->field_name }}" name="fileother[]"
                                    type="file" labelClass="col-sm-4" fieldClass="col-sm-8" multiple
                                    accept="application/pdf" />
                                <input type="hidden" name="fieldname[]" value="{{ $items->field_name }}" />
                            @else
                                <x-input label="{{ $key + 1 }}. {{ $items->field_name }}" name="file[]"
                                    type="file" labelClass="col-sm-4" fieldClass="col-sm-8"
                                    accept="application/pdf" />
                                <input type="hidden" name="fieldname[]" value="{{ $items->field_name }}" />
                            @endif
                        @endforeach
                    </div>
                </div>
            @endif
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button class="btn btn-danger btn-lg px-4 py-2" type="submit"
                    style="background-color:#fe3f40">Submit</button>
            </div>
        </form>
    </x-base>
@endsection
