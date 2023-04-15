@extends ('layouts.legal')

@section('title')
    Add Database Khusus
@endsection

@section('content')
    <x-base>
        <div class="row">
            <div class="col-sm-12">
                <div class="col px-3 py-3" style="background-color: rgb(239, 236, 236); border-radius: 10px;">
                    <nav style="--bs-breadcrumb-divider: '>'; margin-top: -5px; margin-bottom: -18px" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('legal-home') }}" style="color:#fe1717">Home</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('legal.regulation.index') }}"
                                    style="color:#fe1717">Database</a>
                            </li>
                            <li class="breadcrumb-item"><a href="{{ route('legal.regulation.add') }}"
                                    style="color:#fe1717">Khusus</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Tambah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif
        <div class="row">
            <div class="d-flex justify-content-end">
                <div class="mt-3">
                    <a href={{ route('legal.regulation.add-type') }} class="btn btn-primary"><i class="fas fa-edit"></i>
                        Tipe Dokumen</a>
                    <a href={{ route('legal.regulation.add-unit') }} class="btn btn-primary"><i class="fas fa-edit"></i>
                        Unit</a>
                </div>
            </div>
        </div>
        <form class="mt-4" method="POST" enctype="multipart/form-data"
            action="{{ route('legal.regulation.normative-post') }}">
            @csrf
            <div class="row mt-4">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Dokumen" name="name">
                </x-input>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Dokumen" name="type">
                    @foreach ($type as $t)
                        <option value="{{ $t->name }}">{{ $t->name }}</option>
                    @endforeach
                </x-select>
                {{-- <div class="form-group row">
                    <label for="inputGender" class="col-sm-2 col-form-label">Tipe Dokumen</label>
                    <div class="col-sm-3">
                        <select class="custom-select @error('type_id') is-invalid @enderror" id="inputType" name="type">
                            <option selected hidden disabled>Select Type</option>
                            @foreach ($type as $type)
                                <option value="{{ $type->id }}">{{ $type->name }}</option>
                            @endforeach
                        </select>
                        @error('type_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <div class="form-group row">
                    <label for="inputGender" class="col-sm-2 col-form-label">Office</label>
                    <div class="col-sm-3">
                        <select class="custom-select @error('unit_id') is-invalid @enderror" id="unit" name="unit_id">

                        </select>
                        @error('unit_id')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div> --}}
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Dikeluarkan/Mitra" name="agency" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Dokumen" name="number" />
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal Dokumen" type="date"
                    name="date" />
                {{-- <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Tentang" name="about"  /> --}}
                <div class="mb-3 row">
                    <label class="col-sm-5 col-form-label">Tentang</label>
                    <div class="col-sm-7">
                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" style="height: 100px"></textarea>
                    </div>
                </div>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Unit" name="unit">
                    <option value="Drafting">Drafting</option>
                    <option value="Litigation">Litigation</option>
                    <option value="Permit">Permit</option>
                    <option value="Corporate">Corporate</option>
                </x-select>
                <input type="hidden" name="privilege" value="RESTRICTED">
                <div class="col-sm-12">
                    <label for="">Note terkait dokumen</label>
                </div>
                <div class="col-sm-12 mb-3">
                    <textarea name="note" id="editor"></textarea>
                </div>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tanggal" type="date" name="set_date"
                    value="{{ Carbon\Carbon::today()->toDateString() }}" />
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7"
                    label="Update Dokumen(diisi apabila dokumen ini pembaharuan dari dokumen sebelumnya)"
                    name="historical_id">
                    @foreach ($database as $d)
                        <option value="{{ $d->id }}">{{ $d->name }} | {{ $d->type }}</option>
                    @endforeach
                </x-select>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Status Dokumen" name="status">
                    <option value="Aktif">Aktif</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </x-select>
                <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="Upload File" name="file_database[]" multiple />
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Upload" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
    {{-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script> --}}
    <script>
        $(document).ready(function() {
            $('#inputType').on('change', function(e) {
                var typeID = $(this).val();
                var url = '{{ route('getunit', ':id') }}'
                url = url.replace(':id', typeID);
                if (typeID) {
                    $.ajax({
                        url: url,
                        type: "GET",
                        enctype: 'multipart/form-data',
                        data: {
                            "_token": "{{ csrf_token() }}"
                        },
                        // headers: {
                        //     'X-CSRF-Token': '{{ csrf_token() }}',
                        // },

                        dataType: "json",
                        success: function(data) {
                            if (data) {
                                $('#unit').empty();
                                $('#unit').append(
                                    '<option  hidden selected disabled>Choose unit</option>'
                                );
                                $.each(data, function(key, unit) {
                                    $('select[name="unit_id"]').append(
                                        '<option value="' + unit.id + '">' +
                                        unit
                                        .name + '</option>');
                                });
                            } else {
                                $('#unit').empty();
                            }
                        }
                    });
                } else {
                    $('#unit').empty();
                }
            });
        });
    </script>
@endsection
