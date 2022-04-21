@extends ('layouts.user')

@section('title')
    Add Regulasi Internal
@endsection

@section('content')
    <x-base>
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif
        <form class="mt-4" method="POST" enctype="multipart/form-data"
            action="{{ route('regulation.internal-update', $data->id) }}">
            @csrf

            <h2>Regulasi Internal</h2>
            <div class="row mt-4">
                {{-- <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Regulasi" name="name"
                    value="{{ $data->name }}"></x-input> --}}
                <div class="mb-3 row">
                    <label for="id" class="col-sm-5 col-form-label">Nama Regulasi</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $data->name }}" name="name" />
                            {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                        </div>
                    </div>
                </div>
                <div class="form-group mb-3 row">
                    <label for="type" class="col-sm-5 col-form-label">Tipe Regulasi</label>
                    <div class="col-sm-7">
                        <select class="form-select
                        {{-- @error('region_id') is-invalid @enderror --}}
                        "
                            id="type" name="type">
                            {{-- <option hidden>Choose Category</option> --}}
                            @foreach ($type as $types)
                                <option value="{{ $types->name }}"
                                    {{ collect($types->name)->contains($data->rule_type) ? 'selected' : '' }}>
                                    {{ $types->name }}</option>
                            @endforeach
                        </select>
                        {{-- @error('region_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror --}}
                    </div>

                </div>
                <div class="mb-3 row">
                    <label for="id" class="col-sm-5 col-form-label">File Regulasi</label>
                    <div class="col-sm-7">
                        <div class="input-group">
                            <input type="text" class="form-control" value="{{ $data->name }}" name="name" />
                            {{-- <span class="input-group-text">{{ $postfix }}</span> --}}
                        </div>
                    </div>
                </div>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Upload File" name="file"
                    value="{{ $data->file }}">
                </x-file>
            </div>


            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Upload" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
