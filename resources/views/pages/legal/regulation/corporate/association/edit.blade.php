<div class="row mt-4">
    <div class="row mt-3">
        <div class="col-sm-12">
            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->title }}" />
            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->code }}" />
            <x-input label="Nama Asosiasi" name="name" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->name }}" />
            <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->number }}" />
            <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->type }}" />
            <x-input value="Asosiasi" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->unit }}" />
            <x-input value="Asosiasi" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->category }}" />
            <x-input type="date" label="Tanggal Penerbitan" name="date" labelClass="col-sm-2"
                fieldClass="col-sm-10" value="{{ $database->date }}" />
            <x-input type="date" label="Jangka Waktu Awal" name="date_awal" labelClass="col-sm-2"
                value="{{ $database->date_awal }}" fieldClass="col-sm-10" />
            <x-input type="date" label="Jangka Waktu AKhir" name="date_akhir" labelClass="col-sm-2"
                value="{{ $database->date_akhir }}" fieldClass="col-sm-10" />
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
