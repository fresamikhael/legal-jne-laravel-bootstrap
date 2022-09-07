<div id="env-type"></div>

<script type="text/babel">
    function EnvType() {
        const [type, setType] = React.useState();

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
                    {{ $ukl }}
                ) : type === "AMDAL" ? (
                    {{ $amdal }}
                ) : type === "SPPL" ? (
                    {{ $sppl }}
                ) : "" }
            </React.Fragment>
        )
    }
    ReactDOM.render(<EnvType />,document.getElementById('env-type'))
</script>
