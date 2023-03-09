<div class="row mt-4">
    <x-input label="Tipe Dokumen" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" value="{{ $database->unit }}"
        readOnly />
    @if ($database->unit == 'Anggaran dasar perusahaan')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                <x-input value="Legalitas Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    hidden />
                <x-input value="Anggaran dasar perusahaan" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                    hidden />
                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->date }}" />
                <x-input label="Judul Akta" name="title_deed" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title_deed }}" />
                <x-input label="Nama Notaris" name="notary_name" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->notary_name }}" />
                <x-input label="Modal Dasar" name="modal_dasar" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->modal_dasar }}" prefix="Rp" type="number" />
                <x-input label="Modal Disetor" name="modal_disetor" labelClass="col-sm-2" prefix="Rp"
                    value="{{ $database->modal_disetor }}" fieldClass="col-sm-10" type="number" />
                <label for="toplevel">
                    <b>Identitas Petinggi Perusahaan</b>
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
                        <th width="15%">Masa Jabatan</th>
                        <th width="15%">Jumlah Saham</th>
                        <th width="5%">Aksi</th>
                    </thead>
                    <tbody id="bodyInputTopLevel">
                        @foreach ($dataTopLevel as $item)
                            <tr id="rowExist-{{ $item->id }}">
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->country }}</td>
                                <td>{{ $item->position }}</td>
                                <td>{{ $item->len_service }}</td>
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
                <x-input label="Isi Akta" name="body" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->body }}" />
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
    @elseif($database->unit == 'SK Menteri Hukum dan Ham')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                <x-input value="Legalitas Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    hidden />
                <x-input value="SK Menteri Hukum dan Ham" name="unit" labelClass="col-sm-2"
                    fieldClass="col-sm-10" hidden />
                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->date }}" />
                <x-input label="Jenis SK" name="sk_type" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->sk_type }}" />
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
    @elseif ($database->unit == 'Identitas Direksi')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                <x-input value="Legalitas Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    hidden />
                <x-input value="Identitas Direksi" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                    hidden />
                <x-input label="Nama" name="name" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->name }}" />
                <x-input label="Alamat" name="address" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->address }}" />
                <x-input label="Tempat Tanggal Lahir" name="ttl" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->ttl }}" />
                <x-input label="KTP" name="ktp" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->ktp }}" />
                <x-input type="file" label="KTP" name="file[ktp]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->npwp }}" />
                <x-input type="file" label="NPWP" name="file[npwp]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <x-input label="KK" name="kk" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->kk }}" />
                <x-input type="file" label="KK" name="file[kk]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <x-input label="Passport" name="passport" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->passport }}" />
                <x-input type="file" label="Passport" name="file[passport]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <x-input type="file" label="Pas Foto" name="file[foto]" labelClass="col-sm-2"
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
    @elseif($database->unit == 'Identitas Dewan Komisaris')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2"
                    fieldClass="col-sm-10"value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                <x-input value="Legalitas Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    hidden />
                <x-input value="Identitas Dewan Komisaris" name="unit" labelClass="col-sm-2"
                    fieldClass="col-sm-10" hidden />
                <x-input label="Nama" name="name" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->name }}" />
                <x-input label="Alamat" name="address" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->address }}" />
                <x-input label="Tempat Tanggal Lahir" name="ttl" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->ttl }}" />
                <x-input label="KTP" name="ktp" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->ktp }}" />
                <x-input type="file" label="KTP" name="file[ktp]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->npwp }}" />
                <x-input type="file" label="NPWP" name="file[npwp]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <x-input label="KK" name="kk" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->kk }}" />
                <x-input type="file" label="KK" name="file[kk]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <x-input label="Passport" name="passport" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->passport }}" />
                <x-input type="file" label="Passport" name="file[passport]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <x-input type="file" label="Pas Foto" name="file[foto]" labelClass="col-sm-2"
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
    @elseif ($database->unit == 'Identitas Pemegang Saham')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                <x-input value="Legalitas Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    hidden />
                <x-input value="Identitas Pemegang Saham" name="unit" labelClass="col-sm-2"
                    fieldClass="col-sm-10" hidden />
                <x-input label="Nama" name="name" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->name }}" />
                <x-input label="Alamat" name="address" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->address }}" />
                <x-input label="Tempat Tanggal Lahir" name="ttl" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->ttl }}" />
                <x-input label="KTP/Anggaran Dasar" name="ktp" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->ktp }}" />
                <x-input type="file" label="KTP/Anggaran Dasar" name="file[ktp]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <x-input label="NPWP" name="npwp" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->npwp }}" />
                <x-input type="file" label="NPWP" name="file[npwp]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <x-input label="KK" name="kk" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->kk }}" />
                <x-input type="file" label="KK" name="file[kk]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <x-input label="Passport" name="passport" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->passport }}" />
                <x-input type="file" label="Passport" name="file[passport]" labelClass="col-sm-2"
                    fieldClass="col-sm-10" />
                <x-input type="file" label="Pas Foto" name="file[foto]" labelClass="col-sm-2"
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
    @elseif ($database->unit == 'NPWP')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                <x-input value="Legalitas Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    hidden />
                <x-input value="NPWP" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->date }}" />
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
    @elseif($database->unit == 'NIB')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                <x-input value="Legalitas Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    hidden />
                <x-input value="NIB" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->date }}" />
                <x-input label="KBLI" name="kbli" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->kbli }}" />
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
    @elseif($database->unit == 'SIPP')
        <div class="row mt-3">
            <div class="col-sm-12">
                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->title }}" />
                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->code }}" />
                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                <x-input value="Legalitas Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                    hidden />
                <x-input value="SIPP" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->number }}" />
                <x-input type="date" label="Tanggal" name="date" labelClass="col-sm-2" fieldClass="col-sm-10"
                    value="{{ $database->date }}" />
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
    @endif
</div>
