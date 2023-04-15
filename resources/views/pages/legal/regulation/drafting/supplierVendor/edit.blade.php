<div class="row mt-4">
    <div class="row mt-3">
        <div class="col-sm-12">
            <x-input label="Nama Perusahaan" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->title }}" />
            <x-input value="Perjanjian" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->type }}" />
            <x-input value="Supplier/Vendor" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->unit }}" />
            <x-input value="Supplier/Vendor" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->category }}" />
            <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->number }}" />
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Tentang</label>
                <div class="col-sm-10">
                    <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" > {{ $database->about }}</textarea>
                </div>
            </div>
            <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->date }}" />
            <x-input label="Judul Perjanjian" name="agreement_title" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->agreement_title }}" />
            <x-input label="Isi" name="body" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->body }}" />
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
            @if (
                $database->agreement_type == 'Kontraktor Building' ||
                    $database->agreement_type == 'Jasa Perizinan' ||
                    $database->agreement_type == 'Kendaraan' ||
                    $database->agreement_type == 'Perawatan')
                <x-jenis-vendor value="{{ $database->agreement_type }}" />
            @else
                <x-jenis-vendor valueNew="{{ $database->agreement_type }}" />
            @endif
            <x-select labelClass="col-sm-2" fieldClass="col-sm-10" label="User" name="user_department">
                <option {{ $database->user_department == 'Kantor Pusat' ? 'selected' : '' }} value="Kantor Pusat">
                    Kantor Pusat</option>
                <option {{ $database->user_department == 'Cabang Utama' ? 'selected' : '' }} value="Cabang Utama">
                    Cabang Utama</option>
            </x-select>
            <x-input label="Department/Cabang" name="department" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->department }}" />
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
