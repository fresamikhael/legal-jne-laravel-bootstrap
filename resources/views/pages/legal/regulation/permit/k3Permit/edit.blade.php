<div class="row mt-4">
    <div class="row mt-3">
        <div class="col-sm-12">
            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->title }}" />
            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->code }}" />
            <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->type }}" />
            <x-input value="Izin K3" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->category }}" />
            <x-select labelClass="col-sm-2" fieldClass="col-sm-10" label="Unit" name="unit">
                <option value="Penangkal Petir" {{ $database->unit == 'Penangkal Petir' ? 'selected' : '' }}>Penangkal
                    Petir</option>
                <option value="HT" {{ $database->unit == 'HT' ? 'selected' : '' }}>HT</option>
                <option value="Bejana Tekan" {{ $database->unit == 'Bejana Tekan' ? 'selected' : '' }}>Bejana Tekan
                </option>
                <option value="Lift" {{ $database->unit == 'Lift' ? 'selected' : '' }}>Lift</option>
                <option value="Genset" {{ $database->unit == 'Genset' ? 'selected' : '' }}>Genset</option>
                <option value="Forklift" {{ $database->unit == 'Forklift' ? 'selected' : '' }}>Forklift</option>
                <option value="SIPA" {{ $database->unit == 'SIPA' ? 'selected' : '' }}>SIPA</option>
                <option value="Gondola" {{ $database->unit == 'Gondola' ? 'selected' : '' }}>Gondola</option>
                <option value="X-Ray" {{ $database->unit == 'X-Ray' ? 'selected' : '' }}>X-Ray</option>
                <option value="Motor Diesel" {{ $database->unit == 'Motor Diesel' ? 'selected' : '' }}>Motor Diesel
                </option>
                <option value="Hydrant" {{ $database->unit == 'Hydrant' ? 'selected' : '' }}>Hydrant</option>
                <option value="Tera" {{ $database->unit == 'Tera' ? 'selected' : '' }}>Tera</option>
            </x-select>
            <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->number }}" />
            <x-input type="date" label="Tanggal Penerbitan" name="date" labelClass="col-sm-2"
                fieldClass="col-sm-10" value="{{ $database->date }}" />
            <x-input label="Jangka Waktu Awal" name="date_awal" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->date_awal }}" />
            <x-input label="Jangka Waktu Akhir" name="date_akhir" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->date_akhir }}" />
            <div id="file">
                @foreach ($dataFile as $file)
                    <div class="mb-3 row" id="rowFileExist-{{ $file->id }}">
                        <label for="" class="col-sm-2 col-form-label">File Sebelumnya
                            {{ $file->name == 'upload' ? '' : ucfirst($file->name) }}</label>
                        <div class="col-sm-10 btn-group">
                            <a href="{{ asset($file->filepath) }}" target="_blank" class="btn btn-primary w-100"><i
                                    class="fa fa-eye"></i>Lihat
                            </a>
                            <a href="javascript:removeFile({{ $file->id }})" class="btn btn-danger w-25"><i
                                    class="fa fa-trash"></i> Hapus</a>
                        </div>
                    </div>
                @endforeach
            </div>
            <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                fieldClass="col-sm-10" multiple />
            <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->note }}" />
        </div>
    </div>
</div>
