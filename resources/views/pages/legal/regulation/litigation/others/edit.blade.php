<div class="row mt-4">
    <div class="col-sm-12">
        <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
            value="{{ $database->title }}" />
        <x-input value="Litigasi" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
        <x-input value="Others" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
        <x-input value="Others" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
        <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
            value="{{ $database->number }}" />
        <div class="mb-3 row">
            <label class="col-sm-2 col-form-label">Tentang</label>
            <div class="col-sm-10">
                <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2">{{ $database->about }} </textarea>
            </div>
        </div>
    </div>
    <br />
    <br />
    <div class="row mt-3">
        <div class="col-sm-12">
            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Penggugat" name="litigation[sender_name]"
                type="text" value="{{ $dataLitigation->sender_name }}" />
            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Tergugat" name="litigation[receiver_name]"
                value="{{ $dataLitigation->receiver_name }}" />
            <hr>
            <div class="col-sm-3">
                <h4>Alamat Penggugat/Tergugat :</h4>
            </div>
            <x-address-custom label="Penggugat/Tergugat" classLabel="col-sm-5" name="sender" classField="col-sm-7"
                provinceExist="{{ $dataLitigation->sender_province }}"
                regencyExist="{{ $dataLitigation->sender_regency }}"
                districtExist="{{ $dataLitigation->sender_district }}"
                villageExist="{{ $dataLitigation->sender_village }}"
                postCodeExist="{{ $dataLitigation->sender_zip_code }}"
                addressExist="{{ $dataLitigation->sender_address }}" />
            <hr>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="mb-3 row">
                <label for="Kronologis Singkat Kejadian:" class="col-sm-3 col-form-label">Kronologis Singkat
                    Kejadian:</label>
                <div class="col-sm-9">
                    <textarea class="form-control h-100 mt-0" style="height: 100px" name="litigation[incident_chronology]">{{ $dataLitigation->incident_chronology }}</textarea>
                </div>
            </div>
        </div>
    </div>
    <hr>
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
    <div class="row mt-3">
        <div class="col-sm-3">
            <h5>Upload Dokumen :</h5>
        </div>
        <div class="col-sm-9">
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Disposisi Management"
                name="file[disposisi_manajemen]" />
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Akta Pendirian dan Perubahan Terakhir"
                name="file[akta_pendirian_perubahan]" />
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. SK Menkumham" name="file[sk_menkumham]" />
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. KTP Direksi" name="file[ktp_direksi]" />
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. NPWP" name="file[npwp]" />
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. NIB" name="file[nib]" />
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Dokumen Pendukung Lainnya"
                name="file[][other]" multiple />
        </div>
    </div>
</div>
