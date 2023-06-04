<div class="row mt-4">
    <div class="row mt-3">
        <div class="col-sm-12">
            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->title }}" />
            <x-input value="Litigasi" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->type }}" />
            <x-input value="Customer Dispute" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->unit }}" />
            <x-input value="Customer Dispute" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden
                value="{{ $database->category }}" />
            <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10"
                value="{{ $database->number }}" />
            <div class="mb-3 row">
                <label class="col-sm-2 col-form-label">Tentang</label>
                <div class="col-sm-10">
                    <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2">{{ $database->about }}</textarea>
                </div>
            </div>
        </div>
        <br />
        <br />
        <div class="col-sm-6">
            <div class="mb-3 row">
                <label for="date" class="col-sm-5 col-form-label">Tanggal Pengiriman</label>
                <div class="col-sm-7">
                    <div class="input-group">
                        <input type="text" class="form-control dates cannot_texting" id="date"
                            name="litigation[shipping_date]" value="{{ $dataLitigation->shipping_date }}" />
                        <div class="input-group-text"><span class="fa fa-th"></span></div>
                    </div>
                </div>
            </div>
            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Pengirim" name="litigation[sender_name]"
                value="{{ $dataLitigation->sender_name }}" />
            <x-address-custom label="" classLabel="col-sm-5" name="sender" classField="col-sm-7"
                provinceExist="{{ $dataLitigation->sender_province }}"
                regencyExist="{{ $dataLitigation->sender_regency }}"
                districtExist="{{ $dataLitigation->sender_district }}"
                villageExist="{{ $dataLitigation->sender_village }}"
                postCodeExist="{{ $dataLitigation->sender_zip_code }}"
                addressExist="{{ $dataLitigation->sender_address }}" />
            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Pengirim"
                value="{{ $dataLitigation->sender_phone_number }}" name="litigation[sender_phone_number]" />
            <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Kasus" name="litigation[case_type]">
                <option value="Terlambat" <?= $dataLitigation->case_type == 'Terlambat' ? 'selected' : '' ?>>Terlambat
                </option>
                <option value="Hilang" <?= $dataLitigation->case_type == 'Hilang' ? 'selected' : '' ?>>Hilang</option>
                <option value="Rusak" <?= $dataLitigation->case_type == 'Rusak' ? 'selected' : '' ?>>Rusak</option>
            </x-select>
            <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Faktor Penyebab"
                name="litigation[causative_factor]">
                <option value="Alamat Tidak Jelas"
                    {{ $dataLitigation->causative_factor == 'Alamat Tidak Jelas' ? 'selected' : '' }}>
                    Alamat Tidak Jelas</option>
                <option value="Penerima Tidak Tepat"
                    {{ $dataLitigation->causative_factor == 'Penerima Tidak Tepat' ? 'selected' : '' }}>Penerima Tidak
                    Tepat</option>
                <option value="Kendala Pihak Ketiga"
                    {{ $dataLitigation->causative_factor == 'Kendala Pihak Ketiga' ? 'selected' : '' }}>Kendala Pihak
                    Ketiga</option>
                <option value="Pencurian" {{ $dataLitigation->causative_factor == 'Pencurian' ? 'selected' : '' }}>
                    Pencurian</option>
                <option value="Kecelakaan" {{ $dataLitigation->causative_factor == 'Kecelakaan' ? 'selected' : '' }}>
                    Kecelakaan</option>
                <option value="Force Majeur"
                    {{ $dataLitigation->causative_factor == 'Force Majeur' ? 'selected' : '' }}>Force
                    Majeur</option>
                <option value="Lain-Lain" {{ $dataLitigation->causative_factor == 'Lain-Lain' ? 'selected' : '' }}>
                    Lain-Lain</option>
            </x-select>
            <div class="mb-3 row" id="litigation[causative_factor_others]1"
                style="{{ $dataLitigation->causative_factor != 'Lain-Lain' ? 'display: none !important;' : '' }}">
                <label for="litigation[causative_factor_others]" class="col-sm-5 col-form-label">Faktor Penyebab
                    (Lain-Lain)</label>
                <div class="col-sm-7">
                    <textarea class="form-control h-100 mt-0" id="litigation[causative_factor_others]" style="height: 100px"
                        name="litigation[causative_factor_others]">{{ $dataLitigation->causative_factor_others }}</textarea>
                </div>
            </div>
            <script>
                document.getElementById("litigation[causative_factor]").addEventListener("change", handleChange);

                function handleChange() {
                    var x = document.getElementById("litigation[causative_factor]");
                    if (x.value === "Lain-Lain") {
                        document.getElementById("litigation[causative_factor_others]1").style.display = "flex";
                    } else {
                        document.getElementById("litigation[causative_factor_others]1").style.display = "none";
                    }
                }
            </script>
        </div>
        <div class="col-sm-6">
            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nama Penerima"
                value="{{ $dataLitigation->receiver_name }}" name="litigation[receiver_name]" />
            <x-address-custom label="" classLabel="col-sm-5" name="receiver" classField="col-sm-7"
                provinceExist="{{ $dataLitigation->receiver_province }}"
                regencyExist="{{ $dataLitigation->receiver_regency }}"
                districtExist="{{ $dataLitigation->receiver_district }}"
                villageExist="{{ $dataLitigation->receiver_village }}"
                postCodeExist="{{ $dataLitigation->receiver_zip_code }}"
                addressExist="{{ $dataLitigation->receiver_address }}" />
            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nomor Telepon Penerima"
                value="{{ $dataLitigation->receiver_phone_number }}" name="litigation[receiver_phone_number]" />
            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Total Kerugian/Klaim" prefix="Rp"
                value="{{ number_format($dataLitigation->total_loss, 0, ',', '.') }}" type="tel"
                name="litigation[total_loss]" />
            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Nominal Barang" prefix="Rp"
                value="{{ number_format($dataLitigation->item_nominal, 0, ',', '.') }}" type="tel"
                name="litigation[item_nominal]" />
            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Connote/Perjanjian"
                value="{{ $dataLitigation->connote }}" name="litigation[connote]" />
            <x-input labelClass="col-sm-5" fieldClass="col-sm-7" label="Customer" name="litigation[customer]"
                value="{{ $dataLitigation->customer }}" />
            <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Jenis Pengiriman"
                name="litigation[shipping_type]">
                <option value="Hight Value Service"
                    {{ $dataLitigation->shipping_type == 'Hight Value Service' ? 'selected' : '' }}>Hight Value
                    Service</option>
                <option value="Non HVS" {{ $dataLitigation->shipping_type == 'Non HVS' ? 'selected' : '' }}>Non HVS
                </option>
                <option value="Makanan" {{ $dataLitigation->shipping_type == 'Makanan' ? 'selected' : '' }}>Makanan
                </option>
                <option value="Dangerous Goods"
                    {{ $dataLitigation->shipping_type == 'Dangerous Goods' ? 'selected' : '' }}> Dangerous Goods
                </option>
            </x-select>
            <x-select labelClass="col-sm-5" fieldClass="col-sm-7" label="Asuransi" name="litigation[assurance]">
                <option value="Ada" {{ $dataLitigation->assurance == 'Ada' ? 'selected' : '' }}>Ada</option>
                <option value="Tidak" {{ $dataLitigation->assurance == 'Tidak' ? 'selected' : '' }}>Tidak
                </option>
            </x-select>
            <div class="mb-3 row {{ $dataLitigation->assurance == 'Tidak' ? 'd-none' : '' }}"
                id="litigation[assurance_nominal]1">
                <label for="litigation[assurance_nominal]" class="col-sm-5 col-form-label">Asuransi Nominal</label>
                <div class="col-sm-7">
                    <div class="input-group">
                        <span class="input-group-text">Rp</span>
                        <input type="tel" class="form-control number-separator"
                            id="litigation[assurance_nominal]" name="litigation[assurance_nominal]"
                            value="{{ number_format($dataLitigation->assurance_nominal, 0, ',', '.') }}" />
                    </div>
                </div>
            </div>
            <script>
                document.getElementById("litigation[assurance]").addEventListener("change", handleChange);

                function handleChange() {
                    var x = document.getElementById("litigation[assurance]");
                    if (x.value === "Ada") {
                        document.getElementById("litigation[assurance_nominal]1").classList.remove('d-none');
                        document.getElementById("litigation[assurance_nominal]1").classList.add('d-flex');
                    } else {
                        document.getElementById("litigation[assurance_nominal]1").classList.remove('d-flex');
                        document.getElementById("litigation[assurance_nominal]1").classList.add('d-none');
                    }
                }
            </script>
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

    <div class="row mt-3">
        <div class="col-sm-3">
            <h5>Bentuk Kiriman :</h5>
        </div>
        <div class="col-sm-9">
            <x-select fieldClass="col-sm-12" name="litigation[shipping_form]">
                <option value="Dokumen" {{ $dataLitigation->shipping_form == 'Dokumen' ? 'selected' : '' }}>Dokumen
                </option>
                <option value="KTP" {{ $dataLitigation->shipping_form == 'KTP' ? 'selected' : '' }}>KTP</option>
                <option value="Paspor" {{ $dataLitigation->shipping_form == 'Paspor' ? 'selected' : '' }}>Paspor
                </option>
                <option value="STNK/BPKB" {{ $dataLitigation->shipping_form == 'STNK/BPKB' ? 'selected' : '' }}>
                    STNK/BPKB
                </option>
                <option value="Pakaian" {{ $dataLitigation->shipping_form == 'Pakaian' ? 'selected' : '' }}>Pakaian
                </option>
                <option value="Elektronik" {{ $dataLitigation->shipping_form == 'Elektronik' ? 'selected' : '' }}>
                    Elektronik
                </option>
                <option value="Makanan" {{ $dataLitigation->shipping_form == 'Makanan' ? 'selected' : '' }}>Makanan
                </option>
                <option value="Tumbuhan" {{ $dataLitigation->shipping_form == 'Tumbuhan' ? 'selected' : '' }}>
                    Tumbuhan
                </option>
                <option value="Aksesoris" {{ $dataLitigation->shipping_form == 'Aksesoris' ? 'selected' : '' }}>
                    Aksesoris
                </option>
                <option value="Lain-Lain" {{ $dataLitigation->shipping_form == 'Lain-Lain' ? 'selected' : '' }}>
                    Lain-Lain
                </option>
            </x-select>
            <div class="mb-3 row" id="litigation[detail_shipping_form]1"
                style="{{ $dataLitigation->shipping_form != 'Lain-Lain' ? 'display: none !important;' : '' }}">
                <div class="col-sm-12">
                    <textarea class="form-control h-100 mt-0" id="litigation[detail_shipping_form]" style="height: 100px"
                        name="litigation[detail_shipping_form]">{{ $dataLitigation->detail_shipping_form }}</textarea>
                </div>
            </div>
            <script>
                document.getElementById("litigation[shipping_form]").addEventListener("change", handleChange);

                function handleChange() {
                    var x = document.getElementById("litigation[shipping_form]");
                    if (x.value === "Lain-Lain") {
                        document.getElementById("litigation[detail_shipping_form]1").style.display = "flex";
                    } else {
                        document.getElementById("litigation[detail_shipping_form]1").style.display = "none";
                    }
                }
            </script>
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

    <div class="row mt-3">
        <div class="col-sm-3">
            <h5>Bukti :</h5>
        </div>
        <div class="col-sm-9">
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="1. Connote" name="file[connote]" />
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="2. Orion" name="file[orion]" />
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="3. POD" name="file[pod]" />
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="4. Form Kasus Sengketa Konsumen"
                name="file[kasus_sengketa_konsumen]" />
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="5. Kronologis Destinasi"
                name="file[kronologi_destinasi]" />
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="6. Kronologis Origin"
                name="file[kronologi_origin]" />
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="7. Kronologis CS"
                name="file[kronologi_cs]" />
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="8. Surat Customer atau Somasi"
                name="file[customer_somasi]" />
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="9. Surat Kuasa" name="file[kuasa]" />
            <x-file labelClass="col-sm-5" fieldClass="col-sm-7" label="10. Dokumen Lainnya" name="file[other][]"
                multiple />
        </div>
    </div>
</div>
