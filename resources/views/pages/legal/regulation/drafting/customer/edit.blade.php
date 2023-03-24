<div class="row mt-4">
    <div class="row mt-3">
        <div class="col-sm-12">
            <x-input label="Nama Perusahaan" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->title }}" />
            <x-input value="Perjanjian" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->type }}" />
            <x-input value="Customer" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->unit }}" />
            <x-input value="Customer" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->category }}" />
            <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->number }}" />
            <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->date }}" />
            <x-input label="Judul Perjanjian" name="agreement_title" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->agreement_title }}" />
            <x-input label="Isi" name="body" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->body }}" />
            <x-input type="date" label="Jangka Waktu Awal" name="date_awal" labelClass="col-sm-2"
                value="{{ $database->date_awal }}" fieldClass="col-sm-10" />
            <x-input type="date" label="Jangka Waktu Akhir" name="date_akhir" labelClass="col-sm-2"
                value="{{ $database->date_akhir }}" fieldClass="col-sm-10" />
            <x-select labelClass="col-sm-2" fieldClass="col-sm-10" label="Jenis Perjanjian" name="agreement_type">
                <option {{ $database->agreement_type == 'Ecommerce' ? 'selected' : '' }} value="Ecommerce">Ecommerce
                </option>
                <option {{ $database->agreement_type == 'Fullfilment' ? 'selected' : '' }} value="Fullfilment">
                    Fullfilment</option>
                <option {{ $database->agreement_type == 'Delivery' ? 'selected' : '' }} value="Delivery">Delivery
                </option>
                <option {{ $database->agreement_type == 'Others' ? 'selected' : '' }} value="Others">Others</option>
            </x-select>
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
