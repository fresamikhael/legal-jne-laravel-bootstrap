@extends ('layouts.legal')

@section('title')
    Add Unit Database
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
                            <li class="breadcrumb-item active" aria-current="page">
                                Tambah Tipe</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="d-flex align-items-center justify-content-end mt-4">
            <x-modal-history id="dataTables">
                @slot('header')
                    <tr>
                        <th>No</th>
                        <th>Tipe</th>
                        <th>Jenis</th>
                        <th>Aksi</th>
                    </tr>
                @endslot

                @slot('data')
                    @foreach ($table as $row)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->name }}</td>
                            <td>
                                {{ $row->type }}
                            </td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1"
                                        data-bs-toggle="dropdown" aria-expanded="false">
                                        Aksi
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li>
                                            <a class="dropdown-item"
                                                href="{{ route('legal.regulation.edit-type', [$row->id]) }}">Ubah</a>
                                        </li>
                                        <li><a class="dropdown-item"
                                                href="{{ route('legal.regulation.delete-type', [$row->id]) }}">Hapus</a>
                                        </li>
                                    </ul>
                                </div>
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
        <form class="mt-4" method="POST" enctype="multipart/form-data"
            action="{{ route('legal.regulation.store-type') }}">
            @csrf
            <div class="row mt-4">
                <div class="form-group row">
                    <label for="inputName" class="col-sm-2 col-form-label">Name</label>
                    <div class="col-sm-3">
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="inputName"
                            placeholder="Name" name="name" value="{{ old('name') }}">
                        @error('name')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>
                </div>
                <input type="hidden" name="type" value="Khusus">
            </div>

            <div class="form-group row">

                <label for="inputGender" class="col-sm-2 col-form-label">Region</label>
                <div class="col-sm-3">
                    <select class="custom-select @error('type_id') is-invalid @enderror" id="inputType" name="type_id">

                        <option selected hidden disabled>Select Region</option>
                        @foreach ($types as $type)
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

            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Submit" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-/bQdsTh/da6pkI1MST/rWKFNjaCP5gBSY4sEBT38Q/9RBh9AH40zEOg7Hlq2THRZ" crossorigin="anonymous">
    </script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
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
