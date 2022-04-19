<div id="form{{ $name }}"></div>

<script type="text/babel">
    function FormAddress() {
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
                    <label for="{{ $name }}_province" class="col-sm-5 col-form-label">Provinsi {{ $label }}</label>        
                    <div class="col-sm-7">
                        <select required onChange={ inputProvinceChange } name="{{ $name }}_province" id="{{ $name }}_province" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            @foreach ($province as $row)
                                <option value="{{$row->id}}">{{ ucwords(strtolower($row->name)) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="{{ $name }}_regency" class="col-sm-5 col-form-label">Kab/Kota {{ $label }}</label>        
                    <div class="col-sm-7">
                        <select required onChange={ inputRegencyChange } name="{{ $name }}_regency" id="{{ $name }}_regency" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            { regency.map((value, index) => {
                                return (
                                    <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                )
                            }) }
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="{{ $name }}_district" class="col-sm-5 col-form-label">Kecamatan {{ $label }}</label>        
                    <div class="col-sm-7">
                        <select required onChange={ inputDistrictChange } name="{{ $name }}_district" id="{{ $name }}_district" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            { district.map((value, index) => {
                                return (
                                    <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                )
                            }) }
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="{{ $name }}_village" class="col-sm-5 col-form-label">Kelurahan {{ $label }}</label>        
                    <div class="col-sm-7">
                        <select required name="{{ $name }}_village" id="{{ $name }}_village" class="form-select" aria-label="Default select example">
                            <option class="d-none">-- Pilih --</option>
                            { village.map((value, index) => {
                                return (
                                    <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                )
                            }) }
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="{{ $name }}_zip_code"
                        class="col-sm-5 col-form-label">Kode Pos {{ $label }}</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="{{ $name }}_zip_code" name="{{ $name }}_zip_code" required/>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="{{ $name }}_address" class="col-sm-5 col-form-label">Alamat {{ $label }}</label>
                    <div class="col-sm-7">
                        <textarea class="form-control" id="{{ $name }}_address" name="{{ $name }}_address" required></textarea>
                    </div>
                </div>
            </React.Fragment>
        )
    }
    ReactDOM.render(<FormAddress />,document.getElementById('form{{$name}}'))
</script>