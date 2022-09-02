<div id="permit-type"></div>

<script type="text/babel">
    function PermitType() {
        const [type, setType] = React.useState();

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
                    {{ $oss }}
                ) : "" }
            </React.Fragment>
        )
    }
    ReactDOM.render(<PermitType />,document.getElementById('permit-type'))
</script>
