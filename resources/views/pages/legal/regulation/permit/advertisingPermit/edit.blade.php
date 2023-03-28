<div class="row mt-4">
    <x-input label="Tipe Dokumen" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" value="{{ $database->unit }}"
        readOnly />
    @if ($database->unit == 'SKPD')
        <div class="row mt-3">
            <div class="col-sm-12">
                <label for="">Lokasi</label>
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="SKPD" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->unit }}" />
                <x-input value="Izin Reklame" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->category }}" />
                <x-address-custom label="" classLabel="col-sm-2" name="" classField="col-sm-10"
                    provinceExist="{{ $database->province }}" regencyExist="{{ $database->regency }}"
                    districtExist="{{ $database->district }}" villageExist="{{ $database->village }}"
                    postCodeExist="{{ $database->zip_code }}" addressExist="{{ $database->address }}" />
                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <x-input type="date" label="Tanggal Penerbitan" name="date" labelClass="col-sm-2"
                    fieldClass="col-sm-10" value="{{ $database->date }}" />
                <x-input type="date" label="Jangka Waktu Awal" name="date_awal" labelClass="col-sm-2"
                    fieldClass="col-sm-10" value="{{ $database->date_awal }}" />
                <x-input type="date" label="Jangka Waktu Akhir" name="date_akhir" labelClass="col-sm-2"
                    fieldClass="col-sm-10" value="{{ $database->date_akhir }}" />
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
    @elseif($database->unit == 'TLBBR')
        <div class="row mt-3">
            <div class="col-sm-12">
                <label for="">Lokasi</label>
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="Izin Reklame" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->category }}" />
                <x-input value="TLBBR" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->unit }}" />
                <x-address-custom label="" classLabel="col-sm-2" name="" classField="col-sm-10"
                    provinceExist="{{ $database->province }}" regencyExist="{{ $database->regency }}"
                    districtExist="{{ $database->district }}" villageExist="{{ $database->village }}"
                    postCodeExist="{{ $database->zip_code }}" addressExist="{{ $database->address }}" />
                <x-input label="Jangka Waktu Awal" name="date_awal" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->date_awal }}" />
                <x-input label="Jangka Waktu Akhir" name="date_akhir" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->date_akhir }}" />
                <x-input label="Ukuran" name="size" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->size }}" />
                <x-input type="file" label="Gambar" name="file[gambar]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <div id="file">
                    @foreach ($dataFile as $file)
                        <div class="mb-3 row" id="rowFileExist-{{ $file->id }}">
                            <label for="" class="col-sm-2 col-form-label">File Sebelumnya
                                {{ $file->name == 'upload' ? '' : ucfirst($file->name) }}</label>
                            <div class="col-sm-10 btn-group">
                                <a href="{{ asset($file->filepath) }}" target="_blank"
                                    class="btn btn-primary w-100"><i class="fa fa-eye"></i>Lihat
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
    @elseif ($database->unit == 'IPR')
        <div class="row mt-3">
            <div class="col-sm-12">
                <label for="">Lokasi</label>
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="Izin Reklame" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->category }}" />
                <x-input value="IPR" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->unit }}" />
                <x-address-custom label="" classLabel="col-sm-2" name="" classField="col-sm-10"
                    provinceExist="{{ $database->province }}" regencyExist="{{ $database->regency }}"
                    districtExist="{{ $database->district }}" villageExist="{{ $database->village }}"
                    postCodeExist="{{ $database->zip_code }}" addressExist="{{ $database->address }}" />
                <x-input label="Jangka Waktu Awal" name="date_awal" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->date_awal }}" />
                <x-input label="Jangka Waktu Akhir" name="date_akhir" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->date_akhir }}" />
                <x-input label="Ukuran" name="size" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->size }}" />
                <x-input type="file" label="Gambar" name="file[gambar]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <div id="file">
                    @foreach ($dataFile as $file)
                        <div class="mb-3 row" id="rowFileExist-{{ $file->id }}">
                            <label for="" class="col-sm-2 col-form-label">File Sebelumnya
                                {{ $file->name == 'upload' ? '' : ucfirst($file->name) }}</label>
                            <div class="col-sm-10 btn-group">
                                <a href="{{ asset($file->filepath) }}" target="_blank"
                                    class="btn btn-primary w-100"><i class="fa fa-eye"></i>Lihat
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
    @elseif ($database->unit == 'IMBBR')
        <div class="row mt-3">
            <div class="col-sm-12">
                <label for="">Lokasi</label>
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="Izin Reklame" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->category }}" />
                <x-input value="IMBBR" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->unit }}" />
                <x-address-custom label="" classLabel="col-sm-2" name="" classField="col-sm-10"
                    provinceExist="{{ $database->province }}" regencyExist="{{ $database->regency }}"
                    districtExist="{{ $database->district }}" villageExist="{{ $database->village }}"
                    postCodeExist="{{ $database->zip_code }}" addressExist="{{ $database->address }}" />
                <x-input label="Jangka Waktu Awal" name="date_awal" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->date_awal }}" />
                <x-input label="Jangka Waktu Akhir" name="date_akhir" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->date_akhir }}" />
                <x-input label="Ukuran" name="size" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->size }}" />
                <x-input type="file" label="Gambar" name="file[gambar]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <div id="file">
                    @foreach ($dataFile as $file)
                        <div class="mb-3 row" id="rowFileExist-{{ $file->id }}">
                            <label for="" class="col-sm-2 col-form-label">File Sebelumnya
                                {{ $file->name == 'upload' ? '' : ucfirst($file->name) }}</label>
                            <div class="col-sm-10 btn-group">
                                <a href="{{ asset($file->filepath) }}" target="_blank"
                                    class="btn btn-primary w-100"><i class="fa fa-eye"></i>Lihat
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
    @endif
</div>
