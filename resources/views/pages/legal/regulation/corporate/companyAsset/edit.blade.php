<div class="row mt-4">
    <x-input label="Tipe Dokumen" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" value="{{ $database->unit }}"
        readOnly />
    @if ($database->unit == 'Sertipikat HGB')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->category }}" />
                <x-input value="Sertipikat HGB" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->unit }}" />
                <x-input label="Nomor Sertipikat" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Tentang</label>
                    <div class="col-sm-10">
                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" > {{ $database->about }}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label">Tanggal Sertifikat</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control dates cannot_texting" id="date"
                                value="{{ $database->date }}" name="date" />
                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                        </div>
                    </div>
                </div>
                <x-input label="Luas Tanah" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->surface_area }}" />
                <label for="">Obyek Tanah</label>
                <x-address-custom label="" classLabel="col-sm-2" name="" classField="col-sm-10"
                    value="{{ $database->title }}" provinceExist="{{ $database->province }}"
                    regencyExist="{{ $database->regency }}" districtExist="{{ $database->district }}"
                    villageExist="{{ $database->village }}" postCodeExist="{{ $database->zip_code }}"
                    addressExist="{{ $database->address }}" />
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
                <x-input label="Nomor Surat Ukur" name="measure_number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->measure_number }}" />
                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->note }}" />
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
            </div>
        </div>
    @elseif ($database->unit == 'Sertipikat HM')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->category }}" />
                <x-input value="Sertipikat HM" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->unit }}" />
                <x-input label="Nomor Sertipikat" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Tentang</label>
                    <div class="col-sm-10">
                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" > {{ $database->about }}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label">Tanggal Sertifikat</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control dates cannot_texting" id="date"
                                value="{{ $database->date }}" name="date" />
                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                        </div>
                    </div>
                </div>
                <x-input label="Luas Tanah" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->surface_area }}" />
                <label for="">Obyek Tanah</label>
                <x-address-custom label="" classLabel="col-sm-2" name="" classField="col-sm-10"
                    provinceExist="{{ $database->province }}" regencyExist="{{ $database->regency }}"
                    districtExist="{{ $database->district }}" villageExist="{{ $database->village }}"
                    postCodeExist="{{ $database->zip_code }}" addressExist="{{ $database->address }}" />
                <x-input label="Nomor Surat Ukur" name="measure_number" labelClass="col-sm-2"
                    value="{{ $database->measure_number }}" fieldClass="col-sm-10" />
                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->note }}" />
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
            </div>
        </div>
    @elseif ($database->unit == 'PBB')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->category }}" hidden />
                <x-input value="PBB" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->unit }}" />
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Tentang</label>
                    <div class="col-sm-10">
                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" > {{ $database->about }}</textarea>
                    </div>
                </div>
                <x-address-custom label="" classLabel="col-sm-2" name="" classField="col-sm-10"
                    provinceExist="{{ $database->province }}" regencyExist="{{ $database->regency }}"
                    districtExist="{{ $database->district }}" villageExist="{{ $database->village }}"
                    postCodeExist="{{ $database->zip_code }}" addressExist="{{ $database->address }}" />
                <x-input label="NOP" name="nop" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->nop }}" />
                <x-input label="NJOP" name="njop" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->njop }}" />
                <x-input label="Nilai PBB" name="pbb" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->pbb }}" />
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
                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->note }}" />
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
            </div>
        </div>
    @elseif ($database->unit == 'IMB')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->category }}" hidden />
                <x-input value="IMB" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->unit }}" />
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Tentang</label>
                    <div class="col-sm-10">
                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" > {{ $database->about }}</textarea>
                    </div>
                </div>
                <x-address-custom label="" classLabel="col-sm-2" name="" classField="col-sm-10"
                    provinceExist="{{ $database->province }}" regencyExist="{{ $database->regency }}"
                    districtExist="{{ $database->district }}" villageExist="{{ $database->village }}"
                    postCodeExist="{{ $database->zip_code }}" addressExist="{{ $database->address }}" />
                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control dates cannot_texting" id="date"
                                value="{{ $database->date }}" name="date" />
                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                        </div>
                    </div>
                </div>
                <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->location }}" />
                <x-input label="Luas Bangunan" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->building_area }}" />
                <x-input label="Retribusi" name="retribution" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->retribution }}" />
                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->note }}" />
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
            </div>
        </div>
    @elseif ($database->unit == 'SLF')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->category }}" hidden />
                <x-input value="SLF" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->unit }}" />
                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Tentang</label>
                    <div class="col-sm-10">
                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" > {{ $database->about }}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label">Tanggal Sertifikat</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control dates cannot_texting" id="date"
                                value="{{ $database->date }}" name="date" />
                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                        </div>
                    </div>
                </div>
                <label for="">Lokasi</label>
                <x-address-custom label="" classLabel="col-sm-2" name="" classField="col-sm-10"
                    provinceExist="{{ $database->province }}" regencyExist="{{ $database->regency }}"
                    districtExist="{{ $database->district }}" villageExist="{{ $database->village }}"
                    postCodeExist="{{ $database->zip_code }}" addressExist="{{ $database->address }}" />
                <x-input label="Luas Bangunan" name="building_area" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->building_area }}" />
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
                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->note }}" />
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
            </div>
        </div>
    @elseif ($database->unit == 'Akta Jual Beli')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->category }}" hidden />
                <x-input value="Akta Jual Beli" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->unit }}" hidden />
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Tentang</label>
                    <div class="col-sm-10">
                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" > {{ $database->about }}</textarea>
                    </div>
                </div>
                <x-address-custom label="" classLabel="col-sm-2" name="" classField="col-sm-10"
                    provinceExist="{{ $database->province }}" regencyExist="{{ $database->regency }}"
                    districtExist="{{ $database->district }}" villageExist="{{ $database->village }}"
                    postCodeExist="{{ $database->zip_code }}" addressExist="{{ $database->address }}" />
                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control dates cannot_texting" id="date"
                                value="{{ $database->date }}" name="date" />
                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                        </div>
                    </div>
                </div>
                <x-input label="Nilai Transaksi" name="transaction_value" labelClass="col-sm-2"
                    value="{{ $database->transaction_value }}" fieldClass="col-sm-10" />
                <x-input label="PPAT" name="ppat" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->ppat }}" />
                <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->location }}" />
                <x-input label="Nama Penjual" name="seller_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->seller_name }}" />
                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->note }}" />
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
            </div>
        </div>
    @elseif ($database->unit == 'PPJB')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->category }}" hidden />
                <x-input value="PPJB" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->unit }}" />
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Tentang</label>
                    <div class="col-sm-10">
                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" > {{ $database->about }}</textarea>
                    </div>
                </div>
                <x-address-custom label="" classLabel="col-sm-2" name="" classField="col-sm-10"
                    provinceExist="{{ $database->province }}" regencyExist="{{ $database->regency }}"
                    districtExist="{{ $database->district }}" villageExist="{{ $database->village }}"
                    postCodeExist="{{ $database->zip_code }}" addressExist="{{ $database->address }}" />
                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control dates cannot_texting" id="date"
                                value="{{ $database->date }}" name="date" />
                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                        </div>
                    </div>
                </div>
                <x-input label="Nilai Transaksi" name="transaction_value" labelClass="col-sm-2"
                    value="{{ $database->transaction_value }}" fieldClass="col-sm-10" />
                <x-input label="Notaris" name="notary_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->notary_name }}" />
                <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->location }}" />
                <x-input label="Nama Penjual" name="seller_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->seller_name }}" />
                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->note }}" />
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
            </div>
        </div>
    @elseif ($database->unit == 'APH')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->category }}" hidden />
                <x-input value="APH" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->unit }}" />
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Tentang</label>
                    <div class="col-sm-10">
                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" > {{ $database->about }}</textarea>
                    </div>
                </div>
                <x-address-custom label="" classLabel="col-sm-2" name="" classField="col-sm-10"
                    provinceExist="{{ $database->province }}" regencyExist="{{ $database->regency }}"
                    districtExist="{{ $database->district }}" villageExist="{{ $database->village }}"
                    postCodeExist="{{ $database->zip_code }}" addressExist="{{ $database->address }}" />
                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label">Tanggal Sertifikat</label>
                    <div class="col-sm-10">
                        <div class="input-group">
                            <input type="text" class="form-control dates cannot_texting" id="date"
                                value="{{ $database->date }}" name="date" />
                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                        </div>
                    </div>
                </div>
                <x-input label="Nilai Transaksi" name="transaction_value" labelClass="col-sm-2"
                    value="{{ $database->transaction_value }}" fieldClass="col-sm-10" />
                <x-input label="Notaris" name="notary_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->notary_name }}" />
                <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->location }}" />
                <x-input label="Nama Penjual" name="seller_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->seller_name }}" />
                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->note }}" />
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
            </div>
        </div>
    @elseif ($database->unit == 'Kendaraan')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->category }}" hidden />
                <x-input value="Kendaraan" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->unit }}" />
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Tentang</label>
                    <div class="col-sm-10">
                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" > {{ $database->about }}</textarea>
                    </div>
                </div>
                <x-input label="Nomor Polisi" name="nopol" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->nopol }}" />
                <x-input label="Nomor BPKB" name="nobpkb" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->nobpkb }}" />
                <x-input label="Nomor Mesin" name="nomes" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->nomes }}" />
                <x-input label="Nomor Rangka" name="norangka" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->norangka }}" />
                <x-input label="Jenis Kendaraan" name="vehicle_type" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->vehicle_type }}" />
                <x-input label="Nomor STNK" name="nostnk" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->nostnk }}" />
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
                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->note }}" />
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
            </div>
        </div>
    @elseif ($database->unit == 'Hak Kekayaan Intelektual Hak Merek')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->category }}" hidden />
                <x-input value="Hak Kekayaan Intelektual Hak Merek" name="unit" labelClass="col-sm-2"
                    value="{{ $database->unit }}" fieldClass="col-sm-10" hidden />
                <x-input label="Nomor Sertifikat" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Tentang</label>
                    <div class="col-sm-10">
                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" > {{ $database->about }}</textarea>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Awal </label>
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
                <x-input type="file" label="Gambar Logo/Merek" name="file[logo]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->note }}" />
                <div id="file">
                    @foreach ($dataFile as $file)
                        <div class="mb-3 row" id="rowFileExist-{{ $file->id }}">
                            <label for="" class="col-sm-2 col-form-label">File Sebelumnya
                                {{ $file->name == 'upload' ? '' : ucfirst($file->name) }}</label>
                            <div class="col-sm-10 btn-group">
                                <a href="{{ asset($file->filepath) }}" target="_blank"
                                    class="btn btn-primary w-100"><i class="fa fa-eye"></i>Lihat
                                </a>
                                <a href="javascript:removeFile({{ $file->id }})"
                                    class="btn btn-danger w-25"><i class="fa fa-trash"></i> Hapus</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" multiple />
            </div>
        </div>
    @elseif ($database->unit == 'Hak Kekayaan Intelektual Hak Cipta')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->category }}" hidden />
                <x-input value="Hak Kekayaan Intelektual Hak Cipta" name="unit" labelClass="col-sm-2"
                    value="{{ $database->unit }}" fieldClass="col-sm-10" hidden />
                <x-input label="Nomor Sertifikat" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Tentang</label>
                    <div class="col-sm-10">
                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" > {{ $database->about }}</textarea>
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
                <x-input type="file" label="Isi Ciptaan" name="file[ciptaan]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->note }}" />
                <div id="file">
                    @foreach ($dataFile as $file)
                        <div class="mb-3 row" id="rowFileExist-{{ $file->id }}">
                            <label for="" class="col-sm-2 col-form-label">File Sebelumnya
                                {{ $file->name == 'upload' ? '' : ucfirst($file->name) }}</label>
                            <div class="col-sm-10 btn-group">
                                <a href="{{ asset($file->filepath) }}" target="_blank"
                                    class="btn btn-primary w-100"><i class="fa fa-eye"></i>Lihat
                                </a>
                                <a href="javascript:removeFile({{ $file->id }})"
                                    class="btn btn-danger w-25"><i class="fa fa-trash"></i> Hapus</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" multiple />
            </div>
        </div>
    @elseif ($database->unit == 'Hak Kekayaan Intelektual Desain Industri')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                    value="{{ $database->type }}" />
                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->category }}" hidden />
                <x-input value="Hak Kekayaan Intelektual Desain Industri" name="unit" labelClass="col-sm-2"
                    value="{{ $database->unit }}" fieldClass="col-sm-10" hidden />
                <x-input label="Nomor Sertifikat" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <div class="mb-3 row">
                    <label class="col-sm-2 col-form-label">Tentang</label>
                    <div class="col-sm-10">
                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" > {{ $database->about }}</textarea>
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
                <x-input type="file" label="Jenis Desain" name="file[jenis_design]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->note }}" />
                <div id="file">
                    @foreach ($dataFile as $file)
                        <div class="mb-3 row" id="rowFileExist-{{ $file->id }}">
                            <label for="" class="col-sm-2 col-form-label">File Sebelumnya
                                {{ $file->name == 'upload' ? '' : ucfirst($file->name) }}</label>
                            <div class="col-sm-10 btn-group">
                                <a href="{{ asset($file->filepath) }}" target="_blank"
                                    class="btn btn-primary w-100"><i class="fa fa-eye"></i>Lihat
                                </a>
                                <a href="javascript:removeFile({{ $file->id }})"
                                    class="btn btn-danger w-25"><i class="fa fa-trash"></i> Hapus</a>
                            </div>
                        </div>
                    @endforeach
                </div>
                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" multiple />
            </div>
        </div>
    @endif
</div>
