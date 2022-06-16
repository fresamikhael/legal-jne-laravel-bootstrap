@extends ('layouts.legal')

@section('title')
    Tambah Informasi
@endsection

@section('content')
    <x-base>
        @if (Session::get('message_success'))
            @slot('alert')
                <x-alert message="{{ Session::get('message_success') }}" type="success" />
            @endslot
        @endif
        <form class="mt-4" method="POST" enctype="multipart/form-data"
            action="{{ route('legal.information.store') }}">
            @csrf

            <h2>Tambah Data</h2>
            <div class="row mt-4">
                <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Judul" name="title" required></x-input>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Tipe Informasi" name="type" required>
                    <option value="QnA">QnA</option>
                    <option value="Klinik Hukum">Klinik Hukum</option>
                </x-select>
                <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Kategori Informasi" name="category" required>
                    <option value="Bisnis">Bisnis</option>
                    <option value="Kekayaan Intelektual">Kekayaan Intelektual</option>
                    <option value="Kenegaraan">Kenegaraan</option>
                </x-select>
                <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Pertanyaan" name="question" required>
                </x-textarea>
                <x-textarea labelClass="col-sm-5" fieldClass="col-sm-7" label="Ulasan" name="description" required>
                </x-textarea>
            </div>

            <div class="d-flex justify-content-end me-4">
                <x-button type="submit" name="Submit" buttonClass="btn-primary" />
            </div>
        </form>

    </x-base>
@endsection
