<div id="ads-type"></div>

<script type="text/babel">
    function AdsType() {
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
                    <label for="ads_type" class="col-sm-2 col-form-label">Tipe Dokumen</label>
                    <div class="col-sm-10">
                        <select onChange={ (e) => setType(e.target.value) } required name="ads_type" id="ads_type" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            <option value="SKPD">SKPD</option>
                            <option value="TLBBR">TLBBR</option>
                            <option value="IPR">IPR</option>
                            <option value="IMBBR">IMBBR</option>
                        </select>
                    </div>
                </div>
                { type === "SKPD" ? (
                    <div class="row mt-3">
                            <div class="col-sm-12">
                                <label for="">Lokasi</label>
                                <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input value="SKPD" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <x-input value="Izin Reklame" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                                <div class="mb-3 row">
                                    <label for="province" class="col-sm-2 col-form-label">Provinsi </label>
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
                                    <label for="regency" class="col-sm-2 col-form-label">Kab/Kota </label>
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
                                    <label for="district" class="col-sm-2 col-form-label">Kecamatan </label>
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
                                    <label for="village" class="col-sm-2 col-form-label">Kelurahan </label>
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
                                        class="col-sm-2 col-form-label">Kode Pos </label>
                                    <div class="col-sm-10">
                                        <input type="text" class="form-control" id="zip_code" name="zip_code" />
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="address" class="col-sm-2 col-form-label">Jalan/Nama Gedung </label>
                                    <div class="col-sm-10">
                                        <textarea class="form-control" id="address" name="address" ></textarea>
                                    </div>
                                </div>
                                <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Masa Berlaku" name="validity_period" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Ukuran" name="size" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="Nilai Pajak" name="tax_value" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input type="file" label="Foto Reklame" name="file[foto_reklame]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" />
                                <x-input label="Teks Reklame" name="ads_text" labelClass="col-sm-2" fieldClass="col-sm-10" />
                                <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                    fieldClass="col-sm-10" multiple />
                                <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            </div>
                        </div>
                ) : type === "TLBBR" ? (
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <label for="">Lokasi</label>
                            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <x-input value="Izin Reklame" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="TLBBR" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <div class="mb-3 row">
                                <label for="province" class="col-sm-2 col-form-label">Provinsi </label>
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
                                <label for="regency" class="col-sm-2 col-form-label">Kab/Kota </label>
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
                                <label for="district" class="col-sm-2 col-form-label">Kecamatan </label>
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
                                <label for="village" class="col-sm-2 col-form-label">Kelurahan </label>
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
                                    class="col-sm-2 col-form-label">Kode Pos </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-2 col-form-label">Jalan/Nama Gedung </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="address" name="address" ></textarea>
                                </div>
                            </div>
                            <x-input label="Masa Berlaku" name="validity_period" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="Ukuran" name="size" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input type="file" label="Gambar" name="file[gambar]" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                fieldClass="col-sm-10" multiple />
                            <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        </div>
                    </div>
                ) : type === "IPR" ? (
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <label for="">Lokasi</label>
                            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                                <x-input value="Izin Reklame" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="IPR" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <div class="mb-3 row">
                                <label for="province" class="col-sm-2 col-form-label">Provinsi </label>
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
                                <label for="regency" class="col-sm-2 col-form-label">Kab/Kota </label>
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
                                <label for="district" class="col-sm-2 col-form-label">Kecamatan </label>
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
                                <label for="village" class="col-sm-2 col-form-label">Kelurahan </label>
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
                                    class="col-sm-2 col-form-label">Kode Pos </label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="zip_code" name="zip_code" />
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-2 col-form-label">Jalan/Nama Gedung </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="address" name="address" ></textarea>
                                </div>
                            </div>
                            <x-input label="Masa Berlaku" name="validity_period" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="Ukuran" name="size" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input type="file" label="Gambar" name="file[gambar]" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                fieldClass="col-sm-10" multiple />
                            <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        </div>
                    </div>
                ) : type === "IMBBR" ? (
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <label for="">Lokasi</label>
                            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                                <x-input value="Izin Reklame" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="IMBBR" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <div class="mb-3 row">
                                <label for="province" class="col-sm-2 col-form-label">Provinsi </label>
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
                                <label for="regency" class="col-sm-2 col-form-label">Kab/Kota </label>
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
                                <label for="district" class="col-sm-2 col-form-label">Kecamatan </label>
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
                                <label for="village" class="col-sm-2 col-form-label">Kelurahan </label>
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
                                <label for="address" class="col-sm-2 col-form-label">Jalan/Nama Gedung </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="address" name="address" ></textarea>
                                </div>
                            </div>
                            <x-input label="Masa Berlaku" name="validity_period" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="Ukuran" name="size" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input type="file" label="Gambar" name="file[gambar]" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                fieldClass="col-sm-10" multiple />
                            <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        </div>
                    </div>
                ) : "" }
            </React.Fragment>
        )
    }
    ReactDOM.render(<AdsType />,document.getElementById('ads-type'))
</script>
