<div id="asset-type"></div>

<script type="text/babel">
    function AssetType() {
        const [type, setType] = React.useState();
        const [regency, setRegency] = React.useState([])
        const [district, setDistrict] = React.useState([])
        const [village, setVillage] = React.useState([])

        const inputProvinceChange = (e) => {
            const { value } = e.target
            axios.get(`/api/regencies/${value}`).then(res => {
                if(res.data.meta.code === 200) {
                    setRegency(res.data.data)
                }
            })
        }
        const inputRegencyChange = (e) => {
            const { value } = e.target
            axios.get(`/api/districts/${value}`).then(res => {
                if(res.data.meta.code === 200) {
                    setDistrict(res.data.data)
                }
            })
        }
        const inputDistrictChange = (e) => {
            const { value } = e.target
            axios.get(`/api/villages/${value}`).then(res => {
                if(res.data.meta.code === 200) {
                    setVillage(res.data.data)
                }
            })
        }

        function ucwords (str) {
            return (str + '').replace(/^([a-z])|\s+([a-z])/g, function ($1) {
                return $1.toUpperCase();
            });
        }

        return (
            <React.Fragment>
                <div class="mb-3 row">
                    <label for="asset_type" class="col-sm-2 col-form-label">Tipe Dokumen</label>
                    <div class="col-sm-10">
                        <select onChange={ (e) => setType(e.target.value) } required name="asset_type" id="asset_type" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            <option value="Sertipikat HGB">Sertipikat HGB</option>
                            <option value="Sertipikat HM">Sertipikat HM</option>
                            <option value="PBB">PBB</option>
                            <option value="IMB">IMB</option>
                            <option value="SLF">SLF</option>
                            <option value="Akta Jual Beli">Akta Jual Beli</option>
                            <option value="PPJB">PPJB</option>
                            <option value="APH">APH</option>
                            <option value="Kendaraan">Kendaraan</option>
                            <option value="Hak Kekayaan Intelektual1">Hak Kekayaan Intelektual Hak Merek</option>
                            <option value="Hak Kekayaan Intelektual2">Hak Kekayaan Intelektual Hak Cipta</option>
                            <option value="Hak Kekayaan Intelektual3">Hak Kekayaan Intelektual Desain Industri</option>
                        </select>
                    </div>
                </div>
                { type === "Sertipikat HGB" ? (
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="Sertipikat HGB" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <x-input label="Nomor Sertipikat" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tentang</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" ></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                    <label for="date" class="col-sm-2 col-form-label">Tanggal Sertifikat</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control dates cannot_texting" id="date"
                                                name="date" />
                                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                                        </div>
                                    </div>
                                </div>
                            <x-input label="Luas Tanah" name="surface_area" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <label for="">Obyek Tanah</label>
                            <div class="mb-3 row">
                            <label for="province" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputProvinceChange } name="province" id="province" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        @foreach ($province as $row)
                                            <option value="{{$row->id}}">{{ ucwords(strtolower($row->name)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="regency" class="col-sm-2 col-form-label">Kab/Kota</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputRegencyChange } name="regency" id="regency" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { regency.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="district" class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputDistrictChange } name="district" id="district" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { district.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="village" class="col-sm-2 col-form-label">Kelurahan</label>
                                <div class="col-sm-10">
                                    <select  name="village" id="village" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { village.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="zip_code"
                                    class="col-sm-2 col-form-label">Kode Pos</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-100 mt-0" id="address" name="address" ></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                            <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Awal</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control dates cannot_texting" id="date"
                                        name="date_awal" />
                                    <div class="input-group-text"><span class="fa fa-th"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Akhir</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control dates cannot_texting" id="date"
                                        name="date_akhir" />
                                    <div class="input-group-text"><span class="fa fa-th"></span></div>
                                </div>
                            </div>
                        </div>
                            <x-input label="Nomor Surat Ukur" name="measure_number" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                        </div>
                    </div>
                ) : type === "Sertipikat HM" ? (
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="Sertipikat HM" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <x-input label="Nomor Sertipikat" name="number" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tentang</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" ></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                    <label for="date" class="col-sm-2 col-form-label">Tanggal Sertifikat</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control dates cannot_texting" id="date"
                                                name="date" />
                                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                                        </div>
                                    </div>
                                </div>
                            <x-input label="Luas Tanah" name="surface_area" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <label for="">Obyek Tanah</label>
                            <div class="mb-3 row">
                                <label for="province" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputProvinceChange } name="province" id="province" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        @foreach ($province as $row)
                                            <option value="{{$row->id}}">{{ ucwords(strtolower($row->name)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="regency" class="col-sm-2 col-form-label">Kab/Kota</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputRegencyChange } name="regency" id="regency" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { regency.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="district" class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputDistrictChange } name="district" id="district" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { district.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="village" class="col-sm-2 col-form-label">Kelurahan</label>
                                <div class="col-sm-10">
                                    <select  name="village" id="village" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { village.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="zip_code"
                                    class="col-sm-2 col-form-label">Kode Pos</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-100 mt-0" id="address" name="address" ></textarea>
                                </div>
                            </div>
                            <x-input label="Nomor Surat Ukur" name="measure_number" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                        </div>
                    </div>
                ) : type === "PBB" ? (
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="PBB" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tentang</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" ></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="province" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputProvinceChange } name="province" id="province" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        @foreach ($province as $row)
                                            <option value="{{$row->id}}">{{ ucwords(strtolower($row->name)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="regency" class="col-sm-2 col-form-label">Kab/Kota</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputRegencyChange } name="regency" id="regency" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { regency.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="district" class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputDistrictChange } name="district" id="district" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { district.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="village" class="col-sm-2 col-form-label">Kelurahan</label>
                                <div class="col-sm-10">
                                    <select  name="village" id="village" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { village.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="zip_code"
                                    class="col-sm-2 col-form-label">Kode Pos</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-100 mt-0" id="address" name="address" ></textarea>
                                </div>
                            </div>
                            <x-input label="NOP" name="nop" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="NJOP" name="njop" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Nilai PBB" name="pbb" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <div class="mb-3 row">
                            <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Awal</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control dates cannot_texting" id="date"
                                        name="date_awal" />
                                    <div class="input-group-text"><span class="fa fa-th"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Akhir</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control dates cannot_texting" id="date"
                                        name="date_akhir" />
                                    <div class="input-group-text"><span class="fa fa-th"></span></div>
                                </div>
                            </div>
                        </div>
                            <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                        </div>
                    </div>
                ) : type === "IMB" ? (
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="IMB" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tentang</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" ></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="province" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputProvinceChange } name="province" id="province" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        @foreach ($province as $row)
                                            <option value="{{$row->id}}">{{ ucwords(strtolower($row->name)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="regency" class="col-sm-2 col-form-label">Kab/Kota</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputRegencyChange } name="regency" id="regency" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { regency.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="district" class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputDistrictChange } name="district" id="district" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { district.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="village" class="col-sm-2 col-form-label">Kelurahan</label>
                                <div class="col-sm-10">
                                    <select  name="village" id="village" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { village.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="zip_code"
                                    class="col-sm-2 col-form-label">Kode Pos</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-100 mt-0" id="address" name="address" ></textarea>
                                </div>
                            </div>
                            <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <div class="mb-3 row">
                                    <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control dates cannot_texting" id="date"
                                                name="date" />
                                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                                        </div>
                                    </div>
                                </div>
                            <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Luas Bangunan" name="building_area" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="Retribusi" name="retribution" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                        </div>
                    </div>
                ) : type === "SLF" ? (
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10"
                                    hidden />
                                <x-input value="SLF" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <div class="mb-3 row">
                                    <label class="col-sm-2 col-form-label">Tentang</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" ></textarea>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control dates cannot_texting" id="date"
                                                name="date" />
                                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                                        </div>
                                    </div>
                                </div>
                                <label for="">Lokasi</label>
                                <div class="mb-3 row">
                                    <label for="province" class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-10">
                                        <select  onChange={ inputProvinceChange } name="province" id="province" class="form-select" aria-label="Default select example">
                                            <option class="d-none" value="">-- Pilih --</option>
                                            @foreach ($province as $row)
                                                <option value="{{$row->id}}">{{ ucwords(strtolower($row->name)) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="regency" class="col-sm-2 col-form-label">Kab/Kota</label>
                                    <div class="col-sm-10">
                                        <select  onChange={ inputRegencyChange } name="regency" id="regency" class="form-select" aria-label="Default select example">
                                            <option class="d-none" value="">-- Pilih --</option>
                                            { regency.map((value, index) => {
                                                return (
                                                    <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                                )
                                            }) }
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="district" class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-10">
                                        <select  onChange={ inputDistrictChange } name="district" id="district" class="form-select" aria-label="Default select example">
                                            <option class="d-none" value="">-- Pilih --</option>
                                            { district.map((value, index) => {
                                                return (
                                                    <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                                )
                                            }) }
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="village" class="col-sm-2 col-form-label">Kelurahan</label>
                                    <div class="col-sm-10">
                                        <select  name="village" id="village" class="form-select" aria-label="Default select example">
                                            <option class="d-none" value="">-- Pilih --</option>
                                            { village.map((value, index) => {
                                                return (
                                                    <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                                )
                                            }) }
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="zip_code"
                                        class="col-sm-2 col-form-label">Kode Pos</label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="zip_code" name="zip_code" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control h-100 mt-0" id="address" name="address" ></textarea>
                                    </div>
                                </div>
                                <x-input label="Luas Bangunan" name="building_area" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                    <div class="mb-3 row">
                            <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Awal</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control dates cannot_texting" id="date"
                                        name="date_awal" />
                                    <div class="input-group-text"><span class="fa fa-th"></span></div>
                                </div>
                            </div>
                        </div>
                        <div class="mb-3 row">
                            <label for="date" class="col-sm-2 col-form-label">Jangka Waktu Akhir</label>
                            <div class="col-sm-10">
                                <div class="input-group">
                                    <input type="text" class="form-control dates cannot_texting" id="date"
                                        name="date_akhir" />
                                    <div class="input-group-text"><span class="fa fa-th"></span></div>
                                </div>
                            </div>
                        </div>
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                            </div>
                        </div>
                ) : type === "Akta Jual Beli" ? (
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="Akta Jual Beli" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tentang</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" ></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="province" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputProvinceChange } name="province" id="province" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        @foreach ($province as $row)
                                            <option value="{{$row->id}}">{{ ucwords(strtolower($row->name)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="regency" class="col-sm-2 col-form-label">Kab/Kota</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputRegencyChange } name="regency" id="regency" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { regency.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="district" class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputDistrictChange } name="district" id="district" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { district.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="village" class="col-sm-2 col-form-label">Kelurahan</label>
                                <div class="col-sm-10">
                                    <select  name="village" id="village" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { village.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="zip_code"
                                    class="col-sm-2 col-form-label">Kode Pos</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-100 mt-0" id="address" name="address" ></textarea>
                                </div>
                            </div>
                            <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <div class="mb-3 row">
                                    <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control dates cannot_texting" id="date"
                                                name="date" />
                                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                                        </div>
                                    </div>
                                </div>
                            <x-input label="Nilai Transaksi" name="transaction_value" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="PPAT" name="ppat" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Nama Penjual" name="seller_name" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                        </div>
                    </div>
                ) : type === "PPJB" ? (
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="PPJB" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tentang</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" ></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="province" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputProvinceChange } name="province" id="province" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        @foreach ($province as $row)
                                            <option value="{{$row->id}}">{{ ucwords(strtolower($row->name)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="regency" class="col-sm-2 col-form-label">Kab/Kota</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputRegencyChange } name="regency" id="regency" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { regency.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="district" class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputDistrictChange } name="district" id="district" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { district.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="village" class="col-sm-2 col-form-label">Kelurahan</label>
                                <div class="col-sm-10">
                                    <select  name="village" id="village" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { village.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="zip_code"
                                    class="col-sm-2 col-form-label">Kode Pos</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-100 mt-0" id="address" name="address" ></textarea>
                                </div>
                            </div>
                            <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <div class="mb-3 row">
                                    <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control dates cannot_texting" id="date"
                                                name="date" />
                                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                                        </div>
                                    </div>
                                </div>
                            <x-input label="Nilai Transaksi" name="transaction_value" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="Notaris" name="notary_name" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Nama Penjual" name="seller_name" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                        </div>
                    </div>
                ) : type === "APH" ? (
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input value="Corporate" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <x-input value="Aset Perusahaan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="APH" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <div class="mb-3 row">
                                <label class="col-sm-2 col-form-label">Tentang</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-100 mt-0" name="about" id="floatingTextarea2" ></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="province" class="col-sm-2 col-form-label">Provinsi</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputProvinceChange } name="province" id="province" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        @foreach ($province as $row)
                                            <option value="{{$row->id}}">{{ ucwords(strtolower($row->name)) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="regency" class="col-sm-2 col-form-label">Kab/Kota</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputRegencyChange } name="regency" id="regency" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { regency.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="district" class="col-sm-2 col-form-label">Kecamatan</label>
                                <div class="col-sm-10">
                                    <select  onChange={ inputDistrictChange } name="district" id="district" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { district.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="village" class="col-sm-2 col-form-label">Kelurahan</label>
                                <div class="col-sm-10">
                                    <select  name="village" id="village" class="form-select" aria-label="Default select example">
                                        <option class="d-none" value="">-- Pilih --</option>
                                        { village.map((value, index) => {
                                            return (
                                                <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                            )
                                        }) }
                                    </select>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="zip_code"
                                    class="col-sm-2 col-form-label">Kode Pos</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control h-100 mt-0" id="address" name="address" ></textarea>
                                </div>
                            </div>
                            <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <div class="mb-3 row">
                                    <label for="date" class="col-sm-2 col-form-label">Tanggal</label>
                                    <div class="col-sm-10">
                                        <div class="input-group">
                                            <input type="text" class="form-control dates cannot_texting" id="date"
                                                name="date" />
                                            <div class="input-group-text"><span class="fa fa-th"></span></div>
                                        </div>
                                    </div>
                                </div>
                            <x-input label="Nilai Transaksi" name="transaction_value" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="Notaris" name="notary_name" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Lokasi" name="location" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Nama Penjual" name="seller_name" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                        </div>
                    </div>
                ) : type === "Kendaraan" ? (
                    {{ $vehicle }}
                ) : type === "Hak Kekayaan Intelektual1" ? (
                    {{ $hkihm }}
                ) : type === "Hak Kekayaan Intelektual2" ? (
                    {{ $hkihc }}
                ) : type === "Hak Kekayaan Intelektual3" ? (
                    {{ $hkidi }}
                ) : "" }
            </React.Fragment>
        )
    }
    ReactDOM.render(<AssetType />,document.getElementById('asset-type'))
</script>
