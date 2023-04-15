<div class="row mt-4">
    <div class="row mt-3">
        <div class="col-sm-12">
            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->title }}" />
            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->code }}" />
            <x-input value="Perjanjian" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->type }}" />
            <x-input value="Sewa Menyewa" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->unit }}" />
            <x-input value="Sewa Menyewa" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->category }}" />
            <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->number }}" />
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Tentang</label>
                <div class="col-sm-10">
                    <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" > {{ $database->about }}</textarea>
                </div>
            </div>
            <x-input type="date" label="Tanggal Penerbitan" name="date" labelClass="col-sm-2"
                value="{{ $database->date }}" fieldClass="col-sm-10" />
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
            <x-input label="Landlord" name="landlord" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->landlord }}" />
            <x-input label="Nilai Sewa" type="tel" prefix="Rp" name="rental_value" labelClass="col-sm-2"
                value="{{ $database->rental_value }}" fieldClass="col-sm-10" />
            <label for="">Lokasi</label>
            <x-address-custom name="lease" label="" classLabel="col-sm-2" classField="col-sm-10"
                provinceExist="{{ $database->province }}" regencyExist="{{ $database->regency }}"
                districtExist="{{ $database->district }}" villageExist="{{ $database->village }}"
                postCodeExist="{{ $database->zip_code }}" addressExist="{{ $database->address }}" />
            <x-input label="Nomor PIC" name="pic_no" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->pic_no }}" type="number" />
            <x-input label="Email PIC" name="pic_email" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->pic_email }}" type="email" />
            <x-input label="Nama Notaris" name="name" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->name }}" />
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
