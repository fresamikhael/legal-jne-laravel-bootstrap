<div class="row mt-4">
    <x-input label="Tipe Dokumen" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" value="{{ $database->unit }}"
        readOnly />
    <div class="row mt-3">
        <div class="col-sm-12">
            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->title }}" />
            <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->type }}" />
            <x-input value="Data Mitra" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->category }}" />
            <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->number }}" />
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
            <x-input label="Nama Badan Hukum" name="legal_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->legal_name }}" />
            <label for="toplevel">
                <b>Identitas Pengurus Perseroan</b>
            </label>
            <div class="pull-right">
                <a href="javascript:addTopLevel()" class="btn btn-primary btn-sm"><i class="fa fa-plus"></i>&nbsp;
                    Tambah</a>
            </div>
            <br />
            <br />
            <table class="table table-bordered table-striped" width="100%" id="tblInputTopLevel">
                <thead>
                    <th width="15%">Nama</th>
                    <th width="15%">Negara Asal</th>
                    <th width="15%">Jabatan</th>
                    <th width="20%">Masa Jabatan</th>
                    <th width="10%">Jumlah Saham</th>
                    <th width="5%">Aksi</th>
                </thead>
                <tbody id="bodyInputTopLevel">
                    @foreach ($dataTopLevel as $item)
                        <tr id="rowExist-{{ $item->id }}">
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->country }}</td>
                            <td>{{ $item->position }}</td>
                            <td>{{ $item->date_awal }} s/d {{ $item->date_akhir }}</td>
                            <td>{{ $item->share_amount }}</td>
                            <td><a href="javascript:removeTopLevelExist({{ $item->id }})"
                                    class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash"></i>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <x-input type="file" label="Akta" name="file[akta][]" labelClass="col-sm-2" fieldClass="col-sm-10"
                multiple />
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
        </div>
    </div>
</div>
