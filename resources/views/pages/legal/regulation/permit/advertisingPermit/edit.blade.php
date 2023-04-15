<div class="row mt-4">
    <x-input label="Tipe Dokumen" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" value="{{ $database->unit }}"
        readOnly />
    <div class="row mt-3">
        <div class="col-sm-12">
            <label for="">Lokasi</label>
            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->title }}" />
            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->code }}" />
            <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->type }}" />
            <x-input name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden value="{{ $database->unit }}" />
            <x-input name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->category }}" />
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Tentang</label>
                <div class="col-sm-10">
                    <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2"> {{ $database->about }}</textarea>
                </div>
            </div>
            <x-address-custom label="" classLabel="col-sm-2" name="" classField="col-sm-10"
                provinceExist="{{ $database->province }}" regencyExist="{{ $database->regency }}"
                districtExist="{{ $database->district }}" villageExist="{{ $database->village }}"
                postCodeExist="{{ $database->zip_code }}" addressExist="{{ $database->address }}" />
            <x-input label="Nomor Perizinan" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->number }}" />
            <x-input type="date" label="Tanggal Penerbitan" name="date" labelClass="col-sm-2"
                fieldClass="col-sm-10" value="{{ $database->date }}" />
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
            <x-input label="Ukuran" name="size" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->size }}" />
            <x-input label="Nilai Pajak" name="tax_value" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->tax_value }}" />
            <x-input type="file" label="Foto Reklame" name="file[foto_reklame]" labelClass="col-sm-2"
                fieldClass="col-sm-10" />
            <x-input label="Teks Reklame" name="ads_text" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->ads_text }}" />
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
