@extends ('layouts.legal')

@section('title')
    Add Tipe Database
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
            action="{{ route('legal.regulation.store-unit') }}">
            @csrf
            <div class="row mt-4">
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Dokumen" name="type_id" required>
                    @foreach ($types as $t)
                        <option value="{{ $t->id }}">{{ $t->name }}</option>
                    @endforeach
                </x-select>
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Tipe Unit" name="name" required>
                </x-input>
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Submit" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
