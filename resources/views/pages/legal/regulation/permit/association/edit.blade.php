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
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Tentang</label>
                <div class="col-sm-10">
                    <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" > {{ $database->about }}</textarea>
                </div>
            </div>
            <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->type }}" />
            <x-input value="Asosiasi" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->unit }}" />
            <x-input value="Asosiasi" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->category }}" />
            <div class="mb-3 row">
                <label for="date" class="col-sm-2 col-form-label">Tanggal Penerbitan</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control dates cannot_texting" id="date" name="date"
                            value="{{ $database->date }}" />
                        <div class="input-group-text"><span class="fa fa-th"></span></div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Awal</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control dates cannot_texting" id="date"
                            value="{{ $database->date_awal }}" name="date_awal" />
                        <div class="input-group-text"><span class="fa fa-th"></span></div>
                    </div>
                </div>
            </div>
            <div class="mb-3 row">
                <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Akhir</label>
                <div class="col-sm-10">
                    <div class="input-group">
                        <input type="text" class="form-control dates cannot_texting" id="date"
                            value="{{ $database->date_akhir }}" name="date_akhir" />
                        <div class="input-group-text"><span class="fa fa-th"></span></div>
                    </div>
                </div>
            </div>
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
