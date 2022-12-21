<div id="permit-type"></div>

<script type="text/babel">
    function PermitType() {
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
                    <label for="permit_type" class="col-sm-2 col-form-label">Tipe Perizinan</label>
                    <div class="col-sm-10">
                        <select onChange={ (e) => setType(e.target.value) } required name="permit_type" id="permit_type" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            <option value="IMB">IMB</option>
                            <option value="SLF">SLF</option>
                            <option value="Reklame">Reklame</option>
                            <option value="OSS">OSS</option>
                        </select>
                    </div>
                </div>
                { type === "IMB" ? (
                    {{ $imb }}
                ) : type === "SLF" ? (
                    {{ $slf }}
                ) : type === "Reklame" ? (
                    {{ $reklame }}
                ) : type === "OSS" ? (
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <x-input label="Nama Cabang/Pusat" name="branch_name" labelClass="col-sm-2"
                                fieldClass="col-sm-10" required />
                                <div class="mb-3 row">
                                    <label for="branch_province" class="col-sm-2 col-form-label">Provinsi</label>
                                    <div class="col-sm-10">
                                        <select  onChange={ inputProvinceChange } name="branch_province" id="branch_province" class="form-select" aria-label="Default select example">
                                            <option class="d-none" value="">-- Pilih --</option>
                                            @foreach ($province as $row)
                                                <option value="{{$row->id}}">{{ ucwords(strtolower($row->name)) }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="mb-3 row">
                                    <label for="branch_regency" class="col-sm-2 col-form-label">Kab/Kota</label>
                                    <div class="col-sm-10">
                                        <select  onChange={ inputRegencyChange } name="branch_regency" id="branch_regency" class="form-select" aria-label="Default select example">
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
                                    <label for="branch_district" class="col-sm-2 col-form-label">Kecamatan</label>
                                    <div class="col-sm-10">
                                        <select  onChange={ inputDistrictChange } name="branch_district" id="branch_district" class="form-select" aria-label="Default select example">
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
                                    <label for="branch_village" class="col-sm-2 col-form-label">Kelurahan</label>
                                    <div class="col-sm-10">
                                        <select  name="branch_village" id="branch_village" class="form-select" aria-label="Default select example">
                                            <option class="d-none" value="">-- Pilih --</option>
                                            { village.map((value, index) => {
                                                return (
                                                    <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                                )
                                            }) }
                                        </select>
                                    </div>
                                </div>
                            <x-input label="Alamat Lokasi" name="branch_location" labelClass="col-sm-2"
                                fieldClass="col-sm-10" required />
                            <x-input label="RT/RW" name="branch_rt" labelClass="col-sm-2" fieldClass="col-sm-10"
                                required />
                            <x-input label="Kode Pos" name="branch_postal_code" labelClass="col-sm-2"
                                fieldClass="col-sm-10" required />
                            <x-input label="Longtitude" name="branch_longtitude" labelClass="col-sm-2"
                                fieldClass="col-sm-10" required />
                            <x-input label="Latitude" name="branch_latitude" labelClass="col-sm-2"
                                fieldClass="col-sm-10" required />
                            <x-input label="Alasan Permohonan" name="application_reason" labelClass="col-sm-2"
                                fieldClass="col-sm-10" required />
                            <x-input label="Izin yang akan diurus" name="application_reason" labelClass="col-sm-2"
                                fieldClass="col-sm-10" required />
                            <label>Dokumen Pendukung :</label>
                            <x-input label="1. Gambar lokasi dalam bentuk polygon (zip) kurang dari 2 Mb"
                                name="file_location_polygon" type="file" labelClass="col-sm-4" fieldClass="col-sm-8"
                                required />
                            <x-input label="2. Form Pengajuan Pembuatan Izin Melalui OSS" name="file_oss_form"
                                type="file" labelClass="col-sm-4" fieldClass="col-sm-8" required />
                        </div>
                    </div>
                ) : "" }
            </React.Fragment>
        )
    }
    ReactDOM.render(<PermitType />,document.getElementById('permit-type'))
</script>
