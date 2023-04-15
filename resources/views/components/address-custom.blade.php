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
                    <label for="province" class="{{ $classLabel }} col-form-label">Provinsi {{ $label }}</label>
                    <div class="{{ $classField }}">
                        <select  onChange={ inputProvinceChange } name="province" id="province" class="form-select" aria-label="Default select example">
                            @if ($provinceExist)
                                <option value="{{$provinceExist}}">{{ ucwords(strtolower(App\Models\Province::find($provinceExist)->name)) }}</option>
                            @else
                                <option class="d-none" value="">-- Pilih --</option>
                            @endif
                            @foreach ($province as $row)
                                <option value="{{$row->id}}">{{ ucwords(strtolower($row->name)) }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="regency" class="{{ $classLabel }} col-form-label">Kab/Kota {{ $label }}</label>
                    <div class="{{ $classField }}">
                        <select  onChange={ inputRegencyChange } name="regency" id="regency" class="form-select" aria-label="Default select example">
                            @if ($regencyExist)
                                <option value="{{$regencyExist}}">{{ ucwords(strtolower(App\Models\Regency::find($regencyExist)->name)) }}</option>
                            @else
                                <option class="d-none" value="">-- Pilih --</option>
                            @endif
                            { regency.map((value, index) => {
                                return (
                                    <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                )
                            }) }
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="district" class="{{ $classLabel }} col-form-label">Kecamatan {{ $label }}</label>
                    <div class="{{ $classField }}">
                        <select  onChange={ inputDistrictChange } name="district" id="district" class="form-select" aria-label="Default select example">
                            @if ($districtExist)
                                <option value="{{$districtExist}}">{{ ucwords(strtolower(App\Models\District::find($districtExist)->name)) }}</option>
                            @else
                                <option class="d-none" value="">-- Pilih --</option>
                            @endif
                            { district.map((value, index) => {
                                return (
                                    <option key={index} value={value.id}>{ucwords(value.name.toLowerCase())}</option>
                                )
                            }) }
                        </select>
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="village" class="{{ $classLabel }} col-form-label">Kelurahan {{ $label }}</label>
                    <div class="{{ $classField }}">
                        <select  name="village" id="village" class="form-select" aria-label="Default select example">
                            @if ($villageExist)
                                <option value="{{$villageExist}}">{{ ucwords(strtolower(App\Models\Village::find($villageExist)->name)) }}</option>
                            @else
                                <option class="d-none" value="">-- Pilih --</option>
                            @endif
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
                        class="{{ $classLabel }} col-form-label">Kode Pos {{ $label }}</label>
                    <div class="{{ $classField }}">
                        @if ($postCodeExist)
                            <input type="text" class="form-control" id="zip_code" name="zip_code" value="{{$postCodeExist}}" />
                        @else
                            <input type="text" class="form-control" id="zip_code" name="zip_code" />
                        @endif
                    </div>
                </div>
                <div class="mb-3 row">
                    <label for="address" class="{{ $classLabel }} col-form-label">Alamat {{ $label }}</label>
                    <div class="{{ $classField }}">
                        <textarea class="form-control h-100 mt-0" id="address" name="address" >{{$addressExist ? $addressExist : ""}}</textarea>
                    </div>
                </div>
            </React.Fragment>
        )
    }
    ReactDOM.render(<FormAddress />,document.getElementById('form{{$name}}'))
</script>
