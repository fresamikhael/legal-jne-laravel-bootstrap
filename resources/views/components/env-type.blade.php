<div id="env-type"></div>

<script type="text/babel">
    function EnvType() {
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
                    <label for="env_type" class="col-sm-2 col-form-label">Tipe Dokumen</label>
                    <div class="col-sm-10">
                        <select onChange={ (e) => setType(e.target.value) } required name="env_type" id="env_type" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            <option value="UKL/UPL">UKL/UPL</option>
                            <option value="AMDAL">AMDAL</option>
                            <option value="SPPL">SPPL</option>
                        </select>
                    </div>
                </div>
                { type === "UKL/UPL" ? (
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <label for="">Lokasi</label>
                            <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="Izin Lingkungan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="UKL/UPL" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
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
                                <label for="zip_code" class="col-sm-2 col-form-label">Kode Pos </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="zip_code" name="zip_code" ></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-2 col-form-label">Jalan/Nama Gedung </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="address" name="address" ></textarea>
                                </div>
                            </div>
                            <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input type="date" label="Tanggal Penerbitan" name="date" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="Laporan Berkala" name="periodic_report" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                fieldClass="col-sm-10" multiple />
                            <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        </div>
                    </div>
                ) : type === "AMDAL" ? (
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input label="Kode Dokumen" name="code" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <label for="">Lokasi</label>
                            <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="Izin Lingkungan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="AMDAL" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
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
                                <label for="zip_code" class="col-sm-2 col-form-label">Kode Pos </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="zip_code" name="zip_code" ></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-2 col-form-label">Jalan/Nama Gedung </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="address" name="address" ></textarea>
                                </div>
                            </div>
                            <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input type="date" label="Tanggal Penerbitan" name="date" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="Laporan Berkala" name="periodic_report" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="File Upload" type="file" name="file[upload][]" labelClass="col-sm-2"
                                fieldClass="col-sm-10" multiple />
                            <x-input label="Note" name="note" labelClass="col-sm-2" fieldClass="col-sm-10" />
                        </div>
                    </div>
                ) : type === "SPPL" ? (
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <x-input label="Nama Dokumen" name="title" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <label for="">Lokasi</label>
                            <x-input value="Perizinan" name="type" labelClass="col-sm-2" fieldClass="col-sm-10"
                                hidden />
                            <x-input value="Izin Lingkungan" name="category" labelClass="col-sm-2" fieldClass="col-sm-10" hidden />
                            <x-input value="SPPL" name="unit" labelClass="col-sm-2" fieldClass="col-sm-10"
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
                                <label for="zip_code" class="col-sm-2 col-form-label">Kode Pos </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="zip_code" name="zip_code" ></textarea>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="address" class="col-sm-2 col-form-label">Jalan/Nama Gedung </label>
                                <div class="col-sm-10">
                                    <textarea class="form-control" id="address" name="address" ></textarea>
                                </div>
                            </div>
                            <x-input label="Nomor" name="number" labelClass="col-sm-2" fieldClass="col-sm-10" />
                            <x-input type="date" label="Tanggal Penerbitan" name="date" labelClass="col-sm-2"
                                fieldClass="col-sm-10" />
                            <x-input label="Laporan Berkala" name="periodic_report" labelClass="col-sm-2"
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
    ReactDOM.render(<EnvType />,document.getElementById('env-type'))
</script>
